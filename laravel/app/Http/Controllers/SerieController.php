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
        if (empty($request->titulo) || empty($request->director) || empty($request->ano_lanzamiento) || empty($request->sinopsis)) {
            return redirect()->route('series.index')->with('error', 'Por favor completa todos los campos.');
        }

        Serie::create($request->all());

        return redirect()->route('series.index')->with('success', 'Serie creada exitosamente');
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

    function getPelicualas(Request $request) {
        
        return ClienteController::checkSession($request, function () {
            return ["series" => Serie::inRandomOrder()->limit(10)->get()];
        });

    }
}
