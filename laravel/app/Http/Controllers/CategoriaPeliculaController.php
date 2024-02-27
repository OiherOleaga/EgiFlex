<?php

namespace App\Http\Controllers;

use App\Models\CategoriaPelicula;
use Illuminate\Http\Request;

class CategoriaPeliculaController extends Controller
{
    public function index()
    {
        $categoriasPeliculas = CategoriaPelicula::all();
        return view('categorias_peliculas.index', compact('categoriasPeliculas'));
    }

    public function create()
    {
        return view('categorias_peliculas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_categoria' => 'required|exists:categorias,id',
            'id_pelicula' => 'required|exists:peliculas,id',
        ]);

        CategoriaPelicula::create($request->all());

        return redirect()->route('categorias_peliculas.index');
    }

    public function show(CategoriaPelicula $categoriaPelicula)
    {
        return view('categorias_peliculas.show', compact('categoriaPelicula'));
    }

    public function edit(CategoriaPelicula $categoriaPelicula)
    {
        return view('categorias_peliculas.edit', compact('categoriaPelicula'));
    }

    public function update(Request $request, CategoriaPelicula $categoriaPelicula)
    {
        $request->validate([
            'id_categoria' => 'required|exists:categorias,id',
            'id_pelicula' => 'required|exists:peliculas,id',
        ]);

        $categoriaPelicula->update($request->all());

        return redirect()->route('categorias_peliculas.index');
    }

    public function destroy(CategoriaPelicula $categoriaPelicula)
    {
        $categoriaPelicula->delete();

        return redirect()->route('categorias_peliculas.index');
    }
}
