<?php

namespace App\Http\Controllers;

use App\Models\Administrador;
use Illuminate\Http\Request;

class AdministradorController extends Controller
{
    public function index()
    {
        $administradores = Administrador::all();
        return view('administradores.index', compact('administradores'));
    }

    public function create()
    {
        return view('administradores.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'correo' => 'required|email',
            'contrasena' => 'required',
        ]);

        Administrador::create($request->all());

        return redirect()->route('administradores.index');
    }

    public function show(Administrador $administrador)
    {
        return view('administradores.show', compact('administrador'));
    }

    public function edit(Administrador $administrador)
    {
        return view('administradores.edit', compact('administrador'));
    }

    public function update(Request $request, Administrador $administrador)
    {
        $request->validate([
            'correo' => 'required|email',
            'contrasena' => 'required',
        ]);

        $administrador->update($request->all());

        return redirect()->route('administradores.index');
    }

    public function destroy(Administrador $administrador)
    {
        $administrador->delete();

        return redirect()->route('administradores.index');
    }
}
