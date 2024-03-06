<?php

namespace App\Http\Controllers;

use App\Models\Episodio;
use App\Models\HistorialPelicula;
use App\Models\HistorialSerie;
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
                    // si lo a terminado ??
                    HistorialSerie::create([
                        'cliente_id' => $cliente_id,
                        'serie_id' => $serie_id,
                        'episodio_id' => $request["id"],
                        'tiempo' => $request["tiempo"]
                    ]);

                } else {
                    if (Episodio::where("id", $request["id"])->where("duracion", "<=", $request["tiempo"])->exists()) {
                        if (isset(DB::select("SELECT 'x'
                                            from temporadas t
                                            join episodios e on e.numero_episodio = t.numero_episodios and e.id = :episodio_id
                                            where t.numero_temporada = (select count(*) from temporada where id_serie = :serie_id)",
                        [
                            "episodio_id" => $request["id"],
                            "serie_id" => $serie_id
                        ]))) {
                            DB::update("update historial_series set viendo = 0, visto = 1, episodio_id = 1, tiempo = 0 where id = :id", [
                                "id" => $historiales[0]->id
                            ]);

                        } else {
                            DB::select("SELECT e.id
                                        from episodios e
                                        join (select numero_episodio + 1 numero_episodio, e.temporada_id from episodios where id = :episodio_id) sub
                                            on e.numero_episodio = sub.numero_episodio and e.temporada_id = sub.temporada_id
                                        where e.numero_episodio = ",
                                        [
                                            "episodio_id" => $request["id"],
                                        ]);
                            // select para sacar el siguiente episodio y update
                        }

                    } else {
                        DB::update("update historial_series set viendo = 1, episodio_id = :episodio_id, tiempo = :tiempo where id = :id", [
                            "episodios_id" => $request["id"],
                            "tiempo" => $request["tiempo"],
                            "id" => $historiales[0]->id
                        ]);
                    }
                }

                return ["ok" => true];

                break;
            case 'p':
                break;
            default:
                return ["error" => "ni p ni e"];
        }
        // todo esto, poner controles directos, barrita, filtro, deploy
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
