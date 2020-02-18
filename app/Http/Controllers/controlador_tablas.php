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

class controlador_tablas extends Controller {

    //DES17: Página para administrar documentación
    /**
     * Esta función lista todos los documentos de la base de datos.
     * @return type
     */
    public function listarDocumentos() {
        $documentos = DB::table('documentos')
                ->join('publicaciones', 'publicaciones.id_item', '=', 'documentos.id_documento')
                ->select('documentos.id_documento', 'nombre', 'descripcion', 'fecha_subida', 'visible')
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

        $qhp = "ok";
        
        if ($session->has('docSession')) {
            
        }
        
        if ($documento) {
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
                    ->select('informes.id_informe', 'informes.nombre_producto', 'informes.litro_hectarea', 'informes.fecha_hora', 'usuarios.nombre', 'usuarios.apellidos')
                    ->orderBy('informes.fecha_hora', 'DESC')
                    ->paginate(8);
        } else {
            $informes = DB::table('informes')
                    ->join('usuarios', 'informes.id_user', '=', 'usuarios.id_user')
                    ->select('informes.id_informe', 'informes.nombre_producto', 'informes.litro_hectarea', 'informes.fecha_hora', 'usuarios.nombre', 'usuarios.apellidos')
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

        $informe = new Informe();

        $informe->nombre_producto = $nombre;
        $informe->litro_hectarea = $litrohect;
        $informe->fecha_hora = $fechahora;
        $informe->id_user = $user->id_user;

        $informe->save();

        // Volvemos a cargar la lista de informes
        if ($user->rol == Constantes::ADMIN) {
            $informes = DB::table('informes')
                    ->join('usuarios', 'informes.id_user', '=', 'usuarios.id_user')
                    ->select('informes.id_informe', 'informes.nombre_producto', 'informes.litro_hectarea', 'informes.fecha_hora', 'usuarios.nombre', 'usuarios.apellidos')
                    ->orderBy('informes.fecha_hora', 'DESC')
                    ->paginate(8);
        } else {
            $informes = DB::table('informes')
                    ->join('usuarios', 'informes.id_user', '=', 'usuarios.id_user')
                    ->select('informes.id_informe', 'informes.nombre_producto', 'informes.litro_hectarea', 'informes.fecha_hora', 'usuarios.nombre', 'usuarios.apellidos')
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

            $informe = Informe::find($idinforme);

            $informe->nombre_producto = $nombre;
            $informe->litro_hectarea = $litrohect;
            $informe->fecha_hora = $fechahora;

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
                    ->select('informes.id_informe', 'informes.nombre_producto', 'informes.litro_hectarea', 'informes.fecha_hora', 'usuarios.nombre', 'usuarios.apellidos')
                    ->orderBy('informes.fecha_hora', 'DESC')
                    ->paginate(8);
        } else {
            $informes = DB::table('informes')
                    ->join('usuarios', 'informes.id_user', '=', 'usuarios.id_user')
                    ->select('informes.id_informe', 'informes.nombre_producto', 'informes.litro_hectarea', 'informes.fecha_hora', 'usuarios.nombre', 'usuarios.apellidos')
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
                ->select('eventos.id_evento', 'nombre', 'localizacion', 'fecha_subida', 'fecha_inicio', 'fecha_fin')
                ->paginate(8);

        return view(Constantes::AD_EVENTOS, ['events' => $eventos]);
    }

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
                ->select('eventos.id_evento', 'nombre', 'localizacion', 'fecha_subida', 'fecha_inicio', 'fecha_fin')
                ->paginate(8);

        return view(Constantes::AD_EVENTOS, ['events' => $eventos]);
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
