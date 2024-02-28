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
        $request->validate([
            'correo' => 'required|email|unique:clientes',
            'contrasena' => 'required',
            'estado' => 'required',
            'codigo' => 'required|unique:clientes',
        ]);

        Cliente::create($request->all());

        return redirect()->route('clientes.index');
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
        $request->validate([
            'correo' => 'required|email|unique:clientes,correo,' . $cliente->id,
            'contrasena' => 'required',
            'estado' => 'required',
            'codigo' => 'required|unique:clientes,codigo,' . $cliente->id,
        ]);

        $cliente->update($request->all());

        return redirect()->route('clientes.index');
    }

    public function destroy(Cliente $cliente)
    {
        $cliente->delete();

        return redirect()->route('clientes.index');
    }

    static function checkSession($callback) {
        session_start();
        
        if (!isset($_SESSION["logged"]) || !$_SESSION["logged"]) {
            return response()->json(["false"]);
        }

        return response()->json([
            "logged" => true,
            $callback()     
        ]);
    }
}
