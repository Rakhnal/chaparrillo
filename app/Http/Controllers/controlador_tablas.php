<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Evento;
use App\Publicacion;
use App\Imagen;
use App\Informe;
use App\Clases\Auxiliares\Constantes;
use App\Documento;
use Illuminate\Support\Facades\Redirect;

class controlador_tablas extends Controller {

    //************************************************************************//
    //DES17: Página para administrar documentación
    //************************************************************************//
    /**
     * Esta función lista todos los documentos de la base de datos.
     * @return type
     */
    public function listarDocumentos() {
        $documentos = DB::table('documentos')
                ->join('publicaciones', 'publicaciones.id_item', '=', 'documentos.id_documento')
                ->join('adjuntos', 'adjuntos.id_documento', '=', 'publicaciones.id_item')
                ->select('documentos.id_documento', 'nombre', 'descripcion', 'fecha_subida', 'visible', 'likes', 'views', 'tipo', 'visible', 'num_descargas', 'documento')
                ->paginate(8);

        return view(Constantes::AD_DOCUMENTOS, ['docs' => $documentos]);
    }

    /**
     * Esta función permite al administrador eliminar documentos.
     * @return string
     */
    public function eliminarDocumentos() {
        $id_documento = intval($_POST["identificador"]);
        $documento = DB::table('documentos')
                ->join('publicaciones', 'publicaciones.id_item', '=', 'documentos.id_documento')
                ->where('documentos.id_documento', $id_documento);

        if ($documento) {
            $documento->delete();
            $qhp = "ok";
        } else {
            $qhp = "fail";
        }
        return $qhp;
    }

    public function buscarDocumentos() {
        $id_documento = intval($_POST["identificador"]);
        $qhp = "ok";
        $documento = DB::table('documentos')
                ->join('publicaciones', 'publicaciones.id_item', '=', 'documentos.id_documento')
                ->where('documentos.id_documento', $id_documento)
                ->select('*')
                ->first();

//        $datos = [
//            'id_documento' => $documento->id_documento,
//            'nombre' => $documento->nombre,
//            'descripcion' => $documento->descripcion,
//            'visible' => $documento->visible
//            
//        ];


        if ($documento) {
            if ($session->has('docSession')) {
                $session->forget('docSession');
            }
            $session->put('docSession', $documento);
        } else {
            $qhp = "fail";
        }

        return $qhp;
    }

    public function modificarDocumentos() {
        $id_documento = intval($_POST["identificador"]);
        $documento = DB::table('documentos')
                ->join('publicaciones', 'publicaciones.id_item', '=', 'documentos.id_documento')
                ->where('documentos.id_documento', $id_documento)
                ->select('documentos.id_documento', 'nombre', 'descripcion', 'fecha_subida', 'visible')
                ->first();

        if ($documento) {
            $qhp = "ok";
        } else {
            $qhp = "fail";
        }
        return $qhp;
    }

    /**
     * Esta función permite al administrador subir documentos.
     * @param Request $req
     * @return type
     */
    public function subirDocumentos(Request $req) {
        $user = session()->get("userObj");
        $idUserLogin = $user->id_user;

        $publi = Publicacion::where('nombre', $req->get('nombreSubirDoc'))->first();

        // Si no existe la publicación.
        if (empty($publi)) {
            $publicacion = new Publicacion();
            $documento = new Documento();
            $adjunto = new Adjunto();

            $publicacion->nombre = $req->get('nombreSubirDoc');
            $publicacion->descripcion = $req->get('descSubirDoc');
            $publicacion->id_user = $idUserLogin; // Se deberá sacar la ID de la sesión del usuario logeado.
            $publicacion->likes = 0;
            $publicacion->views = 0;
            $publicacion->editado = 0;
            $publicacion->fecha_subida = date('Y-m-d');
            $publicacion->tipo = Constantes::DOCUMENTO;

            $adjunto->documento = file_get_contents($req->file('subirAdjuntos'));

            $documento->num_descargas = 0;
            $documento->visible = 1;

            $publicacion->save();

            $publication = Publicacion::where('nombre', $req->get('nombreSubirDoc'))->first();

            $adjunto->id_documento = $publication->id_item;
            $documento->id_documento = $publication->id_item;

            $adjunto->save();
            $documento->save();

            $documentos = DB::table('documentos')
                    ->join('publicaciones', 'publicaciones.id_item', '=', 'documentos.id_documento')
                    ->join('adjuntos', 'adjuntos.id_documento', '=', 'publicaciones.id_item')
                    ->select('documentos.id_documento', 'nombre', 'descripcion', 'fecha_subida', 'visible', 'likes', 'views', 'tipo', 'visible', 'num_descargas', 'documento')
                    ->paginate(8);

            return redirect('adminDocument')->with('docs', $documentos);
        } else {
            $documentos = DB::table('documentos')
                    ->join('publicaciones', 'publicaciones.id_item', '=', 'documentos.id_documento')
                    ->join('adjuntos', 'adjuntos.id_documento', '=', 'publicaciones.id_item')
                    ->select('documentos.id_documento', 'nombre', 'descripcion', 'fecha_subida', 'visible', 'likes', 'views', 'tipo', 'visible', 'num_descargas', 'documento')
                    ->paginate(8);

            return Redirect::route('adminDocument', ['docs' => $documentos, 'error' => 'Error']);
        }
    }

