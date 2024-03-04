<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListaSerie extends Model
{
    use HasFactory;

    protected $fillable = [
        'serie_id',
        'cliente_id',
    ];
}
