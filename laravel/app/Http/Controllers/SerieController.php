<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use App\Models\Categoria;

use Illuminate\Http\Request;
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

            $serie = Serie::create([
                'titulo' => $request->titulo,
                'director' => $request->director,
                'ano_lanzamiento' => $request->ano_lanzamiento,
                'sinopsis' => $request->sinopsis,
                'portada' => 'media/portadas/' . $nombrePortada,
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

        if ($portada) {
            $rutaPortada = public_path($portada);

            if (File::exists($rutaPortada)) {
                File::delete($rutaPortada);
                $serie->delete();
                return redirect()->route('series.index')->with('success', 'Serie eliminada exitosamente.');
            } else {
                return redirect()->route('series.index')->with('error', 'No se encontró la portada asociada.');
            }
        } else {
            return redirect()->route('series.index')->with('error', 'No se encontró la portada asociada.');
        }

    }

    function getSeries(Request $request) {

        return ClienteController::checkSession($request, function () {
            return ["series" => Serie::inRandomOrder()->limit(10)->get()];
        });

    }

    function getDetallesSerie(Request $request) {

        return ClienteController::checkSession($request, function ($request) {
            return ["detalles" => Serie::find($request["id"])];
        });

    }
}