    //DES19: Página Administrar Informes
    /**
     * Mostrará los datos de la página en modo SWAT o Admin
     * @return type
     */
    public function listarInformes() {

        $user = session()->get("userObj");

        if ($user->rol == Constantes::ADMIN) {
            $informes = DB::table('informes')
                    ->join('usuarios', 'informes.id_user', '=', 'usuarios.id_user')
                    ->select('informes.id_informe', 'informes.aprox_dmg', 'informes.poli_par', 'informes.plaga_tratar', 'informes.nombre_producto', 'informes.litro_hectarea', 'informes.fecha_hora', 'usuarios.nombre', 'usuarios.apellidos')
                    ->orderBy('informes.fecha_hora', 'DESC')
                    ->paginate(8);
        } else {
            $informes = DB::table('informes')
                    ->join('usuarios', 'informes.id_user', '=', 'usuarios.id_user')
                    ->select('informes.id_informe', 'informes.aprox_dmg', 'informes.poli_par', 'informes.plaga_tratar', 'informes.nombre_producto', 'informes.litro_hectarea', 'informes.fecha_hora', 'usuarios.nombre', 'usuarios.apellidos')
                    ->where('informes.id_user', $user->id_user)
                    ->orderBy('informes.fecha_hora', 'DESC')
                    ->paginate(8);
        }

        return view(Constantes::AD_INFORMES, ['infs' => $informes]);
    }

    /**
     * Agregará un nuevo informe a la BBDD
     * @return type
     */
    public function agregarInforme(Request $req) {

        $user = session()->get("userObj");

        $nombre = $req->get('productName');
        $litrohect = $req->get('litroHectarea');
        $fechahora = $req->get('fechaInforme');

        $plagaTratar = $req->get('plagaTratar');
        $polParInput = $req->get('polParInput');
        $danioAprox = $req->get('danioAprox');

        $informe = new Informe();

        $informe->nombre_producto = $nombre;
        $informe->litro_hectarea = $litrohect;
        $informe->fecha_hora = $fechahora;
        $informe->aprox_dmg = $danioAprox;
        $informe->poli_par = $polParInput;
        $informe->plaga_tratar = $plagaTratar;
        $informe->id_user = $user->id_user;

        $informe->save();

        // Volvemos a cargar la lista de informes
        if ($user->rol == Constantes::ADMIN) {
            $informes = DB::table('informes')
                    ->join('usuarios', 'informes.id_user', '=', 'usuarios.id_user')
                    ->select('informes.id_informe', 'informes.aprox_dmg', 'informes.poli_par', 'informes.plaga_tratar', 'informes.nombre_producto', 'informes.litro_hectarea', 'informes.fecha_hora', 'usuarios.nombre', 'usuarios.apellidos')
                    ->orderBy('informes.fecha_hora', 'DESC')
                    ->paginate(8);
        } else {
            $informes = DB::table('informes')
                    ->join('usuarios', 'informes.id_user', '=', 'usuarios.id_user')
                    ->select('informes.id_informe', 'informes.aprox_dmg', 'informes.poli_par', 'informes.plaga_tratar', 'informes.nombre_producto', 'informes.litro_hectarea', 'informes.fecha_hora', 'usuarios.nombre', 'usuarios.apellidos')
                    ->where('informes.id_user', $user->id_user)
                    ->orderBy('informes.fecha_hora', 'DESC')
                    ->paginate(8);
        }

        return redirect('adminInformes')->with('infs', $informes);
    }

