<?php

namespace App\Http\Controllers;

use App\Models\ListaPelicula;
use App\Models\ListaSerie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class ListaController extends Controller
{

    function addLista(Request $request) { return ClienteController::checkSession($request, function ($request) {

        $cliente_id = Crypt::decrypt($request->header("sessionId"));

        switch ($request["tipo"]) {
            case 's':
                if (ListaSerie::where("cliente_id", $cliente_id)->where("serie_id", $request["id"])->exists()) {
                    return ["error" => "ya esta en la lista"];
                }

                ListaSerie::create([
                    'cliente_id' => $cliente_id,
                    'serie_id' => $request["id"]
                ]);

                break;
            case 'p':
                if (ListaPelicula::where("cliente_id", $cliente_id)->where("pelicula_id", $request["id"])->exists()) {
                    return ["error" => "ya esta en la lista"];
                }

                ListaPelicula::create([
                    'cliente_id' => $cliente_id,
                    'pelicula_id' => $request["id"]
                ]);
                break;
            default:
                return ["error" => "ni p ni s"];
        }

        return ["ok" => true];
    });}

    function rmLista(Request $request) { return ClienteController::checkSession($request, function ($request) {

        $cliente_id = Crypt::decrypt($request->header("sessionId"));

        switch ($request["tipo"]) {
            case 's':
                $lista = ListaSerie::where("cliente_id", $cliente_id)->where("serie_id", $request["id"])->first();
                break;
            case 'p':
                $lista = ListaPelicula::where("cliente_id", $cliente_id)->where("pelicula_id", $request["id"])->first();
                break;
            default:
                return ["error" => "ni p ni s"];
        }

        if (!$lista) {
            return ["error" => "no esta en la lista"];
        }
        
        $lista->delete();
        
        return ["ok" => true];
    });}

    function getLista(Request $request) { return ClienteController::checkSession($request, function ($request) {
        return ["contenido" => DB::select(

            "SELECT id, titulo, portada, tipo FROM (
                select s.id, s.titulo, s.portada, 's' tipo, ls.created_at 
                from series s
                join lista_series ls on ls.serie_id = s.id
                union all
                select p.id, p.titulo, p.portada, 'p' tipo, lp.created_at 
                from peliculas p
                join lista_peliculas lp on lp.pelicula_id = p.id
            ) contenido order by created_at desc"
        )];
    });}
}
