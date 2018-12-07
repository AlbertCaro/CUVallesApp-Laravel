<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    protected $fillable = [
        'CRN',
        'nombre',
        'profesor',
        'dia',
        'entrada',
        'salida'
    ];
}