    /**
     * Método que llamará a las funciones oportunas según el botón pulsado
     * @return type
     */
    public function actInforme(Request $req) {

        $user = session()->get("userObj");

        $modInforme = $req->get('modInforme');
        $delInforme = $req->get('delInforme');

        if (isset($modInforme)) {

            $idinforme = $req->get('idinforme');
            $nombre = $req->get('nombre');
            $litrohect = $req->get('litrohect');
            $fechahora = $req->get('fechahora');

            $plagaTratar = $req->get('plagaTratar');
            $polParInput = $req->get('polParInput');
            $danioAprox = $req->get('danioAprox');

            $informe = Informe::find($idinforme);

            $informe->nombre_producto = $nombre;
            $informe->litro_hectarea = $litrohect;
            $informe->fecha_hora = $fechahora;
            $informe->aprox_dmg = $danioAprox;
            $informe->poli_par = $polParInput;
            $informe->plaga_tratar = $plagaTratar;

            $informe->save();
        }

        if (isset($delInforme)) {

            $idinforme = $req->get('idinforme');
            $informe = Informe::find($idinforme);
            $informe->delete();
        }

        // Volvemos a cargar la lista de informes
        if ($user->rol == Constantes::ADMIN) {
            $informes = DB::table('informes')
                    ->join('usuarios', 'informes.id_user', '=', 'usuarios.id_user')
                    ->select('informes.id_informe', 'informes.aprox_dmg', 'informes.poli_par', 'informes.plaga_tratar', 'informes.nombre_producto', 'informes.litro_hectarea', 'informes.fecha_hora', 'usuarios.nombre', 'usuarios.apellidos')
                    ->orderBy('informes.fecha_hora', 'DESC')
                    ->paginate(8);
        } else {
            $informes = DB::table('informes')
                    ->join('usuarios', 'informes.id_user', '=', 'usuarios.id_user')
                    ->select('informes.id_informe', 'informes.aprox_dmg', 'informes.poli_par', 'informes.plaga_tratar', 'informes.nombre_producto', 'informes.litro_hectarea', 'informes.fecha_hora', 'usuarios.nombre', 'usuarios.apellidos')
                    ->where('informes.id_user', $user->id_user)
                    ->orderBy('informes.fecha_hora', 'DESC')
                    ->paginate(8);
        }

        return redirect('adminInformes')->with('infs', $informes);
    }

    //DES18: Página para adminsitrar eventos
    public function listarEventos() {
        $eventos = DB::table('eventos')
                ->join('publicaciones', 'publicaciones.id_item', '=', 'eventos.id_evento')
                ->join('imagenes', 'imagenes.id_item', '=', 'eventos.id_evento')
                ->select('eventos.id_evento', 'imagen', 'nombre', 'localizacion', 'fecha_subida', 'fecha_inicio', 'fecha_fin')
                ->paginate(8);

        return view(Constantes::AD_EVENTOS, ['events' => $eventos]);
    }

    public function modificarEventos() {
        $id_evento = intval($_POST["ide"]);
                
        $eventos = DB::table('eventos')
                ->join('publicaciones', 'publicaciones.id_item', '=', 'eventos.id_evento')
                ->join('imagenes', 'imagenes.id_item', '=', 'eventos.id_evento')
                ->select('nombre','imagen','descripcion','localizacion','fecha_inicio','fecha_fin')
                ->where('eventos.id_evento',$id_evento)
                ->first();
        
        
        if(!empty($eventos)){
            $qhp = "ok";     
            session()->put('event_select',$eventos);
        } else {
            $qhp = "fail";
        }
        
        return $qhp;
    }

