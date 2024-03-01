<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use App\Models\Serie;
use App\Models\Categoria;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class PeliculaController extends Controller
{
    public function index()
    {
        $peliculas = Pelicula::with('categorias')->get();
        return view('peliculas.index', compact('peliculas'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('peliculas.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        if ($request->hasFile('archivo')) {
            $archivo = $request->file('archivo');
            $nombreArchivo = time() . '_' . $archivo->getClientOriginalName();
            $archivo->move(public_path('media/pelis'), $nombreArchivo);

            $portada = $request->file('portada');
            $nombrePortada = time() . '_' . $portada->getClientOriginalName();
            $portada->move(public_path('media/portadas'), $nombrePortada);

            $poster = $request->file('poster');
            $nombrePoster = time() . '_' . $poster->getClientOriginalName();
            $poster->move(public_path('media/posters'), $nombrePoster);

            $pelicula = Pelicula::create([
                'titulo' => $request->titulo,
                'director' => $request->director,
                'ano_lanzamiento' => $request->ano_lanzamiento,
                'sinopsis' => $request->sinopsis,
                'duracion' => $request->duracion,
                'archivo' => 'media/pelis/' . $nombreArchivo,
                'portada' => 'media/portadas/' . $nombrePortada,
                'poster' => 'media/posters/' . $nombrePoster,
            ]);

            if ($request->has('categoria')) {
                $categoria_id = $request->categoria;
                $pelicula->categorias()->attach($categoria_id);
            }

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
        $categorias = Categoria::all();
        return view('peliculas.edit', compact('pelicula', 'categorias'));
    }

    public function update(Request $request, $id)
    {
        $pelicula = Pelicula::findOrFail($id);

        $pelicula->titulo = $request->titulo;
        $pelicula->director = $request->director;
        $pelicula->ano_lanzamiento = $request->ano_lanzamiento;
        $pelicula->sinopsis = $request->sinopsis;
        $pelicula->duracion = $request->duracion;

        if ($request->hasFile('archivo')) {
            if ($pelicula->archivo) {
                if (File::exists(public_path($pelicula->archivo))) {
                    File::delete(public_path($pelicula->archivo));
                }
            }
            $archivo = $request->file('archivo');
            $nombreArchivo = time() . '_' . $archivo->getClientOriginalName();
            $archivo->move(public_path('media/pelis'), $nombreArchivo);

            $pelicula->archivo = 'media/pelis/' . $nombreArchivo;
        }

        if ($request->hasFile('portada')) {
            if ($pelicula->portada) {
                if (File::exists(public_path($pelicula->portada))) {
                    File::delete(public_path($pelicula->portada));
                }
            }

            $portada = $request->file('portada');
            $nombrePortada = time() . '_' . $portada->getClientOriginalName();
            $portada->move(public_path('media/portadas'), $nombrePortada);

            $pelicula->portada = 'media/portadas/' . $nombrePortada;
        }

        if ($request->hasFile('poster')) {
            if ($pelicula->poster) {
                if (File::exists(public_path($pelicula->poster))) {
                    File::delete(public_path($pelicula->poster));
                }
            }

            $poster = $request->file('poster');
            $nombrePoster = time() . '_' . $poster->getClientOriginalName();
            $poster->move(public_path('media/posters'), $nombrePoster);

            $pelicula->poster = 'media/posters/' . $nombrePoster;
        }

        if ($request->has('categoria')) {
            $categoria = $request->categoria;
            $pelicula->categorias()->sync($categoria);
        }

        $pelicula->save();

        return redirect()->route('peliculas.index')->with('success', 'Película editada exitosamente.');
    }

    public function destroy(Pelicula $pelicula)
    {
        $archivo = $pelicula->archivo;
        $portada = $pelicula->portada;
        $poster = $pelicula->poster;

        if ($archivo && $portada) {
            $rutaArchivo = public_path($archivo);
            $rutaPortada = public_path($portada);
            $rutaPoster = public_path($poster);

            if (File::exists($rutaArchivo) && File::exists($rutaPortada) && File::exists($rutaPoster)) {
                File::delete($rutaArchivo);
                File::delete($rutaPortada);
                File::delete($rutaPoster);

                $pelicula->delete();
                return redirect()->route('peliculas.index')->with('success', 'Pelicula eliminada exitosamente.');
            } else {
                return redirect()->route('peliculas.index')->with('error', 'No se encontró el archivo asociado.');
            }
        } else {
            return redirect()->route('peliculas.index')->with('error', 'No se encontró el archivo asociado.');
        }
    }

    function getContenido(Request $request)
    {
        return ClienteController::checkSession($request, function () {
            $peliculas = DB::table('peliculas')->get()->toArray();
            $series = DB::table('series')->get()->toArray();

            $contenido = array_merge($peliculas, $series);

            shuffle($contenido);

            return ["datosRandom" => array_slice($contenido, 0, 8)];
        });
    }

    function getPeliculas(Request $request)
    {

        return ClienteController::checkSession($request, function () {
            return ["peliculas" => Pelicula::inRandomOrder()->limit(10)->get()];
        });
    }

    function getDetallesPelicula(Request $request)
    {

        return ClienteController::checkSession($request, function ($request) {
            return ["detalles" => Pelicula::find($request["id"])];
        });
    }


    public function getPelisRandom(Request $request)
    {
        return ClienteController::checkSession($request, function () {
            $peliculas = DB::table('peliculas')->get()->toArray();
            shuffle($peliculas);
            $peliculasRandom = array_slice($peliculas, 0, 8);
            return ['pelis' => $peliculasRandom];
        });
    }
}
