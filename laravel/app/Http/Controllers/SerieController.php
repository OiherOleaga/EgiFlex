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
        $request->validate([
            'Titulo' => 'required',
            'Director' => 'required',
            'Año_lanzamiento' => 'required',
            'Sinopsis' => 'required',
        ]);

        Serie::create($request->all());

        return redirect()->route('series.index');
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
        $request->validate([
            'Titulo' => 'required',
            'Director' => 'required',
            'Año_lanzamiento' => 'required',
            'Sinopsis' => 'required',
        ]);

        $serie->update($request->all());

        return redirect()->route('series.index');
    }

    public function destroy(Serie $serie)
    {
        $serie->delete();

        return redirect()->route('series.index');
    }
}
