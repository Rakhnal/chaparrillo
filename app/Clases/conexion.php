<?php

namespace App\Clases;

use App\Clases\Auxiliares\Constantes;
use App\Usuario;
use App\Categoria;

/* use App\Usuario;
  use App\Coche;
  use App\Propiedad; */

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

    /**
     * Cargar eventos
     * @return type
     */
    public static function sacarEventos() {
        $event = Eventos::all();

        return $event;
    }

    /**
     * Agregar eventos
     * @param type $loca
     * @param type $lati
     * @param type $longi
     * @param type $fec_i
     * @param type $fec_f
     */
    public static function agregarEventos($loca, $lati, $longi, $fec_i, $fec_f) {
        $evento = new Evento;

        $evento->localizacion = $loca;
        $evento->latitud = $lati;
        $evento->longitud = $longi;
        $evento->fecha_inicio = $fec_i;
        $evento->fecha_fin = $fec_f;

        $evento->save();
    }
    /**
     * 
     * @return type
     */
    public static function sacarCategorias(){
        
        $categoria = Categoria::all();
        
        return $categoria;
    }
    

    /**
     * Login del usuario
     * @param type $correo
     * @param type $pass
     * @return type
     */
    public static function existeUsuarioPass($correo, $pass) {

        $user = Usuario::where('email', $correo)
                ->first();

        if ($user != null) {
            if (password_verify($pass, $user->password)) {
                return $user;
            } else {
                return null;
            }
        } else {
            return null;
        }
    }

    public static function existeUsuario($correo) {

        $user = Usuario::where('email', $correo)
                ->first();
        if ($user != null) {
            return $user;
        } else {
            return null;
        }
    }

    /**
     * Registro del usuario en base de datos
     * @param type $correo
     * @param type $pass
     * @param type $apellidos
     * @param type $nombre
     * @param type $localidad
     * @param type $pais
     * @param type $cp
     */
    public static function addUser($correo, $pass, $apellidos, $nombre, $localidad, $pais) {

        $user = new Usuario;

        $user->email = $correo;
        $user->password = $pass;
        $user->rol = Constantes::NORMAL;
        $user->apellidos = $apellidos;
        $user->nombre = $nombre;
        $user->localidad = $localidad;
        $user->pais = $pais;

        $user->save();
    }

    /*
     * Editar el usuario en base de datos
     * @param type $nombre
     * @param type $apellidos
     * @param type $correo
     * @param type $pass
     * @param type $localidad
     * @param type $pais
     * @param type $img
     */
    public static function editUser($nombre, $apellidos, $correo, $pass, $localidad, $pais, $img) {

        $user = conexion::existeUsuario($correo);
        $user->nombre = $nombre;
        $user->apellidos = $apellidos;
        $user->email = $correo;
        if ($pass != null || $pass != '') {
            $user->password = $pass;
        }
        $user->localidad = $localidad;
        $user->pais = $pais;
        $user->img_user = $img;
        $user->save();
    }

    /*
     * // Buscamos a todos los usuarios en BBDD
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
      } */
}
