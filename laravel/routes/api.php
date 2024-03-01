<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ContenidoController;
use App\Http\Controllers\PeliculaController;
use App\Http\Controllers\SerieController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get("/peliculas", [PeliculaController::class, "getPeliculas"]);
Route::get("/pelis/random", [PeliculaController::class, "getPelisRandom"]);

Route::post("/getDetallesPelicula", [PeliculaController::class, "getDetallesPelicula"]);
Route::get("/peliculas", [PeliculaController::class, "getPeliculas"]);


Route::get("/series", [SerieController::class, "getSeries"]);
Route::post("/getDetallesSerie", [SerieController::class, "getDetallesSerie"]);
Route::get("/series/random", [SerieController::class, "getSeriesRandom"]);

Route::post("/iniciarSesion", [ClienteController::class, "comprobarInicioSesion"]);
Route::post("/registrar", [ClienteController::class, "regristro"]);
Route::get("/checkSession", [ClienteController::class, "checkSession"]);

Route::post("/filtro", [ContenidoController::class, "filtro"]);
Route::get("/contenido/random", [ContenidoController::class, "getContenido"]);