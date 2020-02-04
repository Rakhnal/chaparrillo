<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class controlador_tablas extends Controller {

    public function listar() {
        $documentos = DB::table('documentos')
                        ->join('publicaciones', 'publicaciones.id_item', '=', 'documentos.id_documento')
                        ->select('documentos.id_documento', 'nombre', 'descripcion', 'fecha_subida')
                        ->paginate(10);

        return view('administracion/adminDocument', ['docs' => $documentos]);
    }

}
