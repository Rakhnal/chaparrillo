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

// DES17: Página Administrar Documentos - NLO
// Página Administración
Route::get('adminDocument', 'controlador_tablas@listarDocumentos');
