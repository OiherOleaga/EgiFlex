<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temporada extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_serie',
        'numero_temporada',
        'numero_episodios',
        'fecha_estreno',
    ];
}
