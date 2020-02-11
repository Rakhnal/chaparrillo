<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Evento;

class ctrlAjax extends Controller
{
    public function modificarEventos(){
        
        $id_evento = intval($_POST['id_e']);
        
            $evento = Evento::find($id_evento)
                ->first();

        return view('administracion/admin_eventos', ['events' => $evento]);
    }
}
