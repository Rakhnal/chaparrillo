<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Clases\conexion;
use App\Clases\Auxiliares\Constantes;

class usercontroller extends Controller {

    /**
     * Método que comprueba si existe el usuario y lo guarda en sesión
     * @return type
     */
    public function iniciarSesion(Request $req) {

        $correo = $req->get('correo');
        $pass = $req->get('pass');

// Comprobamos que existe el usuario y que la constraseña es correcta
        $user = conexion::existeUsuarioPass($correo, $pass);

        if ($user != null) {
// Insertamos al usuario en sesión
            session()->put("userObj", $user);

            $datos = [
                'oklogin' => true
            ];
        } else {
            $datos = [
                'noexiste' => true
            ];
        }

        if (session()->get('actPage') == Constantes::FORO || session()->get('actPage') == Constantes::VERFORO) {
            return redirect('foro');
        }
        if (session()->get('actPage') == Constantes::DOCUMENTACION) {
            return redirect('documentacion');
        }
        if (session()->get('actPage') == Constantes::NOTICIA) {
            return redirect('noticias');
        } else {
            return view(session()->get("actPage"), $datos);
        }
    }

    /**
     * Cerrar la sesión del usuario actual
     * @param Request $req
     * @return type
     */
    public function cerrarSesion(Request $req) {
        session()->forget("userObj");

        return view(Constantes::INDEX);
    }

    /**
     * Método que registrará al usuario
     * @return type
     */
    public function registrarUsuario(Request $req) {

        $correo = $req->get('correo');
        $pass = Hash::make($req->get('pass'));
        $name = $req->get('name');
        $apellidos = $req->get('apellidos');
        $localidad = $req->get('localidad');
        $pais = $req->get('pais');
        $latitud = $req->get('latitudInput');
        $longitud = $req->get('longitudInput');

        $user = conexion::existeUsuario($correo);

// Si no está ya registrado
        if ($user == null) {
            conexion::addUser($correo, $pass, $apellidos, $name, $localidad, $pais, $latitud, $longitud);

            $datos = [
                'okregistro' => true
            ];
        } else {
            $datos = [
                'yaexiste' => true
            ];
        }

        return view(session()->get("actPage"), $datos);
    }

}
