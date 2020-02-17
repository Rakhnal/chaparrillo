<?php

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */

// DES03: Página Index - ADC
// Página principal
Route::get('/', function () {
    return view('principal/index');
});

Route::get('index', function () {
    return view('principal/index');
});

//DES15
//Página de editar usuario propio
Route::get('Editar_usuario', function () {
    return view('principal/Editar_usuario');
});

// DES18: Página Administrar Eventos - RAUS
// Página Administración
Route::get('admin_event', 'controlador_tablas@listarEventos');
Route::post('formevent','controlador_tablas@eliminarEventos');
Route::post('agregarEvento','controlador_tablas@agregarEventos');
Route::post('modificarEvento','ctrlAjax@modificarEventos');
Route::post('categorias','controlador_tablas@sacarCategorias');

// DES17: Página Administrar Documentos - NLO
// Página Administración
Route::get('adminDocument', 'controlador_tablas@listarDocumentos');
//Route::post('eliminarDocumento', 'controlador_tablas@eliminarDocumentos');
//Route::post('borrame', 'controlador_tablas@borrame');
Route::post('eliminarDocumento', ['as' => 'eliminarDocumento', 'uses' => 'controlador_tablas@eliminarDocumentos']);

// DES21: Login/Registro - ADC
// Login
Route::post('login', 'usercontroller@iniciarSesion');
// Registro
Route::post('registro', 'usercontroller@registrarUsuario');
// Cerrar sesión
Route::get('logout', 'usercontroller@cerrarSesion');

// DES19: Página Administrar Informes - ADC
Route::get('adminInformes', 'controlador_tablas@listarInformes');
Route::post('newInforme', 'controlador_tablas@agregarInforme');
Route::post('actInforme', 'controlador_tablas@actInforme');

// DES04: Página Proyecto - ADC
Route::get('proyecto', function () {
    return view('informacion/proyecto');
});
