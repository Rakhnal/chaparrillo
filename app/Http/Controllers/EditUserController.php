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
        $correo = $req->get('email');
        $pass = $req->get('passwed');
        $nombre = $req->get('nombre');
        $apellidos = $req->get('apellidos');
        $localidad = $req->get('localidad');
        $pais = $req->get('pais');
        $img = $req->get('secreto');
        $pass = Hash::make($pass);

        //password_verify($password, $hash);


        conexion::editUser($nombre, $apellidos, $correo, $pass, $localidad, $pais, $img);
        $user = conexion::existeUsuario($correo);
        session()->put("userObj", $user);
        $datos = [
            'yaexiste' => true
        ];

        return view(session()->get("actPage"), $datos);
    }

}
