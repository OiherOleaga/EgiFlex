<?php

use App\Http\Controllers\ClienteController;
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
Route::get("/contenido", [PeliculaController::class, "getContenido"]);
Route::get("/peliculas", [PeliculaController::class, "getPeliculas"]);
Route::get("/peliculas/random", [PeliculaController::class, "getpelisRandom"]);


Route::get("/series", [SerieController::class, "getSeries"]);

Route::post("/iniciarSesion", [ClienteController::class, "comprobarInicioSesion"]);
Route::post("/registrar", [ClienteController::class, "regristro"]);
Route::get("/checkSession", [ClienteController::class, "checkSession"]);
