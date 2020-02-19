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
//Página de administrar usuario propio
Route::get('Editar_usuario', function () {
    return view('principal/Editar_usuario');
});
Route::post('edit_us', 'EditUserController@editarUsuario');

// DES18: Página Administrar Eventos - RAUS
// Página Administración
Route::get('admin_event',['uses' =>  'controlador_tablas@listarEventos', 'as' => 'admin_event']);
Route::post('formevent','controlador_tablas@eliminarEventos');
Route::post('agregarEvento','controlador_tablas@agregarEventos');
Route::post('modificarEvento',['as' => 'modificarEvento', 'uses' => 'controlador_tablas@modificarEventos']);
Route::post('categorias','controlador_tablas@sacarCategorias');

// DES17: Página Administrar Documentos - NLO
// Listar documentos
Route::get('adminDocument', 'controlador_tablas@listarDocumentos');
// Eliminar documentos
Route::post('eliminarDocumento', ['as' => 'eliminarDocumento', 'uses' => 'controlador_tablas@eliminarDocumentos']);
// Buscar documentos
Route::post('buscarDocumento', ['as' => 'buscarDocumento', 'uses' => 'controlador_tablas@buscarDocumentos']);
// Modificar documentos
Route::post('modificarDocumento', ['as' => 'modificarDocumento', 'uses' => 'controlador_tablas@modificarDocumentos']);

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
