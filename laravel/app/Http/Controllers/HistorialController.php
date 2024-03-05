<?php

namespace App\Http\Controllers;

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
                    "SELECT hs.*
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

                    return ["ok" => true];
                } else {
                    // atulizar hs
                    //$historiales[0]->save();
                    // todo esto, poner controles directos, barrita, filtro, deploy
                }

                break;
            case 'p':
                break;
            default:
                return ["error" => "ni p ni s"];
        }
    });}
}
