<?php

namespace App\Http\Controllers;

use App\Models\Temporada;
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
        return view('temporadas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_serie' => 'required|exists:series,id',
            'numero_temporada' => 'required',
            'fecha_estreno' => 'required',
        ]);

        Temporada::create($request->all());

        return redirect()->route('temporadas.index');
    }

    public function show(Temporada $temporada)
    {
        return view('temporadas.show', compact('temporada'));
    }

    public function edit(Temporada $temporada)
    {
        return view('temporadas.edit', compact('temporada'));
    }

    public function update(Request $request, Temporada $temporada)
    {
        $request->validate([
            'id_serie' => 'required|exists:series,id',
            'numero_temporada' => 'required',
            'fecha_estreno' => 'required',
        ]);

        $temporada->update($request->all());

        return redirect()->route('temporadas.index');
    }

    public function destroy(Temporada $temporada)
    {
        $temporada->delete();

        return redirect()->route('temporadas.index');
    }
}
