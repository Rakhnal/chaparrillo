<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Evento;
use App\Publicacion;
use App\Imagen;
use App\Informe;
use App\Plaga;
use App\Clases\Auxiliares\Constantes;
use App\Documento;
use Illuminate\Support\Facades\Redirect;
use App\Adjunto;
use Illuminate\Support\Facades\Session;
use App\Categoria;
use App\Faq;

/* Author: Nathan, Álvaro y Rafa */

class controlador_tablas extends Controller {

    //************************************************************************//
    //DES17: Página para administrar documentación - Autor: Nathan
    //************************************************************************//
    /**
     * Esta función lista todos los documentos de la base de datos.
     * @return type
     */
    public function listarDocumentos() {
        $documentos = DB::table('documentos')
                ->join('publicaciones', 'publicaciones.id_item', '=', 'documentos.id_documento')
                ->join('adjuntos', 'adjuntos.id_documento', '=', 'publicaciones.id_item')
                ->select('documentos.id_documento', 'publicaciones.nombre', 'publicaciones.descripcion', 'fecha_subida', 'visible', 'tipo', 'num_descargas', 'anio', 'autores', 'documento', 'nombre_doc')
                ->paginate(8);

        $categorias = DB::table('categorias')
                ->join('asignar_categorias', 'asignar_categorias.id_categoria', '=', 'categorias.id_categoria')
                ->join('publicaciones', 'publicaciones.id_item', '=', 'asignar_categorias.id_item')
                ->select('categorias.nombre as categoria');

        $datos = [
            'docs' => $documentos,
            'categorias' => $categorias
        ];

        return view(Constantes::AD_DOCUMENTOS, $datos);
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

    /**
     * Esta función muestra en una ventana modal la información del documento
     * que se quiere modificar.
     */
    public function buscarDocumentos() {
        $id_documento = intval($_POST["identificador"]);

        $documentos = DB::select('SELECT publicaciones.id_item as id_item, publicaciones.nombre as nombre, publicaciones.descripcion as descripcion, '
                        . 'anio, autores, documento, nombre_doc, visible FROM documentos '
                        . 'JOIN publicaciones ON documentos.id_documento = publicaciones.id_item '
                        . 'JOIN adjuntos ON documentos.id_documento = adjuntos.id_documento '
                        . 'WHERE documentos.id_documento = ' . $id_documento);

        $categorias = DB::select('SELECT asignar_categorias.id_item as item, categorias.nombre as nombre, asignar_categorias.id_categoria as id_categoria FROM asignar_categorias '
                        . 'JOIN publicaciones ON publicaciones.id_item = asignar_categorias.id_item '
                        . 'JOIN categorias ON categorias.id_categoria = asignar_categorias.id_categoria '
                        . 'WHERE publicaciones.id_item =' . $id_documento);

        $totalCategorias = DB::select('SELECT id_categoria FROM categorias');

        $cats = [];
        foreach ($categorias as $categoria) {
            $categoria = array(
                $cats[] = $categoria->id_categoria
            );
        }

        $documento = array(
            'id_item' => $documentos[0]->id_item,
            'nombre' => $documentos[0]->nombre,
            'descripcion' => $documentos[0]->descripcion,
            'anio' => $documentos[0]->anio,
            'autores' => $documentos[0]->autores,
            'documento' => base64_encode($documentos[0]->documento),
            'nombre_doc' => $documentos[0]->nombre_doc,
            'visible' => $documentos[0]->visible,
            'categorias' => $cats,
            'totalCategorias' => $totalCategorias
        );

        echo json_encode($documento);
    }

    /**
     * Esta función permite al administrador guardar los cambios realizados.
     * @param Request $req
     * @return type
     */
    public function modificarDocumentos(Request $req) {
        $id_documento = $req->get('idEditarDoc');

        $publicacion = Publicacion::where('id_item', $id_documento)->first();
        $documento = Documento::where('id_documento', $id_documento)->first();
        $adjunto = Adjunto::where('id_documento', $id_documento)->first();

        $publicacion->nombre = $req->get('nombreEditarDoc');
        $publicacion->descripcion = $req->get('descEditarDoc');
        $publicacion->editado = 1;

        $documento->anio = $req->get('anioEditarDoc');
        $documento->autores = $req->get('autoresEditarDoc');
        $documento->visible = $req->get('selectVisible');

        $publicacion->save();
        $documento->save();

//        dd($req->file('editarAdjuntos'));
        
        if ($req->file('editarAdjuntos') != null) {
            // Eliminamos el adjunto que hay subido.
            $adjun = DB::table('adjuntos')
                            ->where('adjuntos.id_documento', $id_documento)->first();
            $adjun->delete();
            // Subimos el nuevo.
            $adjunto->documento = file_get_contents($req->file('editarAdjuntos'));
            $nombreDocumento = $req->file('editarAdjuntos');
            $adjunto->nombre_doc = $nombreDocumento->getClientOriginalName();
            $adjunto->save();
        }

        return redirect('adminDocument');
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
            $adjunto = new Adjunto();

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

//            $file = file_get_contents($req->get('list'), true);
//            $a1 = str_getcsv($file);

            $adjunto->documento = file_get_contents($req->file('subirAdjuntos'));
            $nombreDocumento = $req->file('subirAdjuntos');
            $adjunto->nombre_doc = $nombreDocumento->getClientOriginalName();

            $publicacion->save();

            $publication = Publicacion::where('nombre', $req->get('nombreSubirDoc'))->first();

            $categorias = $req->get('categorias');

            if (isset($categorias)) {
                foreach ($categorias as $categoria) {
                    DB::insert('insert into asignar_categorias (id_item, id_categoria) values (?, ?)', [$publication->id_item, $categoria]);
                }
            }
//            dd($adjuntos);
//            foreach ($adjuntos as $adjunto) {
//                DB::insert('insert into adjuntos (id_adjunto, id_documento, documento) values (?, ?, ?)', [0, $publication->id_item, $adjunto]);
//            }

            $documento->id_documento = $publication->id_item;
            $adjunto->id_documento = $publication->id_item;

            $documento->save();
            $adjunto->save();

            $documentos = DB::table('documentos')
                    ->join('publicaciones', 'publicaciones.id_item', '=', 'documentos.id_documento')
                    ->join('adjuntos', 'adjuntos.id_documento', '=', 'publicaciones.id_item')
                    ->select('documentos.id_documento', 'nombre', 'descripcion', 'fecha_subida', 'visible', 'likes', 'views', 'tipo', 'visible', 'num_descargas', 'anio', 'autores', 'documento', 'nombre_doc')
                    ->paginate(8);

            return redirect('adminDocument')->with('docs', $documentos);
        } else {
            $documentos = DB::table('documentos')
                    ->join('publicaciones', 'publicaciones.id_item', '=', 'documentos.id_documento')
                    ->join('adjuntos', 'adjuntos.id_documento', '=', 'publicaciones.id_item')
                    ->select('documentos.id_documento', 'nombre', 'descripcion', 'fecha_subida', 'visible', 'likes', 'views', 'tipo', 'visible', 'num_descargas', 'anio', 'autores', 'documento', 'nombre_doc')
                    ->paginate(8);

            return Redirect::route('adminDocument', ['docs' => $documentos]);
        }
    }

