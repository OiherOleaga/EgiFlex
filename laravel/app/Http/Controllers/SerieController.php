<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use App\Models\Categoria;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class SerieController extends Controller
{
    public function index()
    {
        $series = Serie::with('categorias')->get();
        return view('series.index', compact('series'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('series.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        if ($request->hasFile('portada')) {
            $portada = $request->file('portada');
            $nombrePortada = time() . '_' . $portada->getClientOriginalName();
            $portada->move(public_path('media/portadas'), $nombrePortada);

            $poster = $request->file('poster');
            $nombrePoster = time() . '_' . $poster->getClientOriginalName();
            $poster->move(public_path('media/posters'), $nombrePoster);

            $serie = Serie::create([
                'titulo' => $request->titulo,
                'director' => $request->director,
                'ano_lanzamiento' => $request->ano_lanzamiento,
                'sinopsis' => $request->sinopsis,
                'portada' => 'media/portadas/' . $nombrePortada,
                'poster' => 'media/posters/' . $nombrePoster,
            ]);

            if ($request->has('categoria')) {
                $categoria_id = $request->categoria;
                $serie->categorias()->attach($categoria_id);
            }

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
        $categorias = Categoria::all();
        return view('series.edit', compact('serie', 'categorias'));
    }

    public function update(Request $request, $id)
    {
        $serie = Serie::findOrFail($id);

        if (!$request->hasFile('portada') && !$serie->portada) {
            return redirect()->route('series.index')->with('error', 'Por favor selecciona una portada.');
        }

        $serie->titulo = $request->titulo;
        $serie->director = $request->director;
        $serie->ano_lanzamiento = $request->ano_lanzamiento;
        $serie->sinopsis = $request->sinopsis;

        if ($request->hasFile('portada')) {
            if ($serie->portada) {
                if (File::exists(public_path($serie->portada))) {
                    File::delete(public_path($serie->portada));
                }
            }
            $portada = $request->file('portada');
            $nombrePortada = time() . '_' . $portada->getClientOriginalName();
            $portada->move(public_path('media/portadas'), $nombrePortada);

            $serie->portada = 'media/portadas/' . $nombrePortada;
        }

        if ($request->hasFile('poster')) {
            if ($serie->poster) {
                if (File::exists(public_path($serie->poster))) {
                    File::delete(public_path($serie->poster));
                }
            }
            
            $poster = $request->file('poster');
            $nombrePoster = time() . '_' . $poster->getClientOriginalName();
            $poster->move(public_path('media/posters'), $nombrePoster);

            $serie->poster = 'media/posters/' . $nombrePoster;
        }

        if ($request->has('categoria')) {
            $categoria = $request->categoria;
            $serie->categorias()->sync($categoria);
        }

        $serie->save();

        return redirect()->route('series.index')->with('success', 'Serie editada exitosamente.');
    }


    public function destroy(Serie $serie)
    {
        $portada = $serie->portada;
        $poster = $serie->poster;

        if ($portada) {
            $rutaPortada = public_path($portada);
            $rutaPoster = public_path($poster);

            if (File::exists($rutaPortada) && File::exists($rutaPoster)) {
                File::delete($rutaPortada);
                File::delete($rutaPoster);

                $serie->delete();
                return redirect()->route('series.index')->with('success', 'Serie eliminada exitosamente.');
            } else {
                return redirect()->route('series.index')->with('error', 'No se encontró la portada asociada.');
            }
        } else {
            return redirect()->route('series.index')->with('error', 'No se encontró la portada asociada.');
        }
    }

    function getSeries(Request $request)
    {

        return ClienteController::checkSession($request, function () {
            return ["series" => Serie::inRandomOrder()->limit(10)->get()];
        });
    }

    function getDetallesSerie(Request $request)
    {

        return ClienteController::checkSession($request, function ($request) {
            return ["detalles" => Serie::find($request["id"])];
        });
    }

    public function getseriesRandom(Request $request)
    {
        return ClienteController::checkSession($request, function () {
            $series = DB::table('series')->get()->toArray();
            shuffle($series);
            $seriesRandom = array_slice($series, 0, 8);
            return ['series' => $seriesRandom];
        });
    }
}
