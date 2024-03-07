<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        $consulta = "SELECT c.id, c.titulo, c.portada ";
        $where = "where ";
        $hayWhere = false;

        $datos = [];
        switch ($request["tipo"]) {
            case 'n':
                $consulta .= ", tipo from
                (
                    SELECT p.id, p.titulo, p.portada, 'p' as tipo, cp.categoria_id categoria_id FROM peliculas p
                    left join categoria_peliculas cp on cp.pelicula_id = p.id
                    union all
                    SELECT s.id, s.titulo, s.portada, 's' as tipo, cs.categoria_id categoria_id FROM series s
                    left join categoria_series cs on cs.serie_id = s.id
                ) c ";
                break;
            case 's':
                $consulta .= ", 's' as tipo from series c
                                left join categoria_series cs on cs.serie_id = c.id ";
                break;
            case 'p':
                $consulta .= ", 'p' as tipo from peliculas c
                            left join categoria_peliculas cp on cp.pelicula_id = c.id ";
                break;
            default:
                return [];
        }

        if (isset($request["busqueda"])) {
            $where .= "titulo like ? ";
            array_push($datos, "%" . $request["busqueda"] . "%");
            $hayWhere = true;
        }

        if (isset($request["categorias"])) {

            $condicones = "0 ";
            foreach ($request["categorias"] as $id) {
                $condicones .= "or categoria_id = ? ";
                array_push($datos, $id);
            }

            $where .=  ($hayWhere ? "and ( ": "( ") . $condicones . " )"; 
            $hayWhere = true;
        }

        $select = $consulta . ($hayWhere ? $where : "");
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
            "SELECT id, titulo, portada, tipo, historial_id
            from (
                SELECT p.id, p.titulo, p.portada, 'p' as tipo, hp.id historial_id, hp.updated_at
                FROM peliculas p
                join historial_peliculas hp on hp.id_pelicula = p.id and hp.id_cliente = ? and hp.viendo = 1
                union all
                SELECT s.id, s.titulo, s.portada, 's' as tipo, hs.id historial_id, hs.updated_at
                FROM series s
                join historial_series hs on hs.serie_id = s.id and hs.cliente_id = ? and hs.viendo = 1
            ) c order by updated_at desc
            ",
            [$cliente_id, $cliente_id])];
    });}
}
