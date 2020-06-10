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
    const INDEX = "principal/index";
    const INFO = "infoPage";
    const PROYECTO = "informacion/proyecto";
    const CLITRA = "informacion/clitra";
    const POLILLA = "informacion/polilla";
    const PSILAS = "informacion/psilas";
    const CHINCHES = "informacion/chinches";
    const FAQS = "informacion/faqs";
    const FORO = "publicaciones/foro";
    const VERFORO = "publicaciones/verForo";
    const DOCUMENTACION = "publicaciones/documentacion";
    const AGENDA = "publicaciones/agenda";
    const AD_EVENTOS = "administracion/admin_eventos";
    const AD_DOCUMENTOS = "administracion/adminDocument";
    const AD_INFORMES = "administracion/adminInformes";
    const AD_USUARIOS = "administracion/admin_usuarios";
    const ED_USUARIO = "principal/Editar_usuario";
    const AD_NOTICIAS = "principal/Noticias";
    
    // Roles
    const NORMAL = "0";
    const ADMIN = "1";
    const SWATS = "2";
    
    //Tipos
    const NOTICIA = 0;
    const EVENTO = 1;
    const DOCUMENTO = 2;
    const TEMA = 3;
    const COMENTARIO = 4;
    
    // Select de Plagas
    const CLITRASEL = "Clitra";
    const PSILASSEL = "Psilas del Pistacho";
    const POLILLASEL = "Polilla de Almacen";
    const CHINCHESEL = "Chinches";
    const OTRA = "Otra";
    
    //Errores
    
    const ERROR516 = "errors/516";
}
