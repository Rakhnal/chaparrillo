<?php

namespace App\Clases;

/*use App\Usuario;
use App\Coche;
use App\Propiedad;*/

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of conexion
 *
 * @author adonoso
 */
class conexion {

    /*// Buscamos a todos los usuarios en BBDD
    public static function obtenerUsuarios() {

        $users = Usuario::all();

        return $users;
    }
    
    // Buscamos a todos los coches libres en BBDD
    public static function obtenerCochesLibres() {

        $coches = \DB::select('SELECT * FROM coches WHERE matricula NOT IN (SELECT MATRICULA FROM PROPIEDADES)');
        return $coches;
    }

    // Buscamos a todos los coches que tenga el usuario
    public static function obtenerCochesUsr($dni) {

        $user = Usuario::where('dni', $dni)
                ->first();
        
        $coches = \DB::select('SELECT * FROM coches WHERE matricula IN (SELECT matricula FROM propiedades WHERE correo = ?)', [$user->correo]);

        return $coches;
    }
    
    // Alquilamos el coche al usuario
    public static function alquilarCoche($dni, $matricula) {

        $user = Usuario::where('dni', $dni)
                ->first();
        
        $propiedad = new Propiedad;
        
        $propiedad->correo = $user->correo;
        $propiedad->matricula = $matricula;
        
        $propiedad->save();
    }
    
    // Devolvemos el coche
    public static function devolverCoche($matricula) {

        $propiedad = Propiedad::where('matricula', $matricula)
                ->first();
        
        $propiedad->delete();
    }
    
    
    // Buscamos a todos los coches en BBDD
    public static function obtenerCoches() {

        $coches = Coche::all();

        return $coches;
    }

    // Buscamos el usuario en la BBDD
    public static function existeUsuarioPass($correo, $pass) {

        $user = Usuario::where('correo', $correo)
                ->where('pass', $pass)
                ->first();

        return $user;
    }

    // Borramos el Usuario en BBDD
    public static function borrarUsuario($correo) {
        $user = Usuario::find($correo);

        $user->delete();
    }

    // Borramos el coche en BBDD
    public static function borrarCoche($matricula) {
        $coche = Coche::find($matricula);

        $coche->delete();
    }

    // Cambiamos de rol al usuario
    public static function cambiarRolUsuario($correo, $typeUsr) {

        $user = Usuario::find($correo);

        $user->tipo = $typeUsr;

        $user->save();
    }

    // Cambiamos los campos del usuario
    public static function cambiarCamposUsuario($correo, $pass, $apellido, $nombre, $dni) {

        $user = Usuario::find($correo);

        $user->pass = base64_encode($pass);
        $user->apellido = $apellido;
        $user->nombre = $nombre;
        $user->dni = $dni;

        $user->save();
    }

    // Cambiamos los campos del coche
    public static function cambiarCamposCoche($matricula, $marca, $modelo) {

        $coche = Coche::find($matricula);

        $coche->matricula = $matricula;
        $coche->marca = $marca;
        $coche->modelo = $modelo;

        $coche->save();
    }

    // Cambiamos los campos del usuario
    public static function addUser($correo, $pass, $rol, $apellido, $nombre, $dni) {

        $user = new Usuario;

        $user->correo = $correo;
        $user->pass = base64_encode($pass);
        $user->tipo = $rol;
        $user->apellido = $apellido;
        $user->nombre = $nombre;
        $user->dni = $dni;

        $user->save();
    }
    
    // Cambiamos los campos del usuario
    public static function addCar($matricula, $marca, $modelo) {

        $coche = new Coche;

        $coche->matricula = $matricula;
        $coche->marca = $marca;
        $coche->modelo = $modelo;

        $coche->save();
    }*/

}
