<?php

namespace App\Http\Controllers;

use App\Models\Episodio;
use Illuminate\Http\Request;

class EpisodioController extends Controller
{
    public function index()
    {
        $episodios = Episodio::all();
        return view('episodios.index', compact('episodios'));
    }

    public function create()
    {
        return view('episodios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_temporada' => 'required|exists:temporadas,id',
            'Titulo' => 'required',
            'numero_episodio' => 'required',
            'Duracion' => 'required',
            'Sinopsis' => 'required',
            'fecha_estreno' => 'required',
        ]);

        Episodio::create($request->all());

        return redirect()->route('episodios.index');
    }

    public function show(Episodio $episodio)
    {
        return view('episodios.show', compact('episodio'));
    }

    public function edit(Episodio $episodio)
    {
        return view('episodios.edit', compact('episodio'));
    }

    public function update(Request $request, Episodio $episodio)
    {
        $request->validate([
            'id_temporada' => 'required|exists:temporadas,id',
            'Titulo' => 'required',
            'numero_episodio' => 'required',
            'Duracion' => 'required',
            'Sinopsis' => 'required',
            'fecha_estreno' => 'required',
        ]);

        $episodio->update($request->all());

        return redirect()->route('episodios.index');
    }

    public function destroy(Episodio $episodio)
    {
        $episodio->delete();

        return redirect()->route('episodios.index');
    }
}
