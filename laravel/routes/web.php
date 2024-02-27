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
    Route::resource('categorias', CategoriaController::class);

    //Clientes
    Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes.index');

    //Episodios
    Route::get('/episodios', [EpisodioController::class, 'index'])->name('episodios.index');

    //Peliculas
    Route::get('/peliculas', [PeliculaController::class, 'index'])->name('peliculas.index');

    //Series
    Route::get('/series', [SerieController::class, 'index'])->name('series.index');

    //Temporadas
    Route::get('/temporadas', [TemporadaController::class, 'index'])->name('temporadas.index');

});

require __DIR__.'/auth.php';