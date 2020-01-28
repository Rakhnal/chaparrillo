<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publicacion extends Model
{
    protected $table = 'publicaciones';
    protected $primaryKey = 'id_item';
    public $timestamps = false;
}
