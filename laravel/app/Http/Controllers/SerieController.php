<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;

class SerieController extends Controller
{
    public function index()
    {
        $series = Serie::all();
        return view('series.index', compact('series'));
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(Request $request)
    {
        if ($request->hasFile('portada')) {
            $portada = $request->file('portada');
            
            $nombrePortada = time() . '_' . $portada->getClientOriginalName();
            
            $portada->move(public_path('media/portadas'), $nombrePortada);
    
            $serie = Serie::create([
                'titulo' => $request->titulo,
                'director' => $request->director,
                'ano_lanzamiento' => $request->ano_lanzamiento,
                'sinopsis' => $request->sinopsis,
                'portada' => 'media/portadas/' . $nombrePortada,
            ]);
    
            return redirect()->route('series.index')->with('success', 'Serie creada exitosamente.');
        }
    
        return redirect()->route('peliculas.index')->with('error', 'No se ha proporcionado ningún archivo.');
    }

    public function show(Serie $serie)
    {
        return view('series.show', compact('serie'));
    }

    public function edit(Serie $serie)
    {
        return view('series.edit', compact('serie'));
    }

    public function update(Request $request, Serie $serie)
    {
        if (empty($request->titulo) || empty($request->director) || empty($request->ano_lanzamiento) || empty($request->sinopsis)) {
            return redirect()->route('series.index')->with('error', 'Por favor completa todos los campos.');
        }

        $serie->update($request->all());

        return redirect()->route('series.index')->with('success', 'Serie editada exitosamente');
    }

    public function destroy(Serie $serie)
    {
        $serie->delete();

        return redirect()->route('series.index')->with('success', 'Serie eliminada exitosamente');
    }

    function getSeries(Request $request) {
        
        return ClienteController::checkSession($request, function () {
            return ["series" => Serie::inRandomOrder()->limit(10)->get()];
        });

    }
}
