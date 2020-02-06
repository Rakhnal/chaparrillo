<?php

namespace App\Clases\Auxiliares;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Constantes {
    // Conexión a BBDD
    const IP = "localhost";
    const USUARIO = "chaparrillo";
    const CONTRASENA = "pistacho123";
    const BBDD = "chaparrillo";
    
    // Páginas del proyecto
    const INDEX = "index";
    const INFO = "infoPage";
    const FORO = "foro";
    const DOCUMENTACION = "documentacion";
    const AGENDA = "agenda";
    const AD_EVENTOS = "admin_eventos";
    const AD_DOCUMENTOS = "adminDocument";
    const ED_USUARIO = "Editar_usuario";
    
    // Roles
    const NORMAL = "0";
    const ADMIN = "1";
    const SWATS = "2";
}
