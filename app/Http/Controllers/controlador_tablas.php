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
use App\Adjunto;
use Illuminate\Support\Facades\Session;
use App\Categoria;

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
                ->select('documentos.id_documento', 'nombre', 'descripcion', 'fecha_subida', 'visible', 'likes', 'views', 'tipo', 'visible', 'num_descargas', 'anio', 'autores', 'documento')
                ->paginate(8);

        return view(Constantes::AD_DOCUMENTOS, ['docs' => $documentos]);
    }

    /**
     * Esta función permite al administrador eliminar documentos.
     * @return string
     */
    public function eliminarDocumentos() {
        $id_documento = intval($_POST["identificador"]);
        $qhp = "ok";

        $publicacion = DB::table('publicaciones')
                ->join('documentos', 'publicaciones.id_item', '=', 'documentos.id_documento')
                ->where('publicaciones.id_item', $id_documento);

        if ($publicacion) {
            $publicacion->delete();
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
                ->join('adjuntos', 'adjuntos.id_documento', '=', 'documentos.id_documento')
                ->where('documentos.id_documento', $id_documento)
                ->select('documentos.id_documento', 'publicaciones.nombre', 'publicaciones.descripcion', 'publicaciones.fecha_subida', 'publicaciones.visible', 'publicaciones.tipo', 'documentos.visible', 'documentos.num_descargas', 'adjuntos.documento')
                ->first();

        $documento = DB::table('documentos')
                ->join('publicaciones', 'publicaciones.id_item', '=', 'documentos.id_documento')
                ->where('documentos.id_documento', $id_documento);

        if ($documento) {
            $qhp = "ok";
        } else {
            $qhp = "fail";
        }

        $datos = array(
            'nombre' => $documento[0]->nombre,
            'descripcion' => $documento[0]->descripcion,
            'visible' => $documento[0]->visible,
            'qhp' => $qhp
        );

        return json_encode($datos);
    }

    public function modificarDocumentos() {
        $id_documento = intval($_POST["identificador"]);
        $documento = DB::table('documentos')
                ->join('publicaciones', 'publicaciones.id_item', '=', 'documentos.id_documento')
                ->where('documentos.id_documento', $id_documento)
                ->select('documentos.id_documento', 'nombre', 'descripcion', 'fecha_subida', 'visible');

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

        $publi = Publicacion::where('nombre', $req->get('nombreSubirDoc'))->first();

        // Si no existe la publicación.
        if (empty($publi)) {
            $publicacion = new Publicacion();
            $documento = new Documento();

            //dd($publicacion);

            $publicacion->nombre = $req->get('nombreSubirDoc');
            $publicacion->descripcion = $req->get('descSubirDoc');
            $publicacion->id_user = intval($user->id_user); // Se deberá sacar la ID de la sesión del usuario logeado.
            $publicacion->likes = 0;
            $publicacion->views = 0;
            $publicacion->editado = 0;
            $publicacion->fecha_subida = date('Y-m-d');
            $publicacion->tipo = Constantes::DOCUMENTO;

            //dd($req->file('subirAdjuntos'));

            $documento->num_descargas = 0;
            $documento->anio = $req->get('anioSubirDoc');
            $documento->autores = $req->get('autoresSubirDoc');
            $documento->visible = 1;

            $publicacion->save();

            $publication = Publicacion::where('nombre', $req->get('nombreSubirDoc'))->first();

            $categorias = $req->get('categorias');

            foreach ($categorias as $categoria) {
                DB::insert('insert into asignar_categorias (id_item, id_categoria) values (?, ?)', [$publication->id_item, $categoria]);
            }

            dd($publication->id_item);
            $adjuntos = file_get_contents($req->file('subirAdjuntos[0]'));
            dd($adjuntos);
            foreach ($adjuntos as $adjunto) {
                DB::insert('insert into adjuntos (id_documento, documento) values (?, ?)', [$publication->id_item, $adjunto]);
            }

            $documento->id_documento = $publication->id_item;

            $documento->save();

            $documentos = DB::table('documentos')
                    ->join('publicaciones', 'publicaciones.id_item', '=', 'documentos.id_documento')
                    ->join('adjuntos', 'adjuntos.id_documento', '=', 'publicaciones.id_item')
                    ->select('documentos.id_documento', 'nombre', 'descripcion', 'fecha_subida', 'visible', 'likes', 'views', 'tipo', 'visible', 'num_descargas', 'anio', 'autores', 'documento')
                    ->paginate(8);

            return redirect('adminDocument')->with('docs', $documentos);
        } else {
            $documentos = DB::table('documentos')
                    ->join('publicaciones', 'publicaciones.id_item', '=', 'documentos.id_documento')
                    ->join('adjuntos', 'adjuntos.id_documento', '=', 'publicaciones.id_item')
                    ->select('documentos.id_documento', 'nombre', 'descripcion', 'fecha_subida', 'visible', 'likes', 'views', 'tipo', 'visible', 'num_descargas', 'anio', 'autores', 'documento')
                    ->paginate(8);

            return Redirect::route('adminDocument', ['docs' => $documentos]);
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
                    ->join('plagas', 'informes.id_plaga', '=', 'plagas.id_plaga')
                    ->select('informes.id_informe', 'plagas.nombre_plaga', 'informes.nombre_producto', 'informes.fecha_hora', 'usuarios.nombre', 'usuarios.apellidos')
                    ->orderBy('informes.fecha_hora', 'DESC')
                    ->paginate(8);
        } else {
            $informes = DB::table('informes')
                    ->join('usuarios', 'informes.id_user', '=', 'usuarios.id_user')
                    ->join('plagas', 'informes.id_plaga', '=', 'plagas.id_plaga')
                    ->select('informes.id_informe', 'plagas.nombre_plaga', 'informes.nombre_producto', 'informes.fecha_hora', 'usuarios.nombre', 'usuarios.apellidos')
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
        $poligono = $req->get('polInput');
        $parcela = $req->get('parInput');
        $userProp = $req->get('userProp');
        $municipio = $req->get('munInput');
        $coment = $req->get('coment');
        $danioAprox = $req->get('danioAprox');

        $informe = new Informe();

        $informe->nombre_producto = $nombre;
        $informe->litro_hectarea = $litrohect;
        $informe->fecha_hora = $fechahora;
        $informe->aprox_dmg = $danioAprox;
        $informe->poligono = $poligono;
        $informe->parcela = $parcela;
        $informe->municipio = $municipio;
        $informe->comentario = $coment;
        $informe->plaga_tratar = $plagaTratar;

        if ($userProp != "") {
            $informe->id_user = $userProp;
        } else {
            $informe->id_user = $user->id_user;
        }


        $informe->save();

        // Volvemos a cargar la lista de informes
        if ($user->rol == Constantes::ADMIN) {
            $informes = DB::table('informes')
                    ->join('usuarios', 'informes.id_user', '=', 'usuarios.id_user')
                    ->join('plagas', 'informes.id_plaga', '=', 'plagas.id_plaga')
                    ->select('informes.id_informe', 'plagas.nombre_plaga', 'informes.nombre_producto', 'informes.fecha_hora', 'usuarios.nombre', 'usuarios.apellidos')
                    ->orderBy('informes.fecha_hora', 'DESC')
                    ->paginate(8);
        } else {
            $informes = DB::table('informes')
                    ->join('usuarios', 'informes.id_user', '=', 'usuarios.id_user')
                    ->join('plagas', 'informes.id_plaga', '=', 'plagas.id_plaga')
                    ->select('informes.id_informe', 'plagas.nombre_plaga', 'informes.nombre_producto', 'informes.fecha_hora', 'usuarios.nombre', 'usuarios.apellidos')
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
                    ->join('plagas', 'informes.id_plaga', '=', 'plagas.id_plaga')
                    ->select('informes.id_informe', 'plagas.nombre_plaga', 'informes.nombre_producto', 'informes.fecha_hora', 'usuarios.nombre', 'usuarios.apellidos')
                    ->orderBy('informes.fecha_hora', 'DESC')
                    ->paginate(8);
        } else {
            $informes = DB::table('informes')
                    ->join('usuarios', 'informes.id_user', '=', 'usuarios.id_user')
                    ->join('plagas', 'informes.id_plaga', '=', 'plagas.id_plaga')
                    ->select('informes.id_informe', 'plagas.nombre_plaga', 'informes.nombre_producto', 'informes.fecha_hora', 'usuarios.nombre', 'usuarios.apellidos')
                    ->where('informes.id_user', $user->id_user)
                    ->orderBy('informes.fecha_hora', 'DESC')
                    ->paginate(8);
        }

        return redirect('adminInformes')->with('infs', $informes);
    }

    /**
     * Llamada desde Ajax para devolver los datos del informe pulsado
     * @return string
     */
    public function modificarInformes() {
        $id_informe = intval($_POST["ide"]);

        $informe = DB::table('informes')
                ->where('id_informe', $id_informe)
                ->first();

        $infArray = array(
            'id_informe' => $informe->id_informe,
            'nombre_producto' => $informe->nombre_producto,
            'litro_hectarea' => $informe->litro_hectarea,
            'id_user' => $informe->id_user,
            'aprox_dmg' => $informe->aprox_dmg,
            'id_plaga' => $informe->id_plaga,
            'fecha_hora' => $informe->fecha_hora,
            'poligono' => $informe->poligono,
            'parcela' => $informe->parcela,
            'municipio' => $informe->municipio,
            'comentario' => $informe->comentario,
        );

        return json_encode($infArray);
    }

    //DES18: Página para adminsitrar eventos

    /**
     * Función para mostrar todos los eventos de la bbdd.
     * @return type
     */
    public function listarEventos() {
        $eventos = DB::table('eventos')
                ->join('publicaciones', 'publicaciones.id_item', '=', 'eventos.id_evento')
                ->join('imagenes', 'imagenes.id_item', '=', 'eventos.id_evento')
                ->select('eventos.id_evento', 'imagen', 'nombre', 'localizacion', 'fecha_subida', 'fecha_inicio', 'fecha_fin')
                ->paginate(8);

        return view(Constantes::AD_EVENTOS, ['events' => $eventos]);
    }

    /**
     * Llamada a Ajax para cargar evento por id en ventana modal.
     * @return type
     */
    public function modificarEventos() {
        $id_evento = intval($_POST["ide"]);

        $eventos = \DB::select('SELECT id_evento,nombre,descripcion,localizacion,latitud,longitud,fecha_inicio,fecha_fin,imagen FROM eventos '
                        . 'JOIN publicaciones ON eventos.id_evento = publicaciones.id_item '
                        . 'JOIN imagenes ON imagenes.id_item = eventos.id_evento '
                        . 'WHERE eventos.id_evento =' . $id_evento);

        $evento = array(
            'nombre' => $eventos[0]->nombre,
            'imagen' => base64_encode($eventos[0]->imagen),
            'descripcion' => $eventos[0]->descripcion,
            'localizacion' => $eventos[0]->localizacion,
            'fecha_inicio' => $eventos[0]->fecha_inicio,
            'fecha_fin' => $eventos[0]->fecha_fin,
            'latitud' => $eventos[0]->latitud,
            'longitud' => $eventos[0]->longitud,
            'id' => $eventos[0]->id_evento
        );


        return json_encode($evento);
    }

    /**
     * Llamada Ajax para eliminar un evento por id.
     * @return type
     */
    public function eliminarEventos() {
        $id_evento = intval($_POST["id_e"]);

        $eventos = DB::table('eventos')
                ->where('eventos.id_evento', $id_evento);

        $qhp = "ok";

        $publicacion = DB::table('publicaciones')
                ->where('publicaciones.id_item', $id_evento);

        $imagen = DB::table('imagenes')
                ->where('imagenes.id_item', $id_evento);

        //Borramos la imagen, el eveneto y la publicación.
        if ($publicacion) {

            $imagen->delete();
            $eventos->delete();
            $publicacion->delete();
        } else {
            $qhp = "fail";
        }
        return $qhp;
    }

    /**
     * Función para agregar eventos a la bbdd.
     * @param Request $req -> Formulario de evento
     * @return type
     */
    public function agregarEventos(Request $req) {
        $user = session()->get("userObj");

        $publi = Publicacion::where('nombre', $req->get('nomb'))->first();
        //si no existe la publicación
        if (empty($publi)) {

            $publicacion = new Publicacion();
            $image = new Imagen();
            $evento = new Evento();

            //dd($publicacion);

            $publicacion->nombre = $req->get('nomb');
            $publicacion->descripcion = $req->get('descrip');
            $publicacion->id_user = intval($user->id_user);
            $publicacion->likes = 0;
            $publicacion->views = 0;
            $publicacion->editado = 0;
            $publicacion->fecha_subida = date('Y-m-d');
            $publicacion->tipo = Constantes::EVENTO;

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

    /**
     * Función para guardar en evento modificado.
     * @param Request $req-> Formulario de evento.
     * @return type
     */
    public function guardarEventos(Request $req) {

        $publi = Publicacion::where('id_item', $req->get('idevento'))->first();
        $evento = Evento::where('id_evento', $publi->id_item)->first();
        $imagen = Imagen::where('id_item', $publi->id_item)->first();

        $publi->nombre = $req->get('nomb');
        $publi->descripcion = $req->get('descripcion-e');
        $publi->editado = 1;

        $evento->localizacion = $req->get('loca');
        $evento->fecha_inicio = $req->get('feci');
        $evento->fecha_fin = $req->get('fecf');
        $evento->latitud = $req->get('latitudEvent');
        $evento->longitud = $req->get('longitudEvent');

        $publi->save();
        $evento->save();

        if ($req->file('portada') != null) {
            $imagen->imagen = file_get_contents($req->file('portada'));
            $imagen->save();
        }

        return redirect('admin_event');
    }

}
