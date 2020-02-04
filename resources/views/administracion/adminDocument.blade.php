<?php

use App\Clases\conexion;
use App\Clases\Auxiliares\Constantes;

session()->put("actPage", Constantes::INDEX);
?>

<link rel="stylesheet" type="text/css" href="css/administracion/admin_style.css">

<?php
include 'auxiliarphp/modales.php';
?>

@extends('../general/base')

@section('titulo')
Inicio
@endsection

@section('contenido')

<div class="col">
    <div class="row">
        <div class="col-3">
            <nav>
                <div class="breadcrumb" id="migas">
                    <div class="breadcrumb-item">Usuario</div>
                    <div class="breadcrumb-item active">Administrar Documentación</div>
                </div>
            </nav>
        </div>
        <div class="col-6 text-center">
            <h1>Administrar Documentación</h1>
        </div>
        <div class="col-3">

        </div>
    </div>
    <div class="row">
        <div class="col table-responsive">
            <table class="mt-5 mb-5 mr-2 ml-2" id="tablaAdminDocument">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Fecha de subida</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Nombre del documentito</td>
                        <td>31/01/2020</td>
                        <td><button class="btn btn-danger" data-toggle="modal" data-target="#modalEliminar">Eliminar</button></td>
                        <td><button class="btn btn-primary" data-toggle="modal" data-target="#modalEditarDocumento">Modificar</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <button class="btn btn-success float-right m-5" id="subirDocument" data-toggle="modal" data-target="#modalSubirDocumento">Subir nueva documentación</button>
        </div>
    </div>
</div>

@endsection
