<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episodio extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_temporada',
        'titulo',
        'numero_episodio',
        'duracion',
        'sinopsis',
        'fecha_estreno',
        'archivo',
        'portada',
    ];

    public function temporada()
    {
        return $this->belongsTo(Temporada::class, 'id_temporada');
    }
}
