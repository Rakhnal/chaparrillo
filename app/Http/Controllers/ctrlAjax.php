<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Evento;
use App\Publicacion;

class ctrlAjax extends Controller
{
    public function modificarEventos(){
        
        $id_evento = $_POST['id_e'];
        
        $evento = Evento::find($id_evento);
                   
        return $evento;
    }
}
