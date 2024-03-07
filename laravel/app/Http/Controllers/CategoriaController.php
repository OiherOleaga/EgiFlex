<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $categorias = Categoria::query()
            ->where(function ($query) use ($search) {
                $query->where('nombre', 'LIKE', "%$search%");
            })
            ->paginate(5);

        $categorias->appends(['search' => $search]);

        return view('categorias.index', compact('categorias'));
    }

    public function create()
    {
        return view('categorias.create');
    }

    public function store(Request $request)
    {
        if (empty($request->nombre)) {
            return redirect()->route('categorias.index')->with('error', 'Error: El campo nombre no puede estar vacío.');
        }

        try {
            Categoria::create($request->all());
            return redirect()->route('categorias.index')->with('success', 'Categoria creada exitosamente.');
        } catch (\Exception $e) {
            return redirect()->route('categorias.index')->with('error', 'Error al crear la categoría: ' . $e->getMessage());
        }
    }

    public function show(Categoria $categoria)
    {
        return view('categorias.show', compact('categoria'));
    }

    public function edit(Categoria $categoria)
    {
        return view('categorias.edit', compact('categoria'));
    }

    public function update(Request $request, Categoria $categoria)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        $categoria->update($request->all());

        return redirect()->route('categorias.index')->with('success', 'Categoria editada exitosamente.');
    }

    public function destroy(Categoria $categoria)
    {
        $categoria->delete();

        return redirect()->route('categorias.index')->with('success', 'Categoria eliminada exitosamente.');
    }

    function categorias(Request $request) { return ClienteController::checkSession($request, function () {
        return ["categorias" => Categoria::select("id", "nombre")->get()];
    });}
}
