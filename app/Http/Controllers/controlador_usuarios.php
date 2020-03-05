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

class controlador_usuarios extends Controller {

    //************************************************************************//
    //DES16: Página para administrar usuarios
    //************************************************************************//
    /**
     * Esta función lista todos los usuarios de la base de datos.
     * @return type
     */
    public function listarUsuarios() {
        $usuarios = DB::table('usuarios')
                ->select('id_user', 'nombre', 'apellidos', 'email', 'password', 'rol', 'localidad', 'latitud', 'longitud', 'pais', 'img_user', 'validado')
                ->paginate(8);
        return view(Constantes::AD_USUARIOS, ['users' => $usuarios]);
    }

    /**
     * Esta función lista todos los usuarios validados de la base de datos.
     * @return type
     */
    public function listarUsuariosV(Request $req) {
        $filtro = $req->get('fil');
        if ($filtro == 'Todos') {
            $usuarios = DB::table('usuarios')
                    ->select('id_user', 'nombre', 'apellidos', 'email', 'password', 'rol', 'localidad', 'latitud', 'longitud', 'pais', 'img_user', 'validado')
                    ->paginate(8);
        } else if ($filtro == 'Validado') {
            $usuarios = DB::table('usuarios')
                    ->select('id_user', 'nombre', 'apellidos', 'email', 'password', 'rol', 'localidad', 'latitud', 'longitud', 'pais', 'img_user', 'validado')
                    ->where('validado', 1)
                    ->paginate(8);
        } else if ($filtro == 'No validado') {
            $usuarios = DB::table('usuarios')
                    ->select('id_user', 'nombre', 'apellidos', 'email', 'password', 'rol', 'localidad', 'latitud', 'longitud', 'pais', 'img_user', 'validado')
                    ->where('validado', 0)
                    ->paginate(8);
        } else {
            $usuarios = DB::table('usuarios')
                    ->select('id_user', 'nombre', 'apellidos', 'email', 'password', 'rol', 'localidad', 'latitud', 'longitud', 'pais', 'img_user', 'validado')
                    ->paginate(8);
        }
        return view(Constantes::AD_USUARIOS, ['users' => $usuarios]);
    }

    /**
     * Esta función permite al administrador eliminar usuarios.
     * @return string
     */
    public function eliminarusuarios(Request $req) {
        $id_user = $req->get('id_u');
        $qhp = "ok";

        $usuario = DB::table('usuarios')
                ->where('id_user', $id_user);

        if ($usuario) {
            $usuario->delete();
        } else {
            $qhp = "fail";
        }
        $usuarios = DB::table('usuarios')
                ->select('id_user', 'nombre', 'apellidos', 'email', 'password', 'rol', 'localidad', 'latitud', 'longitud', 'pais', 'img_user', 'validado')
                ->paginate(8);
        return view(Constantes::AD_USUARIOS, ['users' => $usuarios]);
    }

    /**
     * Esta funcion valida un usuario sin validar o boquea a un usuario
     * @param Request $req
     * @return type
     */
    public function Validar_u(Request $req) {
        $id_user = $req->get('id_e');
        $validado = $req->get('val');
        $qhp = "ok";

        if ($validado == 1) {
            DB::table('usuarios')->where('id_user', $id_user)->update(['validado' => 0]);
        } else if ($validado == 0) {
            DB::table('usuarios')->where('id_user', $id_user)->update(['validado' => 1]);
        } else {
            $qhp = "fail";
        }
        $usuarios = DB::table('usuarios')
                ->select('id_user', 'nombre', 'apellidos', 'email', 'password', 'rol', 'localidad', 'latitud', 'longitud', 'pais', 'img_user', 'validado')
                ->paginate(8);
        return view(Constantes::AD_USUARIOS, ['users' => $usuarios]);
    }

    /**
     * Esta funcion cambia el rol del usuario
     * @param Request $req
     * @return type
     */
    public function cambiar_rol(Request $req) {
        $id_user = $req->get('id_a');
        $rol = $req->get('filtro_rol');
        $qhp = "ok";
        if ($rol > -1) {
            DB::table('usuarios')->where('id_user', $id_user)->update(['rol' => $rol]);
        } else {
            $qhp = "fail";
        }
        $usuarios = DB::table('usuarios')
                ->select('id_user', 'nombre', 'apellidos', 'email', 'password', 'rol', 'localidad', 'latitud', 'longitud', 'pais', 'img_user', 'validado')
                ->paginate(8);
        return view(Constantes::AD_USUARIOS, ['users' => $usuarios]);
    }
}
