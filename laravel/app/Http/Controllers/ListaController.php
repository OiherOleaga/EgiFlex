<?php

namespace App\Http\Controllers;

use App\Models\ListaPelicula;
use App\Models\ListaSerie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ListaController extends Controller
{

    function addLista(Request $request) { return ClienteController::checkSession($request, function ($request) {

        switch ($request["tipo"]) {
            case 's':
                ListaSerie::create([
                    'cliente_id' => Crypt::decrypt($request->header("sessionId")),
                    'serie_id' => $request["id"]
                ]);
                break;
            case 'p':
                ListaPelicula::create([
                    'cliente_id' => Crypt::decrypt($request->header("sessionId")),
                    'pelicula_id' => $request["id"]
                ]);
                break;
        }
        return [];
    });}
}
