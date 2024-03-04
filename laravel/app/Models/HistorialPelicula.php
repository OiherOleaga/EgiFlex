<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistorialPelicula extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_pelicula',
        'id_cliente',
        'visto',
        'viendo',
        'tiempo'
    ];
}
