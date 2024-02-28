<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes.index', compact('clientes'));
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(Request $request)
    {
        Cliente::create($request->all());

        return redirect()->route('clientes.index')->with('success', 'Cliente creado exitosamente.');
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

    function regristro(Request $request) {

        $datos = $request->validate([
            'correo' => 'required|email',
            'constrasena' => 'required|string',
            'nombre' => 'required|string',
            'epellido' => 'required|string|min:9|max:9',
        ]);

        Cliente::create($datos);

        return response()->json(["ok" => true]);
    }

    function comprobarInicioSesion(Request $request)
    {
        $correo = $request->input('correo');
        $contra = $request->input('contra');

        $usuario = Cliente::where('correo', $correo)->where('contra', $contra)->first();

        if ($usuario) {
            return response()->json(['logged' => true]);
        } else {
            return response()->json(['logged' => false]);
        }
    }


    static function checkSession($callback)
    {
        session_start();
        
        if (!isset($_SESSION["logged"]) || !$_SESSION["logged"]) {
            return response()->json(["false"]);
        }

        if (!is_callable($callback)) {
            return response()->json([
                "logged" => true,
            ]);
        }
        
        return response()->json([
            "logged" => true,
            $callback()     
        ]);
    }

}