    //************************************************************************//
    //DES19: Página Administrar Informes - Autor: Álvaro
    //************************************************************************//
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
                    ->select('informes.id_informe', 'plagas.nombre_plaga', 'informes.nombre_producto', 'informes.fecha_hora', 'usuarios.nombre', 'usuarios.apellidos', 'informes.litro_hectarea'
                            , 'informes.aprox_dmg', 'informes.poligono', 'informes.parcela', 'informes.municipio', 'informes.comentario')
                    ->orderBy('informes.fecha_hora', 'DESC')
                    ->paginate(8);
        } else {
            $informes = DB::table('informes')
                    ->join('usuarios', 'informes.id_user', '=', 'usuarios.id_user')
                    ->join('plagas', 'informes.id_plaga', '=', 'plagas.id_plaga')
                    ->select('informes.id_informe', 'plagas.nombre_plaga', 'informes.nombre_producto', 'informes.fecha_hora', 'usuarios.nombre', 'usuarios.apellidos', 'informes.litro_hectarea'
                            , 'informes.aprox_dmg', 'informes.poligono', 'informes.parcela', 'informes.municipio', 'informes.comentario')
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
        $informe->id_plaga = $plagaTratar;

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
                    ->select('informes.id_informe', 'plagas.nombre_plaga', 'informes.nombre_producto', 'informes.fecha_hora', 'usuarios.nombre', 'usuarios.apellidos', 'informes.litro_hectarea'
                            , 'informes.aprox_dmg', 'informes.poligono', 'informes.parcela', 'informes.municipio', 'informes.comentario')
                    ->orderBy('informes.fecha_hora', 'DESC')
                    ->paginate(8);
        } else {
            $informes = DB::table('informes')
                    ->join('usuarios', 'informes.id_user', '=', 'usuarios.id_user')
                    ->join('plagas', 'informes.id_plaga', '=', 'plagas.id_plaga')
                    ->select('informes.id_informe', 'plagas.nombre_plaga', 'informes.nombre_producto', 'informes.fecha_hora', 'usuarios.nombre', 'usuarios.apellidos', 'informes.litro_hectarea'
                            , 'informes.aprox_dmg', 'informes.poligono', 'informes.parcela', 'informes.municipio', 'informes.comentario')
                    ->where('informes.id_user', $user->id_user)
                    ->orderBy('informes.fecha_hora', 'DESC')
                    ->paginate(8);
        }

        return redirect('adminInformes')->with('infs', $informes);
    }

    /**
     * Añade la nueva plaga a BBDD
     * @return type
     */
    public function addPlaga(Request $req) {

        $user = session()->get("userObj");

        $nombre = $req->get('nomPlaga');

        $plaga = new Plaga();

        $plaga->nombre_plaga = $nombre;

        $plaga->save();

        // Volvemos a cargar la lista de informes
        if ($user->rol == Constantes::ADMIN) {
            $informes = DB::table('informes')
                    ->join('usuarios', 'informes.id_user', '=', 'usuarios.id_user')
                    ->join('plagas', 'informes.id_plaga', '=', 'plagas.id_plaga')
                    ->select('informes.id_informe', 'plagas.nombre_plaga', 'informes.nombre_producto', 'informes.fecha_hora', 'usuarios.nombre', 'usuarios.apellidos', 'informes.litro_hectarea'
                            , 'informes.aprox_dmg', 'informes.poligono', 'informes.parcela', 'informes.municipio', 'informes.comentario')
                    ->orderBy('informes.fecha_hora', 'DESC')
                    ->paginate(8);
        } else {
            $informes = DB::table('informes')
                    ->join('usuarios', 'informes.id_user', '=', 'usuarios.id_user')
                    ->join('plagas', 'informes.id_plaga', '=', 'plagas.id_plaga')
                    ->select('informes.id_informe', 'plagas.nombre_plaga', 'informes.nombre_producto', 'informes.fecha_hora', 'usuarios.nombre', 'usuarios.apellidos', 'informes.litro_hectarea'
                            , 'informes.aprox_dmg', 'informes.poligono', 'informes.parcela', 'informes.municipio', 'informes.comentario')
                    ->where('informes.id_user', $user->id_user)
                    ->orderBy('informes.fecha_hora', 'DESC')
                    ->paginate(8);
        }

        return redirect('adminInformes')->with('infs', $informes);
    }

    /**
     * Borrará la plaga seleccionada
     * @return type
     */
    public function actPlaga(Request $req) {

        $user = session()->get("userObj");

        $modPlaga = $req->get('modPlaga');
        $delPlaga = $req->get('delPlaga');

        $idplaga = $req->get('idplaga');
        $nomPlaga = $req->get('nomPlaga');

        if (null != $modPlaga) {

            $plaga = Plaga::find($idplaga);

            $plaga->nombre_plaga = $nomPlaga;

            $plaga->save();
        }

        if (null != $delPlaga) {

            $plaga = Plaga::find($idplaga);

            $plaga->delete();
        }

        // Volvemos a cargar la lista de informes
        if ($user->rol == Constantes::ADMIN) {
            $informes = DB::table('informes')
                    ->join('usuarios', 'informes.id_user', '=', 'usuarios.id_user')
                    ->join('plagas', 'informes.id_plaga', '=', 'plagas.id_plaga')
                    ->select('informes.id_informe', 'plagas.nombre_plaga', 'informes.nombre_producto', 'informes.fecha_hora', 'usuarios.nombre', 'usuarios.apellidos', 'informes.litro_hectarea'
                            , 'informes.aprox_dmg', 'informes.poligono', 'informes.parcela', 'informes.municipio', 'informes.comentario')
                    ->orderBy('informes.fecha_hora', 'DESC')
                    ->paginate(8);
        } else {
            $informes = DB::table('informes')
                    ->join('usuarios', 'informes.id_user', '=', 'usuarios.id_user')
                    ->join('plagas', 'informes.id_plaga', '=', 'plagas.id_plaga')
                    ->select('informes.id_informe', 'plagas.nombre_plaga', 'informes.nombre_producto', 'informes.fecha_hora', 'usuarios.nombre', 'usuarios.apellidos', 'informes.litro_hectarea'
                            , 'informes.aprox_dmg', 'informes.poligono', 'informes.parcela', 'informes.municipio', 'informes.comentario')
                    ->where('informes.id_user', $user->id_user)
                    ->orderBy('informes.fecha_hora', 'DESC')
                    ->paginate(8);
        }

        return redirect('adminInformes')->with('infs', $informes);
    }

    /**
     * Borrará el informe seleccionado
     * @return type
     */
    public function actInforme() {

        $user = session()->get("userObj");

        $idinforme = intval($_POST["idinforme"]);
        $informe = Informe::find($idinforme);
        $informe->delete();

        $qhp = "ok";

        return $qhp;
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

    //************************************************************************//
    //DES18: Página para adminsitrar eventos - Autor: Rafa
    //************************************************************************//
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

    /**
     * Añade la nueva FAQ a BBDD
     * @param Request $req
     * @return type
     */
    public function addFaq(Request $req) {

        $pregunta = $req->get('pregFaq');
        $respuesta = $req->get('respFaq');

        $faq = new Faq();

        $faq->pregunta = $pregunta;
        $faq->respuesta = $respuesta;

        $faq->save();

        return view(Constantes::FAQS);
    }

    /**
     * Elimina la FAQ de BBDD
     * @param Request $req
     */
    public function delFaq(Request $req) {

        $idfaq = $req->get('idfaq');

        $faq = Faq::find($idfaq);

        $faq->delete();

        return view(Constantes::FAQS);
    }

    public function mostrarEventos() {

        $eventos = \DB::select('SELECT id_evento,nombre,descripcion,localizacion,latitud,longitud,fecha_inicio,fecha_fin,imagen FROM eventos '
                        . 'JOIN publicaciones ON eventos.id_evento = publicaciones.id_item '
                        . 'JOIN imagenes ON imagenes.id_item = eventos.id_evento '
        );

        $array = array();

        for ($i = 0; $i < count($eventos); $i++) {
            $evento = array(
                'title' => $eventos[$i]->nombre,
                'imagen' => base64_encode($eventos[$i]->imagen),
                'descripcion' => $eventos[$i]->descripcion,
                'localizacion' => $eventos[$i]->localizacion,
                'start' => $eventos[$i]->fecha_inicio,
                'end' => $eventos[$i]->fecha_fin,
                'latitud' => $eventos[$i]->latitud,
                'longitud' => $eventos[$i]->longitud,
                'id' => $eventos[$i]->id_evento
            );
            array_push($array, $evento);
        }



        return json_encode($array);
    }

}
