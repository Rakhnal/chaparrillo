<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Clases\conexion;

class EditUserController extends Controller {

    /**
     * Método que editará al usuario
     * @return type
     */
    public function editarUsuario(Request $req) {
        $image_parts = $req->get('secreto');
        $data = substr($image_parts, strpos($image_parts, ',') + 1);
        $correo = $req->get('email');
        $nombre = $req->get('nombre');

        $lat = $req->get('latitudInputEU');
        $lon = $req->get('longitudInputEU');

        $apellidos = $req->get('apellidos');
        $localidad = $req->get('localidad');
        $pais = $req->get('pais');
        $img = base64_decode($data);


        conexion::editUser($nombre, $apellidos, $correo, $localidad, $pais, $img, $lat, $lon);
        $user = conexion::existeUsuario($correo);
        session()->put('userObj', $user);
        $datos = [
            'editado' => true
        ];
        return view(session()->get("actPage"), $datos);
    }

    /**
     * Método que editara la contraseña
     * @param Request $req
     */
    public function editarPassEU(Request $req) {
        $u = session()->get('userObj');
        $correo = $u->email;
        $pass = $req->get('passwed');
        if (password_verify($pass, PASSWORD_DEFAULT)) {
            $pass = Hash::make($pass);
            conexion::editPass($correo, $pass);
            $user = conexion::existeUsuario($correo);
            session()->put('userObj', $user);
            $datos = [
                'editado' => true
            ];
        } else {
            $datos = [
                'editado' => false
            ];
        }
        return view(session()->get("actPage"), $datos);
    }

}
