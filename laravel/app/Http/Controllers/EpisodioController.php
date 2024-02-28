<?php

namespace App\Http\Controllers;

use App\Models\Episodio;
use Illuminate\Http\Request;
use App\Models\Temporada;

class EpisodioController extends Controller
{
    public function index()
    {
        $episodios = Episodio::all();
        return view('episodios.index', compact('episodios'));
    }

    public function create()
    {
        $temporadas = Temporada::all();
        return view('episodios.create', compact('temporadas'));
    }

    public function store(Request $request)
    {
        Episodio::create($request->all());

        return redirect()->route('episodios.index')->with('success', 'Episodio creado exitosamente.');
    }

    public function show(Episodio $episodio)
    {
        return view('episodios.show', compact('episodio'));
    }

    public function edit(Episodio $episodio)
    {
        $temporadas = Temporada::all();
        return view('episodios.edit', compact('episodio', 'temporadas'));
    }

    public function update(Request $request, Episodio $episodio)
    {
        $episodio->update($request->all());

        return redirect()->route('episodios.index')->with('success', 'Episodio actualizado exitosamente.');
    }

    public function destroy(Episodio $episodio)
    {
        $episodio->delete();

        return redirect()->route('episodios.index')->with('success', 'Episodio eliminado exitosamente.');
    }
}
