<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'director',
        'ano_lanzamiento',
        'sinopsis',
        'portada',
        'poster',
    ];

    public function categorias()
    {
        return $this->belongsToMany(Categoria::class, 'categoria_series');
    }
}
