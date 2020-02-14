<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Evento;
use App\Informe;
use App\Clases\Auxiliares\Constantes;

class controlador_tablas extends Controller {

    public function listarDocumentos() {
        $documentos = DB::table('documentos')
                ->join('publicaciones', 'publicaciones.id_item', '=', 'documentos.id_documento')
                ->select('documentos.id_documento', 'nombre', 'descripcion', 'fecha_subida', 'visible')
                ->paginate(8);

        return view(Constantes::AD_DOCUMENTOS, ['docs' => $documentos]);
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

        $event->delete();


        $eventos = DB::table('eventos')
                ->join('publicaciones', 'publicaciones.id_item', '=', 'eventos.id_evento')
                ->select('eventos.id_evento', 'nombre', 'localizacion', 'fecha_subida', 'fecha_inicio', 'fecha_fin')
                ->paginate(8);

        return view(Constantes::AD_EVENTOS, ['events' => $eventos]);
    }

}
