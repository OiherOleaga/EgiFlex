<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistorialEpisodios extends Model
{
    protected $fillable = [
        'episodio_id',
        'historial_serie_id',
        'visto',
        'viendo',
        'tiempo'
    ];
    
    use HasFactory;
}
