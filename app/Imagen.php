<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    protected $table = 'imagenes';
    protected $primaryKey = 'id_imagen';
    public $timestamps = false;
}
