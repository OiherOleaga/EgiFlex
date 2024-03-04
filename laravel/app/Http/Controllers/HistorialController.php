<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class HistorialController extends Controller
{
    function setHistorial(Request $request) { return ClienteController::checkSession($request, function ($request) {
        switch($request["tipo"]) {
            case 's':
                $historiales =  DB::select(
                    "SELECT hs.id hs
                    from episodios e
                    join temporadas t on t.id = e.id_temporada
                    join series s on s.id = t.id_serie
                    left join historial_series hs on s.id = hs.serie_id and hs.cliente_id = " . Crypt::decrypt($request->header("sessionId")) . "
                    where e.id = ?", [$request["id"]]);

                if (!isset($historiales[0])) {
                    return ["error" => "link erroneo"];
                }

                if ($historiales[0]->hs) {
                    // atulizar hs
                } else {
                    // crear hs
                }

            case 'p':
            default:
                return ["error" => "ni p ni s"];
        }
    });}
}
