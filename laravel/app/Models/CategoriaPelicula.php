<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaPelicula extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_categoria',
        'id_pelicula',
    ];
}
