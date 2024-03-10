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
    public function index(Request $request)
    {
        $search = $request->input('search');

        $peliculas = Pelicula::query()
            ->where('titulo', 'LIKE', "%$search%")
            ->orWhere('director', 'LIKE', "%$search%")
            ->orWhere('ano_lanzamiento', 'LIKE', "%$search%")
            ->orWhere('sinopsis', 'LIKE', "%$search%")
            ->orWhere('duracion', 'LIKE', "%$search%")
            ->orWhere('archivo', 'LIKE', "%$search%")
            ->orWhere('portada', 'LIKE', "%$search%")
            ->orWhere('poster', 'LIKE', "%$search%")
            ->paginate(5);

        $peliculas->appends(['search' => $search]);

        return view('peliculas.index', compact('peliculas'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('peliculas.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $url = "http://admin.egiflex.es/";
        if ($request->hasFile('archivo')) {
            $archivo = $request->file('archivo');
            $nombreArchivo = time() . '_' . $archivo->getClientOriginalName();
            $archivo->move(public_path('media/peliculas'), $nombreArchivo);

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
                'archivo' => $url . 'media/peliculas/' . $nombreArchivo,
                'portada' => $url . 'media/portadas/' . $nombrePortada,
                'poster' => $url . 'media/posters/' . $nombrePoster,
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
        $url = "http://admin.egiflex.es/";

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
            $archivo->move(public_path('media/peliculas'), $nombreArchivo);

            $pelicula->archivo = $url . 'media/peliculas/' . $nombreArchivo;
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

            $pelicula->portada = $url . 'media/portadas/' . $nombrePortada;
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

            $pelicula->poster = $url . 'media/posters/' . $nombrePoster;
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
    function getDetallesPelicula(Request $request) { return ClienteController::checkSession($request, function ($request) {
        try {
        return ["detalles" => DB::select(
            "SELECT p.*,
                group_concat(c.nombre separator ', ') generos,
                count(lp.id) lista
            FROM peliculas p
            left join categoria_peliculas cp on cp.pelicula_id = p.id
            left join categorias c on c.id = cp.categoria_id
            left join lista_peliculas lp on lp.pelicula_id = p.id and lp.cliente_id = ?
            where p.id = ?
            group by p.id",
        [ClienteController::getIdCliente($request), $request["id"]])[0]];
        } catch(\Exception) {
            return ["error" => "id incorrecto"];
        }
    });}


    public function getPelisRandom(Request $request) { return ClienteController::checkSession($request, function () {
        return ['pelis' => DB::select(
            "SELECT p.id, p.titulo, p.portada, 'p' tipo
            from peliculas p
            left join historial_peliculas h on h.id_pelicula = p.id
            group by p.id
            order by count(h.id_pelicula) desc
            limit 8
        ")];
    });}
}
