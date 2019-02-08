<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Place
 * @package App
 */
class Place extends Model
{
    protected $table = 'place';
    protected $fillable = ['nombre', 'descripcion', 'encargado', 'extension', 'longitud', 'latitud', 'foto'];
}
