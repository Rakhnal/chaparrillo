<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
    protected $table = 'respuestas';
    protected $primaryKey = 'id_respuestas';
    public $timestamps = false;
}
