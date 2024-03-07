<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use App\Mail\email;

class ClienteController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $clientes = Cliente::query()
            ->where(function ($query) use ($search) {
                $query->where('nombre', 'LIKE', "%$search%")
                    ->orWhere('apellido', 'LIKE', "%$search%")
                    ->orWhere('correo', 'LIKE', "%$search%")
                    ->orWhere('estado', 'LIKE', "%$search%");
            })
            ->paginate(5);

        $clientes->appends(['search' => $search]);

        return view('clientes.index', compact('clientes'));
    }



    public function create()
    {
        return view('clientes.create');
    }

    public function store(Request $request)
    {
        if (empty($request->nombre)) {
            return redirect()->route('clientes.index')->with('error', 'Error: El campo nombre no puede estar vacío.');
        }

        try {
            Cliente::create($request->all());
            return redirect()->route('clientes.index')->with('success', 'Cliente creado exitosamente.');
        } catch (\Exception $e) {
            return redirect()->route('clientes.index')->with('error', 'Error al crear el cliente: ' . $e->getMessage());
        }
    }

    public function show(Cliente $cliente)
    {
        return view('clientes.show', compact('cliente'));
    }

    public function edit(Cliente $cliente)
    {
        return view('clientes.edit', compact('cliente'));
    }

    public function update(Request $request, Cliente $cliente)
    {
        $cliente->update($request->all());

        return redirect()->route('clientes.index')->with('success', 'Cliente actualizado exitosamente.');
    }

    public function destroy(Cliente $cliente)
    {
        $cliente->delete();

        return redirect()->route('clientes.index')->with('success', 'Cliente eliminado exitosamente.');
    }

    public function registro(Request $request)
    {
        $datos = $request->validate([
            'correo' => 'required|email',
            'contrasena' => 'required|string',
            'nombre' => 'required|string',
            'apellido' => 'required|string',
        ]);

        $datos['contrasena'] = hash('sha256', $datos['contrasena']);

        $datos['estado'] = 'inactivo';

        Cliente::create($datos);

        // Retornar una respuesta JSON indicando que la operación fue exitosa
        return response()->json(["ok" => true]);
    }



    function comprobarInicioSesion(Request $request)
    {
        $correo = $request->input('correo');
        $contra = hash('sha256', $request->input('contra'));

        $usuario = Cliente::where('correo', $correo)
            ->where('contrasena', $contra)
            ->where('estado', 'activo')
            ->first();

        if ($usuario) {
            return response()->json(['logged' => true, 'sessionId' => Crypt::encrypt($usuario->id)]);
        } else {
            return response()->json(['logged' => false]);
        }
    }

    static function checkSession(Request $request, $callback = null)
    {
        try {

            if (!Cliente::find(Crypt::decrypt($request->header("sessionId")))) {
                return response()->json(["logged" => false]);
            }
        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
            return response()->json(["logged" => false]);
        }

        if (!is_callable($callback)) {
            return response()->json(["logged" => true]);
        }

        return response()->json(array_merge(["logged" => true], $callback($request)));
    }

    static function getIdCliente($request)
    {
        return Crypt::decrypt($request->header("sessionId"));
    }

    public function aceptar($id)
    {
        $cliente = Cliente::findOrFail($id);


        $cliente->estado = 'activo';
        $cliente->save();


        Mail::raw('Este es un correo de verificación', function ($message) use ($cliente) {
            $message->to($cliente->correo)
                ->subject('Correo de verificación');
        });



        return redirect()->route('clientes.index');
    }
}
