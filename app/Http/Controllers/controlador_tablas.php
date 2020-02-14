<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Evento;
use App\Publicacion;
use App\Imagen;

class controlador_tablas extends Controller {

    public function listarDocumentos() {
        $documentos = DB::table('documentos')
                ->join('publicaciones', 'publicaciones.id_item', '=', 'documentos.id_documento')
                ->select('documentos.id_documento', 'nombre', 'descripcion', 'fecha_subida', 'visible')
                ->paginate(8);

        return view('administracion/adminDocument', ['docs' => $documentos]);
    }

    public function listarEventos() {
        $eventos = DB::table('eventos')
                ->join('publicaciones', 'publicaciones.id_item', '=', 'eventos.id_evento')
                ->select('eventos.id_evento', 'nombre', 'localizacion', 'fecha_subida', 'fecha_inicio', 'fecha_fin')
                ->paginate(8);

        return view('administracion/admin_eventos', ['events' => $eventos]);
    }

    public function eliminarEventos(Request $req) {
        $id_evento = intval($req->get('id_e'));

        $event = Evento::find($id_evento);
        $publi = Publicacion::find($id_evento);
        $image = Imagen::where('id_item', $id_evento)->first();

        $catego = DB::table('asignar_categorias')->where('id_item', '=', $id_evento)->delete();


        $event->delete();
        $publi->delete();
        $image->delete();

        $eventos = DB::table('eventos')
                ->join('publicaciones', 'publicaciones.id_item', '=', 'eventos.id_evento')
                ->select('eventos.id_evento', 'nombre', 'localizacion', 'fecha_subida', 'fecha_inicio', 'fecha_fin')
                ->paginate(8);

        return view('administracion/admin_eventos', ['events' => $eventos]);
    }

    public function agregarEventos(Request $req) {
        $publi = new Publicacion();
        $publi = Publicacion::where('nombre', $req->get('nomb'))->first();

        //si no existe la publicación
        if (empty($publi)) {

            $publi = new Publicacion();
            $image = new Imagen();
            $evento = new Evento();

            $publi->nombre = $req->get('nomb');
            $publi->descripcion = $req->get('descrip');
            $publi->id_user = 1; //se deberá sacar la id de la sesión del usuario registrado
            $publi->likes = 0;
            $publi->views = 0;
            $publi->editado = 0;
            $publi->fecha_subida = date('Y-m-d');

            $image->imagen = $req->file('portada');

            $evento->fecha_inicio = $req->get('feci');
            $evento->fecha_fin = $req->get('fecf');
            $evento->localizacion = $req->get('loca');
            $evento->longitud = 32165416;
            $evento->latitud = 6516516;

            $publi->save();

            $categ = $req->get('catego');

            $publi = Publicacion::where('nombre', $req->get('nomb'))->first();

            $evento->id_evento = $publi->id_item;
            $image->id_item = $publi->id_item;

            $image->save();
            $evento->save();

            for ($i = 0; $i < count($categ); $i++) {
                $ca = $categ[$i];
                
                $categorias = DB::table('asignar_categorias')->insert(
                        ['id_item' => $publi->id_item, 'id_categoria' => $ca]
                );
            }


            $evento = DB::table('eventos')
                    ->join('publicaciones', 'publicaciones.id_item', '=', 'eventos.id_evento')
                    ->select('eventos.id_evento', 'nombre', 'localizacion', 'fecha_subida', 'fecha_inicio', 'fecha_fin')
                    ->paginate(8);

            return view('administracion/admin_eventos', ['events' => $evento]);
        } else {

            $evento = DB::table('eventos')
                    ->join('publicaciones', 'publicaciones.id_item', '=', 'eventos.id_evento')
                    ->select('eventos.id_evento', 'nombre', 'localizacion', 'fecha_subida', 'fecha_inicio', 'fecha_fin')
                    ->paginate(8);

            $error = [
                'error' => 'Error, el nombre del evento ya existe'
            ];

            return view('administracion/admin_eventos', ['events' => $evento], ['error' => $error]);
        }
    }

}
