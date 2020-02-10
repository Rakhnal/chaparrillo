<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Clases\conexion;

class usercontroller extends Controller
{
    
    /**
     * Método que comprueba si existe el usuario y lo guarda en sesión
     * @return type
     */
    public function iniciarSesion(Request $req) {
        
        $correo = $req->get('correo');
        $pass = Hash::make($req->get('pass'));
        
        // Comprobamos que existe el usuario y que la constraseña es correcta
        $user = conexion::existeUsuarioPass($correo, $pass);

        if ($user) {
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
        
        return view(session()->get("actPage"), $datos);
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
        $cp = $req->get('cp');
        
        $user = conexion::existeUsuarioPass($correo, $pass);
        
        // Si no está ya registrado
        if ($user == null) {
            
            conexion::addUser($correo, $pass, $apellidos, $name, $localidad, $pais, $cp);
            
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
