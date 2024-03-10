<?php

namespace App\Http\Controllers;

use App\Models\Episodio;
use App\Models\HistorialPelicula;
use App\Models\HistorialSerie;
use App\Models\Pelicula;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HistorialController extends Controller
{
    function setHistorial(Request $request) { return ClienteController::checkSession($request, function ($request) {
        $cliente_id = ClienteController::getIdCliente($request);
        switch($request["tipo"]) {
            case 'e':
                $serie_id = DB::select("SELECT s.id FROM series s
                                        join temporadas t on t.id_serie = s.id
                                        join episodios e on e.id_temporada = t.id and e.id = ?", [$request["id"]])[0]->id;

                $historiales =  DB::select(
                    "SELECT hs.id
                    from series s
                    left join historial_series hs on s.id = hs.serie_id and hs.cliente_id = ?
                    where s.id = ?",
                    [$cliente_id, $serie_id]);

                if (!isset($historiales[0])) {
                    return ["error" => "link erroneo"];
                }

                if (!$historiales[0]->id) {
                    HistorialSerie::create([
                        'cliente_id' => $cliente_id,
                        'serie_id' => $serie_id,
                        'episodio_id' => $request["id"],
                        'tiempo' => $request["tiempo"]
                    ]);

                } else {
                    if (Episodio::where("id", $request["id"])->where("duracion", "<=", $request["tiempo"] / 60)->exists()) {
                        $visto = DB::select(
                                "SELECT case
                                            when t.numero_temporada = (select count(*) from temporadas where id_serie = :serie_id) then 1
                                            else 0
                                        end visto
                                from temporadas t
                                join episodios e on e.id_temporada = t.id and e.id = :episodio_id
                                where e.numero_episodio - (
                                                            select ifnull(max(e.numero_episodio), 0)
                                                            from temporadas t2
                                                            join episodios e on e.id_temporada = t2.id
                                                            where t2.numero_temporada = t.numero_temporada - 1 and t2.id_serie = :serie_id2
                                                          ) = t.numero_episodios",
                        [
                            "episodio_id" => $request["id"],
                            "serie_id" => $serie_id,
                            "serie_id2" => $serie_id
                        ]);

                        if (!isset($visto[0])) {
                            $episodio_id = DB::select(
                                        "SELECT e.id
                                        from episodios e
                                        join (select e.numero_episodio + 1 numero_episodio, e.id_temporada
                                              from episodios e
                                              where e.id = :episodio_id
                                            ) sub on e.numero_episodio = sub.numero_episodio and e.id_temporada = sub.id_temporada",
                                        [
                                            "episodio_id" => $request["id"],
                                        ]);

                            DB::update("update historial_series set episodio_id = :episodio_id, tiempo = 0 where id = :id", [
                                "episodio_id" => $episodio_id[0]->id,
                                "id" => $historiales[0]->id
                            ]);

                            return ["ok" => "cambio episodio"];
                        } else if (!$visto[0]->visto) {
                            $episodio_id = DB::select(
                                        "SELECT e.id
                                        from episodios e
                                        join temporadas t on e.id_temporada = t.id and t.id_serie = :serie_id and
                                                            t.numero_temporada = (select t.numero_temporada + 1 from temporadas t join episodios e on t.id = e.id_temporada and e.id = :episodio_id)
                                        where e.numero_episodio = (SELECT MIN(e2.numero_episodio)
                                                                    FROM episodios e2
                                                                    WHERE e2.id_temporada = e.id_temporada) ",
                                        [
                                            "episodio_id" => $request["id"],
                                            "serie_id" => $serie_id,
                                        ]);

                            DB::update("update historial_series set episodio_id = :episodio_id, tiempo = 0 where id = :id", [
                                "episodio_id" => $episodio_id[0]->id,
                                "id" => $historiales[0]->id
                            ]);

                            return ["ok" => "cambio temporada"];
                        } else {
                            DB::update("update historial_series set viendo = 0, visto = 1, episodio_id = 1, tiempo = 0 where id = :id", [
                                "id" => $historiales[0]->id
                            ]);

                            return ["ok" => "visto"];
                        }

                    } else {
                        DB::update("update historial_series set viendo = 1, episodio_id = :episodio_id, tiempo = :tiempo where id = :id", [
                            "episodio_id" => $request["id"],
                            "tiempo" => $request["tiempo"],
                            "id" => $historiales[0]->id
                        ]);
                    }
                }


                break;
            case 'p':
                $historiales = DB::select("SELECT hp.* from historial_peliculas hp
                                            where hp.id_cliente = :cliente_id and hp.id_pelicula = :pelicula_id",
                                            [
                                                "pelicula_id" => $request["id"],
                                                "cliente_id" => $cliente_id
                                            ]);

                if (!isset($historiales[0])) {
                    HistorialPelicula::create([
                        "id_cliente" => $cliente_id,
                        "id_pelicula" => $request["id"],
                        "tiempo" => $request["tiempo"]
                    ]);
                } else {
                    if (Pelicula::where("id", $request["id"])->where("duracion", "<=", $request["tiempo"] / 60)->exists()) {
                        DB::update("update historial_peliculas set viendo = 0, visto = 1, tiempo = 0 where id = :id", [
                            "id" => $historiales[0]->id
                        ]);
                    } else {
                        DB::update("update historial_peliculas set viendo = 1, tiempo = :tiempo where id = :id", [
                            "tiempo" => $request["tiempo"],
                            "id" => $historiales[0]->id
                        ]);
                    }
                }

                break;
            default:
                return ["error" => "ni p ni e"];
        }
        return ["ok" => true];
    });}

    function quitarViendo(Request $request) { return ClienteController::checkSession($request, function ($request) {
        switch($request["tipo"]) {
            case 's':
                $historial = HistorialSerie::find($request["historial_id"]);
                break;
            case 'p':
                $historial = HistorialPelicula::find($request["historial_id"]);
                break;
            default:
                return ["error" => "ni p ni s"];
        }

        if (!$historial) {
            return ["error" => "id o tipo incorrecto"];
        }

        $historial->viendo = false;
        $historial->save();

        return ["ok" => true];
    });}
}
