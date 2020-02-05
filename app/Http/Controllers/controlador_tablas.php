<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class controlador_tablas extends Controller {

    public function listarDocumentos() {
        $documentos = DB::table('documentos')
                        ->join('publicaciones', 'publicaciones.id_item', '=', 'documentos.id_documento')
                        ->select('documentos.id_documento', 'nombre', 'descripcion', 'fecha_subida')
                        ->paginate(8);

        return view('administracion/adminDocument', ['docs' => $documentos]);
    }
    
    public function listarEventos() {
        $eventos = DB::table('eventos')
                        ->join('publicaciones', 'publicaciones.id_item', '=', 'eventos.id_evento')
                        ->select('eventos.id_evento', 'nombre', 'descripcion', 'fecha_subida', 'fecha_inicio', 'fecha_fin')
                        ->paginate(8);

        return view('administracion/admin_eventos', ['events' => $eventos]);
    }

}
