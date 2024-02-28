<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeliculaController extends Controller
{
    public function index()
    {
        $peliculas = Pelicula::all();
        return view('peliculas.index', compact('peliculas'));
    }

    public function create()
    {
        return view('peliculas.create');
    }

    public function store(Request $request)
    {
        Pelicula::create($request->all());

        return redirect()->route('peliculas.index')->with('success', 'Película creada exitosamente.');
    }

    public function show(Pelicula $pelicula)
    {
        return view('peliculas.show', compact('pelicula'));
    }

    public function edit(Pelicula $pelicula)
    {
        return view('peliculas.edit', compact('pelicula'));
    }

    public function update(Request $request, Pelicula $pelicula)
    {
        $pelicula->update($request->all());

        return redirect()->route('peliculas.index')->with('success', 'Película actualizada exitosamente.');
    }

    public function destroy(Pelicula $pelicula)
    {
        $pelicula->delete();

        return redirect()->route('peliculas.index')->with('success', 'Película eliminada exitosamente.');
    }

    function getContenido() {

        return ClienteController::checkSession(function () {

            return DB::select(
            "SELECT * FROM (
                SELECT * FROM peliculas ORDER BY RAND() LIMIT 4
            ) AS peliculas
            UNION
            SELECT * FROM (
                SELECT * FROM series ORDER BY RAND() LIMIT 4
            ) AS series"
            );

        });
    }

    function getPelicualas() {
        
        return ClienteController::checkSession(function () {
            return ["peliculas" => Pelicula::inRandomOrder()->limit(10)->get()];
        });

    }
}
