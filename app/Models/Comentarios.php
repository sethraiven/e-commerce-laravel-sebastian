<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comentarios extends Model
{
    protected $table = 'comentarios';

    protected $fillable = [
        'contenido',
        'nombre_usuario',
        'email',
        'id_articulo',
    ];
}