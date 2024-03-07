<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistorialSerie extends Model
{
    use HasFactory;

    protected $fillable = [
        'serie_id',
        'cliente_id',
        'episodio_id',
        'tiempo',
        'visto',
        'viendo'
    ];

    public function serie()
    {
        return $this->belongsTo(Serie::class);
    }
}
