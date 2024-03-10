<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ContenidoController;
use App\Http\Controllers\EpisodioController;
use App\Http\Controllers\HistorialController;
use App\Http\Controllers\ListaController;
use App\Http\Controllers\PeliculaController;
use App\Http\Controllers\SerieController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::get("/pelis/popular", [PeliculaController::class, "getPelisRandom"]);
Route::post("/getDetallesPelicula", [PeliculaController::class, "getDetallesPelicula"]);


Route::post("/getDetallesSerie", [SerieController::class, "getDetallesSerie"]);
Route::get("/series/popular", [SerieController::class, "getSeriesRandom"]);
Route::post("/getSerieId", [SerieController::class, "getSerieId"]);

Route::post("/iniciarSesion", [ClienteController::class, "comprobarInicioSesion"]);
Route::post("/registrar", [ClienteController::class, "registro"]);
Route::get("/checkSession", [ClienteController::class, "checkSession"]);

Route::post("/filtro", [ContenidoController::class, "filtro"]);
Route::get("/contenido/popular", [ContenidoController::class, "getContenido"]);
Route::post("/getVideo", [ContenidoController::class, "getVideo"]);
Route::get("/seguirViendo", [ContenidoController::class, "seguirViendo"]);

Route::get("/categorias", [CategoriaController::class, "categorias"]);

Route::post("/episodios", [EpisodioController::class, "episodios"]);

Route::post("/historial", [HistorialController::class, "setHistorial"]);
Route::post("/quitarViendo", [HistorialController::class, "quitarViendo"]);

Route::post("/addLista", [ListaController::class, "addLista"]);
Route::post("/rmLista", [ListaController::class, "rmLista"]);
Route::get("/getLista", [ListaController::class, "getLista"]);
