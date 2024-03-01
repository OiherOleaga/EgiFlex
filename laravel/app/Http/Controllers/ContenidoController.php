<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContenidoController extends Controller
{
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

    function filtro(Request $request) { return ClienteController::checkSession($request, function ($request) {

        $consulta = "SELECT id, titulo, portada ";

        $where = "where ";
        $datos = [];
        switch ($request["tipo"]) {
            case 'n':
                $subConsulta .= ", tipo from 
                (
                    SELECT id, titulo, portada, 'p' as tipo FROM peliculas
                    union all
                    SELECT id, titulo, portada, 's' as tipo FROM series
                ) contenido";
                break;
            case 's':
                $consulta .= ", 's' as tipo from series ";
                break;
            case 'p':
                $consulta .= ", 'p' as tipo from peliculas ";
                break;
            default: 
                return [];
        }

        if (isset($request["busqueda"])) {
            $where .= "titulo like ?";
            array_push($datos, "%" . $request["busqueda"] . "%");
        }

        $select = $consulta . ($where == "where " ? "" : $where);
        //return ["select" => $select, "datos" => $datos];
        return ["contenido" => DB::select($select, $datos)];
    });}
}