    /**
     * 
     * @return type
     */
    public function eliminarEventos() {
        $id_evento = intval($_POST['id_e']);

        $event = Evento::find($id_evento);
        $publi = Publicacion::find($id_evento);
        $image = Imagen::where('id_item', $id_evento)->first();

        $catego = DB::table('asignar_categorias')->where('id_item', '=', $id_evento)->delete();

        if ($event) {
            $event->delete();
        }

        $event->delete();
        $publi->delete();
        $image->delete();

        $eventos = DB::table('eventos')
                ->join('publicaciones', 'publicaciones.id_item', '=', 'eventos.id_evento')
                ->join('imagenes', 'imagenes.id_item', '=', 'eventos.id_evento')
                ->select('eventos.id_evento', 'imagen', 'nombre', 'localizacion', 'fecha_subida', 'fecha_inicio', 'fecha_fin')
                ->paginate(8);

        return redirect('admin_event')->with('events', $eventos);
    }

    /**
     * 
     * @param Request $req
     * @return type
     */
    public function agregarEventos(Request $req) {
        $user = session()->get("userObj");
        $idUserLogin = $user->id_user;

        $publi = Publicacion::where('nombre', $req->get('nomb'))->first();
        $user = session()->get("userObj");
        //si no existe la publicación
        if (empty($publi)) {

            $publicacion = new Publicacion();
            $image = new Imagen();
            $evento = new Evento();

            $publi->nombre = $req->get('nomb');
            $publi->descripcion = $req->get('descrip');
            $publi->id_user = intval($user->id_user);
            $publi->likes = 0;
            $publi->views = 0;
            $publi->editado = 0;
            $publi->fecha_subida = date('Y-m-d');
            $publi->tipo = Constantes::EVENTO;

            $image->imagen = file_get_contents($req->file('portada'));

            $evento->fecha_inicio = $req->get('feci');
            $evento->fecha_fin = $req->get('fecf');
            $evento->localizacion = $req->get('loca');
            $evento->longitud = $req->get('longitud');
            $evento->latitud = $req->get('latitud');

            $publicacion->save();

            $categ = $req->get('catego');

            $publication = Publicacion::where('nombre', $req->get('nomb'))->first();

            $evento->id_evento = $publication->id_item;
            $image->id_item = $publication->id_item;

            $image->save();
            $evento->save();

            for ($i = 0; $i < count($categ); $i++) {
                $ca = $categ[$i];

                $categorias = DB::table('asignar_categorias')->insert(
                        ['id_item' => $publi->id_item, 'id_categoria' => $ca]
                );
            }


            $eventos = DB::table('eventos')
                    ->join('publicaciones', 'publicaciones.id_item', '=', 'eventos.id_evento')
                    ->join('imagenes', 'imagenes.id_item', '=', 'eventos.id_evento')
                    ->select('eventos.id_evento', 'imagen', 'nombre', 'localizacion', 'fecha_subida', 'fecha_inicio', 'fecha_fin')
                    ->paginate(8);

            return redirect('admin_event')->with('events', $eventos);
        } else {

            $eventos = DB::table('eventos')
                    ->join('publicaciones', 'publicaciones.id_item', '=', 'eventos.id_evento')
                    ->join('imagenes', 'imagenes.id_item', '=', 'eventos.id_evento')
                    ->select('eventos.id_evento', 'imagen', 'nombre', 'localizacion', 'fecha_subida', 'fecha_inicio', 'fecha_fin')
                    ->paginate(8);



            $error = [
                'error' => 'Error, el nombre del evento ya existe'
            ];


            return Redirect::route('admin_event', ['events' => $eventos, 'error' => $error]);
        }
    }
    
    public function guardarEventos(Request $req){
        
        $eventos = DB::table('eventos')
                    ->join('publicaciones', 'publicaciones.id_item', '=', 'eventos.id_evento')
                    ->join('imagenes', 'imagenes.id_item', '=', 'eventos.id_evento')
                    ->select('eventos.id_evento', 'imagen', 'nombre', 'localizacion', 'fecha_subida', 'fecha_inicio', 'fecha_fin')
                    ->paginate(8);
        
        return redirect('admin_event')->with('events', $eventos);
    }

}
