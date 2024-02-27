<?php

namespace App\Http\Controllers;

use App\Models\CategoriaSerie;
use Illuminate\Http\Request;

class CategoriaSerieController extends Controller
{
    public function index()
    {
        $categoriasSeries = CategoriaSerie::all();
        return view('categorias_series.index', compact('categoriasSeries'));
    }

    public function create()
    {
        return view('categorias_series.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_serie' => 'required|exists:series,id',
            'id_categoria' => 'required|exists:categorias,id',
        ]);

        CategoriaSerie::create($request->all());

        return redirect()->route('categorias_series.index');
    }

    public function show(CategoriaSerie $categoriaSerie)
    {
        return view('categorias_series.show', compact('categoriaSerie'));
    }

    public function edit(CategoriaSerie $categoriaSerie)
    {
        return view('categorias_series.edit', compact('categoriaSerie'));
    }

    public function update(Request $request, CategoriaSerie $categoriaSerie)
    {
        $request->validate([
            'id_serie' => 'required|exists:series,id',
            'id_categoria' => 'required|exists:categorias,id',
        ]);

        $categoriaSerie->update($request->all());

        return redirect()->route('categorias_series.index');
    }

    public function destroy(CategoriaSerie $categoriaSerie)
    {
        $categoriaSerie->delete();

        return redirect()->route('categorias_series.index');
    }
}
