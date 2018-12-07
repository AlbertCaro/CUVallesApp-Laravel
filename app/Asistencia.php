<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    protected $fillable = [
        'codigo',
        'fecha',
        'hora_entrada',
        'hora_salida'
    ];
}
