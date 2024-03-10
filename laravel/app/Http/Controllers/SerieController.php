<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use App\Models\Categoria;
use App\Models\CategoriaSerie;
use App\Models\Temporada;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class SerieController extends Controller
{

    public function index(Request $request)
    {
        $search = $request->input('search');
        $categoria = $request->input('categoria');

        $series = Serie::query()
            ->where(function ($query) use ($search) {
                $query->where('titulo', 'LIKE', "%$search%")
                      ->orWhere('director', 'LIKE', "%$search%")
                      ->orWhere('ano_lanzamiento', 'LIKE', "%$search%")
                      ->orWhere('sinopsis', 'LIKE', "%$search%");
            })
            ->when($categoria, function ($query, $categoria) {
                return $query->whereHas('categorias', function ($query) use ($categoria) {
                    $query->where('nombre', 'LIKE', "%$categoria%");
                });
            })
            ->paginate(5);

        $series->appends(['search' => $search, 'categoria' => $categoria]);

        return view('series.index', compact('series'));
    }


    public function create()
    {
        $categorias = Categoria::all();
        return view('series.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $url = "http://admin.egiflex.es/";

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
                'portada' => $url . 'media/portadas/' . $nombrePortada,
                'poster' => $url . 'media/posters/' . $nombrePoster,
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
        $url = "http://admin.egiflex.es/";
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

            $serie->portada = $url . 'media/portadas/' . $nombrePortada;
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

            $serie->poster = $url . 'media/posters/' . $nombrePoster;
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

    function getDetallesSerie(Request $request) { return ClienteController::checkSession($request, function ($request) {
        try {
        $cliente_id = ClienteController::getIdCliente($request);
        return ["detalles" => DB::select(
            "SELECT s.*,
                group_concat(distinct c.nombre separator ', ') generos,
                group_concat(distinct t.id separator ',') temporadas,
                count(ls.id) lista,
                ifnull((select t.numero_temporada
                        from temporadas t
                        join historial_series hs on hs.serie_id = s.id and cliente_id = ?
                        join episodios e on e.id = hs.episodio_id and e.id_temporada = t.id)
                , 1) temporada
            FROM series s
            left join categoria_series cs on cs.serie_id = s.id
            left join categorias c on c.id = cs.categoria_id
            left join temporadas t on t.id_serie = s.id
            left join lista_series ls on ls.serie_id = s.id and ls.cliente_id = ?
            where s.id = ?
            group by s.id",
        [$cliente_id, $cliente_id, $request["id"]])[0]];
        } catch(\Exception) {
            return ["error" => "id incorrecto"];
        }
    });}

    public function getSeriesRandom(Request $request) { return ClienteController::checkSession($request, function () {
        return ['series' => DB::select(
            "SELECT s.id, s.titulo, s.portada, 's' tipo
            from series s
            left join historial_series h on h.serie_id = s.id
            group by s.id
            order by count(h.serie_id) desc
            limit 8"
        )];
    });}

    function getSerieId(Request $request) { return ClienteController::checkSession($request, function ($request) {
        return ["id" => DB::select("SELECT s.id from series s
                                    join temporadas t on t.id_serie = s.id
                                    join episodios e on e.id_temporada = t.id and e.id = ?",
                [$request["id"]])[0]->id];
    });}
}
