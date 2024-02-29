<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use App\Models\Serie;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

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
        if ($request->hasFile('archivo')) {
            $archivo = $request->file('archivo');

            $nombreArchivo = time() . '_' . $archivo->getClientOriginalName();

            $archivo->move(public_path('media/pelis'), $nombreArchivo);

            $pelicula = Pelicula::create([
                'titulo' => $request->titulo,
                'director' => $request->director,
                'ano_lanzamiento' => $request->ano_lanzamiento,
                'sinopsis' => $request->sinopsis,
                'duracion' => $request->duracion,
                'archivo' => 'media/pelis/' . $nombreArchivo,
            ]);

            return redirect()->route('peliculas.index')->with('success', 'Película creada exitosamente.');
        }

        return redirect()->route('peliculas.index')->with('error', 'No se ha proporcionado ningún archivo.');
    }



    public function show(Pelicula $pelicula)
    {
        return view('peliculas.show', compact('pelicula'));
    }

    public function edit(Pelicula $pelicula)
    {
        return view('peliculas.edit', compact('pelicula'));
    }

    public function update(Request $request, $id)
    {
        $pelicula = Pelicula::findOrFail($id);

        if ($request->hasFile('archivo')) {
            if ($pelicula->archivo) {
                Storage::delete($pelicula->archivo);
            }

            $archivo = $request->file('archivo');
            $rutaArchivo = $archivo->store('public/media/pelis');

            $pelicula->archivo = $rutaArchivo;
        }

        $pelicula->titulo = $request->titulo;
        $pelicula->director = $request->director;
        $pelicula->ano_lanzamiento = $request->ano_lanzamiento;
        $pelicula->sinopsis = $request->sinopsis;
        $pelicula->duracion = $request->duracion;

        $pelicula->save();

        return redirect()->route('peliculas.index')->with('success', 'Película editada exitosamente.');
    }

    public function destroy(Pelicula $pelicula)
    {
        $archivo = $pelicula->archivo;

        if ($archivo) {
            $rutaArchivo = public_path($archivo);

            if (File::exists($rutaArchivo)) {
                File::delete($rutaArchivo);
                $pelicula->delete();
                return redirect()->route('peliculas.index')->with('success', 'Película eliminada exitosamente.');
            } else {
                return redirect()->route('peliculas.index')->with('error', 'No se encontró el archivo asociado.');
            }
        } else {
            return redirect()->route('peliculas.index')->with('error', 'No se encontró el archivo asociado.');
        }
    }

    function getpelisRandom(Request $request)
    {
        return ClienteController::checkSession($request, function () {

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

    function getPelicualas(Request $request)
    {

        return ClienteController::checkSession($request, function () {
            return ["peliculas" => Pelicula::inRandomOrder()->limit(10)->get()];
        });
    }
}
