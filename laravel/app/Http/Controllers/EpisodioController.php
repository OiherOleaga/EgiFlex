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
        if ($request->hasFile('archivo')) {
            $archivo = $request->file('archivo');
            $nombreArchivo = time() . '_' . $archivo->getClientOriginalName();
            $archivo->move(public_path('media'), $nombreArchivo);

            $episodio = Episodio::create([
                'id_temporada' => $request->id_temporada,
                'titulo' => $request->titulo,
                'numero_episodio' => $request->numero_episodio,
                'duracion' => $request->duracion,
                'sinopsis' => $request->sinopsis,
                'fecha_estreno' => $request->fecha_estreno,
                'archivo' => 'media/' . $nombreArchivo,
            ]);
        }

        return redirect()->route('episodios.index');
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
