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
            $archivo->move(public_path('media/episodios'), $nombreArchivo);

            $episodio = Episodio::create([
                'id_temporada' => $request->id_temporada,
                'titulo' => $request->titulo,
                'numero_episodio' => $request->numero_episodio,
                'duracion' => $request->duracion,
                'sinopsis' => $request->sinopsis,
                'fecha_estreno' => $request->fecha_estreno,
                'archivo' => 'media/episodios/' . $nombreArchivo,
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

    public function update(Request $request, $id)
    {
        $episodio = Episodio::findOrFail($id);
    
        if ($request->hasFile('archivo')) {
            if ($episodio->archivo) {
                Storage::delete($episodio->archivo);
            }
    
            $archivo = $request->file('archivo');
            $rutaArchivo = $archivo->store('public/media');
    
            $episodio->archivo = $rutaArchivo;
        }
    
        $episodio->id_temporada = $request->id_temporada;
        $episodio->titulo = $request->titulo;
        $episodio->numero_episodio = $request->numero_episodio;
        $episodio->duracion = $request->duracion;
        $episodio->sinopsis = $request->sinopsis;
        $episodio->fecha_estreno = $request->fecha_estreno;
    
        $episodio->save();
    
        return redirect()->route('episodios.index');
    }
    

    public function destroy(Episodio $episodio)
    {
        $episodio->delete();

        return redirect()->route('episodios.index')->with('success', 'Episodio eliminado exitosamente.');
    }
}
