<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Clases\Auxiliares\Constantes;

class controlador_publicaciones extends Controller {

    public function mostrarDocumentos() {
        $documentos = DB::table('documentos')
                ->join('publicaciones', 'publicaciones.id_item', '=', 'documentos.id_documento')
                ->join('adjuntos', 'adjuntos.id_documento', '=', 'publicaciones.id_item')
                ->select('documentos.id_documento as id_documento', 'publicaciones.nombre as nombre', 'publicaciones.descripcion as descripcion', 'fecha_subida', 'visible', 'tipo', 'num_descargas', 'anio', 'autores', 'documento')
                ->paginate(12);
        
        $categorias = DB::table('categorias')
                ->join('asignar_categorias', 'asignar_categorias.id_categoria', '=', 'categorias.id_categoria')
                ->join('publicaciones', 'publicaciones.id_item', '=', 'asignar_categorias.id_item')
                ->select('categorias.nombre as categoria');

        $datos = [
            'docs' => $documentos,
            'categorias' => $categorias
        ];

        return view(Constantes::DOCUMENTACION, $datos);
    }

}
