<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Controladores
use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\CategoriaPeliculaController;
use App\Http\Controllers\CategoriaSerieController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EpisodioController;
use App\Http\Controllers\FavoritoController;
use App\Http\Controllers\HistorialPeliculaController;
use App\Http\Controllers\HistorialSerieController;
use App\Http\Controllers\PeliculaController;
use App\Http\Controllers\SerieController;
use App\Http\Controllers\TemporadaController;
use App\Http\Controllers\EstadisticasController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware('auth')->group(function () {
    //Index
    Route::get('/index', function () {
        return view('index');
    })->name('index');

    //Breeze
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Categorias
    Route::get('/categorias', [CategoriaController::class, 'index'])->name('categorias.index');
    Route::get('/categorias/create', [CategoriaController::class, 'create'])->name('categorias.create');
    Route::post('/categorias', [CategoriaController::class, 'store'])->name('categorias.store');
    Route::get('/categorias/{categoria}', [CategoriaController::class, 'show'])->name('categorias.show');
    Route::get('/categorias/{categoria}/edit', [CategoriaController::class, 'edit'])->name('categorias.edit');
    Route::put('/categorias/{categoria}', [CategoriaController::class, 'update'])->name('categorias.update');
    Route::delete('/categorias/{categoria}', [CategoriaController::class, 'destroy'])->name('categorias.destroy');

    //Clientes
    Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes.index');
    Route::get('/aceptar/{id}/cliente', [ClienteController::class, 'aceptar']);

    Route::get('/clientes/create', [ClienteController::class, 'create'])->name('clientes.create');
    Route::post('/clientes', [ClienteController::class, 'store'])->name('clientes.store');
    Route::get('/clientes/{cliente}', [ClienteController::class, 'show'])->name('clientes.show');
    Route::get('/clientes/{cliente}/edit', [ClienteController::class, 'edit'])->name('clientes.edit');
    Route::put('/clientes/{cliente}', [ClienteController::class, 'update'])->name('clientes.update');
    Route::delete('/clientes/{cliente}', [ClienteController::class, 'destroy'])->name('clientes.destroy');

    //Episodios
    Route::get('/episodios', [EpisodioController::class, 'index'])->name('episodios.index');
    Route::get('/episodios/create', [EpisodioController::class, 'create'])->name('episodios.create');
    Route::post('/episodios', [EpisodioController::class, 'store'])->name('episodios.store');
    Route::get('/episodios/{episodio}', [EpisodioController::class, 'show'])->name('episodios.show');
    Route::get('/episodios/{episodio}/edit', [EpisodioController::class, 'edit'])->name('episodios.edit');
    Route::put('/episodios/{episodio}', [EpisodioController::class, 'update'])->name('episodios.update');
    Route::delete('/episodios/{episodio}', [EpisodioController::class, 'destroy'])->name('episodios.destroy');

    // Películas
    Route::get('/peliculas', [PeliculaController::class, 'index'])->name('peliculas.index');
    Route::get('/peliculas/create', [PeliculaController::class, 'create'])->name('peliculas.create');
    Route::post('/peliculas', [PeliculaController::class, 'store'])->name('peliculas.store');
    Route::get('/peliculas/{pelicula}', [PeliculaController::class, 'show'])->name('peliculas.show');
    Route::get('/peliculas/{pelicula}/edit', [PeliculaController::class, 'edit'])->name('peliculas.edit');
    Route::put('/peliculas/{pelicula}', [PeliculaController::class, 'update'])->name('peliculas.update');
    Route::delete('/peliculas/{pelicula}', [PeliculaController::class, 'destroy'])->name('peliculas.destroy');

    //Series
    Route::get('/series', [SerieController::class, 'index'])->name('series.index');
    Route::get('/series/create', [SerieController::class, 'create'])->name('series.create');
    Route::post('/series', [SerieController::class, 'store'])->name('series.store');
    Route::get('/series/{serie}', [SerieController::class, 'show'])->name('series.show');
    Route::get('/series/{serie}/edit', [SerieController::class, 'edit'])->name('series.edit');
    Route::put('/series/{serie}', [SerieController::class, 'update'])->name('series.update');
    Route::delete('/series/{serie}', [SerieController::class, 'destroy'])->name('series.destroy');

    //Temporadas
    Route::get('/temporadas', [TemporadaController::class, 'index'])->name('temporadas.index');
    Route::get('/temporadas/create', [TemporadaController::class, 'create'])->name('temporadas.create');
    Route::post('/temporadas', [TemporadaController::class, 'store'])->name('temporadas.store');
    Route::get('/temporadas/{temporada}', [TemporadaController::class, 'show'])->name('temporadas.show');
    Route::get('/temporadas/{temporada}/edit', [TemporadaController::class, 'edit'])->name('temporadas.edit');
    Route::put('/temporadas/{temporada}', [TemporadaController::class, 'update'])->name('temporadas.update');
    Route::delete('/temporadas/{temporada}', [TemporadaController::class, 'destroy'])->name('temporadas.destroy');

    //Estadisticas
    Route::get('/estadisticas', [EstadisticasController::class, 'index']);


});

require __DIR__ . '/auth.php';
