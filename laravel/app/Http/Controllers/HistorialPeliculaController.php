<?php

namespace App\Http\Controllers;

use App\Models\HistorialPelicula;
use Illuminate\Http\Request;

class HistorialPeliculaController extends Controller
{
    public function index()
    {
        $historialesPeliculas = HistorialPelicula::all();
        return view('historiales_peliculas.index', compact('historialesPeliculas'));
    }

    public function create()
    {
        return view('historiales_peliculas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_pelicula' => 'required|exists:peliculas,id',
            'id_cliente' => 'required|exists:clientes,id',
        ]);

        HistorialPelicula::create($request->all());

        return redirect()->route('historiales_peliculas.index');
    }

    public function show(HistorialPelicula $historialPelicula)
    {
        return view('historiales_peliculas.show', compact('historialPelicula'));
    }

    public function edit(HistorialPelicula $historialPelicula)
    {
        return view('historiales_peliculas.edit', compact('historialPelicula'));
    }

    public function update(Request $request, HistorialPelicula $historialPelicula)
    {
        $request->validate([
            'id_pelicula' => 'required|exists:peliculas,id',
            'id_cliente' => 'required|exists:clientes,id',
        ]);

        $historialPelicula->update($request->all());

        return redirect()->route('historiales_peliculas.index');
    }

    public function destroy(HistorialPelicula $historialPelicula)
    {
        $historialPelicula->delete();

        return redirect()->route('historiales_peliculas.index');
    }
}
