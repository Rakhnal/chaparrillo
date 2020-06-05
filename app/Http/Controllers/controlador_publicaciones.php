<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Clases\Auxiliares\Constantes;
use Illuminate\Support\Facades\Redirect;

class controlador_publicaciones extends Controller {

    /**
     * Esta función muestra todos los documentos al acceder a la página de
     * documentación.
     * @return type
     */
    public function mostrarDocumentos() {
        $documentos = DB::table('documentos')
                ->join('publicaciones', 'publicaciones.id_item', '=', 'documentos.id_documento')
                ->join('adjuntos', 'adjuntos.id_documento', '=', 'publicaciones.id_item')
                ->select('documentos.id_documento as id_documento', 'publicaciones.nombre as nombre', 'publicaciones.descripcion as descripcion', 'fecha_subida', 'visible', 'tipo', 'anio', 'autores', 'documento')
                ->paginate(9);

        if (!session()->has('mostrar')) {
            session()->put('mostrar', $documentos);
        }

        return view(Constantes::DOCUMENTACION);
    }

    /**
     * Esta función filtra los documentos por la categoría elegida.
     * @param Request $req
     * @return type
     */
    public function mostrarDocumentosFiltrados(Request $req) {
        $categoria = $req->get('selectCategoria');

//        dd($categoria);

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

//        dd($mostrar);

        session()->put('mostrar', $mostrar);

//        return view(Constantes::DOCUMENTACION, ['docs' => $mostrar]);
//        return Redirect::route('documentacion', ['docs' => $mostrar]);
        return Redirect::route('documentacion');
//        return redirect()->route('documentacion', [$mostrar]);
    }

}
