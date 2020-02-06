<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class usercontroller extends Controller
{
    
    /**
     * Método que comprueba si existe el usuario y lo guarda en sesión
     * @return type
     */
    public function iniciarSesion() {
        
        $correo = $req->get('correo');
        $pass = Hash::make($req->get('pass'));
        
        /*$user = conexion::existeUsuarioPass($correo, $pass);

        if ($user) {
            // Insertamos al usuario en Sesión
            session()->put("userObj", $user);

            if ($user->tipo == Constantes::typeGestor) {
                return view('altaUsuarios');
            } else {
                return view('crudUsuarios');
            }
        } else {

            $datos = [
                'noexiste' => true
            ];

            return view(session()->get("actPage"), $datos);
        }
        */
        return view(session()->get("actPage"));
    }
}
