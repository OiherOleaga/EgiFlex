<?php

namespace App\Http\Controllers;

use App\Models\Temporada;
use App\Models\Serie;

use Illuminate\Http\Request;

class TemporadaController extends Controller
{
    public function index()
    {
        $temporadas = Temporada::all();
        return view('temporadas.index', compact('temporadas'));
    }

    public function create()
    {
        $series = Serie::all();
        return view('temporadas.create', compact('series'));
    }

    public function store(Request $request)
    {
        if (empty($request->id_serie) || empty($request->numero_temporada) || empty($request->fecha_estreno) || empty($request->numero_episodios)) {
            return redirect()->route('temporadas.index')->with('error', 'Por favor completa todos los campos.');
        }

        Temporada::create($request->all());

        return redirect()->route('temporadas.index')->with('success', 'Temporada creada exitosamente');
    }

    public function show(Temporada $temporada)
    {
        return view('temporadas.show', compact('temporada'));
    }

    public function edit(Temporada $temporada)
    {
        $series = Serie::all();
        return view('temporadas.edit', compact('temporada', 'series'));
    }

    public function update(Request $request, Temporada $temporada)
    {
        if (empty($request->id_serie) || empty($request->numero_temporada) || empty($request->fecha_estreno) || empty($request->numero_episodios)) {
            return redirect()->route('temporadas.index')->with('error', 'Por favor completa todos los campos.');
        }

        $temporada->update($request->all());

        return redirect()->route('temporadas.index')->with('success', 'Temporada editada exitosamente');
    }

    public function destroy(Temporada $temporada)
    {
        $temporada->delete();

        return redirect()->route('temporadas.index')->with('success', 'Temporada eliminada exitosamente');
    }
}
