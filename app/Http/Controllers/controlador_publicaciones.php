<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Clases\Auxiliares\Constantes;
use Illuminate\Support\Facades\Redirect;

class controlador_publicaciones extends Controller {
    /**
     * Esta función muestra todos los documentos o los filtra por la categoría
     * elegida.
     * @param Request $req
     * @return type
     */
    public function mostrarDocumentos(Request $req) {
        $categoria = $req->get('selectCategoria');

//        dd($categoria);

        if ($categoria == null) {
            $mostrar = DB::table('documentos')
                    ->join('publicaciones', 'publicaciones.id_item', '=', 'documentos.id_documento')
                    ->join('adjuntos', 'adjuntos.id_documento', '=', 'publicaciones.id_item')
                    ->select('documentos.id_documento as id_documento', 'publicaciones.nombre as nombre', 'publicaciones.descripcion as descripcion', 'fecha_subida', 'visible', 'tipo', 'anio', 'autores', 'documento')
                    ->paginate(9);
        } else {
            if (strcmp($categoria, "todas") === 0) {
                $mostrar = DB::table('documentos')
                        ->join('publicaciones', 'publicaciones.id_item', '=', 'documentos.id_documento')
                        ->join('adjuntos', 'adjuntos.id_documento', '=', 'publicaciones.id_item')
                        ->select('documentos.id_documento as id_documento', 'publicaciones.nombre as nombre', 'publicaciones.descripcion as descripcion', 'fecha_subida', 'visible', 'tipo', 'anio', 'autores', 'documento')
                        ->paginate(9);
            } else {
                $mostrar = DB::table('documentos')
                        ->join('publicaciones', 'publicaciones.id_item', '=', 'documentos.id_documento')
                        ->join('adjuntos', 'adjuntos.id_documento', '=', 'publicaciones.id_item')
                        ->join('asignar_categorias', 'asignar_categorias.id_item', '=', 'publicaciones.id_item')
                        ->select('documentos.id_documento as id_documento', 'publicaciones.nombre as nombre', 'publicaciones.descripcion as descripcion', 'fecha_subida', 'visible', 'tipo', 'anio', 'autores', 'documento')
                        ->where('asignar_categorias.id_categoria', '=', $categoria)
                        ->paginate(9);
            }
        }

//        dd($mostrar);

        return view(Constantes::DOCUMENTACION, ['docs' => $mostrar]);
    }

    public function recogerDatos() {
        $id_documento = intval($_POST["identificador"]);

        $documento = DB::select('SELECT publicaciones.id_item as id_item, publicaciones.nombre as nombre, publicaciones.descripcion as descripcion, '
                        . 'anio, autores, documento FROM documentos '
                        . 'JOIN publicaciones ON documentos.id_documento = publicaciones.id_item '
                        . 'JOIN adjuntos ON documentos.id_documento = adjuntos.id_documento '
                        . 'WHERE documentos.id_documento = ' . $id_documento);

        $doc = array(
            'id_item' => $documento[0]->id_item,
            'nombre' => $documento[0]->nombre,
            'descripcion' => $documento[0]->descripcion,
            'anio' => $documento[0]->anio,
            'autores' => $documento[0]->autores,
            'documento' => base64_encode($documento[0]->documento)
        );

        echo json_encode($doc);
    }

}
