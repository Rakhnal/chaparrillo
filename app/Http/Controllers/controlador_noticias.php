<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Clases\conexion;
use App\Clases\Auxiliares\Constantes;
use Illuminate\Support\Facades\DB;

class controlador_noticias extends Controller {
    //************************************************************************//
    //DES11: Página para administrar noticias
    //************************************************************************//
    /**
     * Esta función lista todos las noticias de la base de datos.
     * @return type
     */
    public function listarnoticias() {
        $noticias = DB::table('noticias')
                ->select('id_noticia', 'tipo', 'enlace')
                ->paginate(8);
        return view(Constantes::AD_NOTICIAS, ['noticias' => $noticias]);
    }

}
