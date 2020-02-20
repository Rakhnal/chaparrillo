<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    protected $primaryKey = 'id_noticia';
    public $incrementing = false;
    public $timestamps = false;
}
