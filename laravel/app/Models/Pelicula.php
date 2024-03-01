<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'director',
        'ano_lanzamiento',
        'sinopsis',
        'duracion',
        'archivo',
        'portada',
        'poster',
    ];

    public function categorias()
    {
        return $this->belongsToMany(Categoria::class, 'categoria_peliculas');
    }
}
