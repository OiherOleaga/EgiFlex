<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistorialSerie extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_serie',
        'id_cliente',
        'cliente_id',
        'visto',
        'viendo'
    ];
}
