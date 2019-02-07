<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $table = 'place';
    protected $fillable = ['nombre', 'descripcion', 'encargado', 'extension', 'logitud', 'latitud', 'foto'];
}
