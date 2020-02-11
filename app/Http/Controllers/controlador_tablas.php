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
                ->select('eventos.id_evento', 'nombre','localizacion', 'fecha_subida', 'fecha_inicio', 'fecha_fin')
                ->paginate(8);

        return view('administracion/admin_eventos', ['events' => $eventos]);
    }

    public function eliminarEventos() {
        $id_evento = intval($_POST['id_e']);
        
            $event = Evento::find($id_evento);
            $publi = Publicacion::find($id_evento);
            $image = Imagen::where('id_item',$id_evento)->first();
            
            $catego = DB::table('asignar_categorias')->where('id_item', '=', $id_evento)->delete();
            
            
            $event->delete();
            $publi->delete();
            //$image->delete();

       $eventos = DB::table('eventos')
                ->join('publicaciones', 'publicaciones.id_item', '=', 'eventos.id_evento')
                ->select('eventos.id_evento', 'nombre', 'localizacion', 'fecha_subida', 'fecha_inicio', 'fecha_fin')
                ->paginate(8);

        return view('administracion/admin_eventos', ['events' => $eventos]);
    }

    
    public function agregarEventos(Request $req) {
        
        $evento = new Evento();
        $publi = new Publicacion();
        $image = new Imagen();

        $publi->nombre = $req->get('nomb');
        $publi->descripcion = $req->get('descrip');
        $publi->id_user = 1;
        $publi->likes = 0;
        $publi->views = 0;
        $publi->editado = 0;
        $publi->fecha_subida = date('Y-m-d');
        $image->imagen = $req->get('portada');
        $evento->fecha_inicio = $req->get('feci');
        $evento->fecha_fin = $req->get('fecf');
        $evento->localizacion = $req->get('loca');
        $evento->longitud = 32165416;
        $evento->latitud = 6516516;

        $publi->save();
        $image->save();
        $evento->save();


        return view('administracion/admin_eventos', ['events' => $eventos]);
    }
}
