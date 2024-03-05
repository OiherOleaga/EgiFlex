<?php

namespace App\Http\Controllers;

use App\Models\Episodio;
use App\Models\Pelicula;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Break_;

class ContenidoController extends Controller
{
    function getContenido(Request $request) { return ClienteController::checkSession($request, function () {

        return ["datosRandom" =>
            DB::select(
                "SELECT id, titulo, portada, tipo
                from (

                    SELECT p.id, p.titulo, p.portada, 'p' tipo, count(h.id_pelicula) fama
                    from peliculas p
                    left join historial_peliculas h on h.id_pelicula = p.id
                    group by p.id

                    union all

                    SELECT s.id, s.titulo, s.portada, 's' tipo, count(h.serie_id) fama
                    from series s
                    left join historial_series h on h.serie_id = s.id
                    group by s.id

                ) contenido order by fama desc limit 8"
            )
        ];

    });}

    function filtro(Request $request) { return ClienteController::checkSession($request, function ($request) {

        $consulta = "SELECT id, titulo, portada ";

        $where = "where ";
        $datos = [];
        switch ($request["tipo"]) {
            case 'n':
                $consulta .= ", tipo from
                (
                    SELECT id, titulo, portada, 'p' as tipo FROM peliculas
                    union all
                    SELECT id, titulo, portada, 's' as tipo FROM series
                ) contenido ";
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


    function getVideo(Request $request) { return ClienteController::checkSession($request, function ($request) {

        switch ($request["tipo"]) {
            case 's':
                $respuesta = DB::select(
                    "SELECT e.id episodio_id, e.archivo, s.poster, ifnull(hs.tiempo, 0) tiempo
                    from series s
                    left join historial_series hs on s.id = hs.serie_id and hs.cliente_id = ?
                    join episodios e on e.id = ifnull(hs.episodio_id, (select e.id from episodios e
                                                                       join temporadas t on e.id_temporada = t.id and t.id_serie = s.id and numero_temporada = 1
                                                                       where numero_episodio = 1))
                    where s.id = ?",
                    [ClienteController::getIdCliente($request), $request["id"]]);
                    break;
            case 'e':
                $respuesta = DB::select(
                    "SELECT e.archivo, s.poster, ifnull(hs.tiempo, 0) tiempo
                    from episodios e
                    join temporadas t on t.id = e.id_temporada
                    join series s on s.id = t.id_serie
                    left join historial_series hs on s.id = hs.serie_id and hs.episodio_id = e.id and hs.cliente_id = ?
                    where e.id = ?",
                    [ClienteController::getIdCliente($request), $request["id"]]);
                    break;
            case 'p':
                $respuesta = DB::select(
                    "SELECT p.archivo, p.poster, ifnull(hp.tiempo, 0) tiempo
                    from peliculas p
                    left join historial_peliculas hp on p.id = hp.id_pelicula
                    where p.id = ?", [$request["id"]]);
                    break;
            default:
                return ["error" => "ni p ni s"];
            }

        return ["video" => (isset($respuesta[0]) ? $respuesta[0] : null)];

    });}


    function seguirViendo(Request $request) { return ClienteController::checkSession($request, function ($request) {

        $cliente_id = ClienteController::getIdCliente($request);

        return ["contenido" => DB::select(
            "SELECT id, titulo, portada, tipo
            from (
                SELECT p.id, p.titulo, p.portada, 'p' as tipo, hp.updated_at
                FROM peliculas p
                join historial_peliculas hp on hp.id_pelicula = p.id and hp.id_cliente = ?
                union all
                SELECT s.id, s.titulo, s.portada, 's' as tipo, hs.updated_at
                FROM series s
                join historial_series hs on hs.serie_id = s.id and hs.cliente_id = ?
            ) c order by updated_at desc
            ",
            [$cliente_id, $cliente_id])];
    });}
}
