<?php

use App\Clases\conexion;
use App\Clases\Auxiliares\Constantes;

session()->put("actPage", Constantes::AD_EVENTOS);

?>
@extends('../general/base')

@section('titulo')
AdminEventos
@endsection

@section('contenido')

<link href="css/administracion/admin_style.css" type="text/css" rel="stylesheet">
<link href="scripts/tablas/paginacion.js" type="text/javascript">

<div class="col">
    <div class="row">
        <div class="col-3">
            <nav>
                <div class="breadcrumb" id="migas">
                    <div class="breadcrumb-item">Usuario</div>
                    <div class="breadcrumb-item active">Administrar Eventos</div>
                </div>
            </nav>
        </div>

        <div class="col-6">
            <h1 class="text-center">Administrar Eventos</h1>
        </div>

        <div class="col-3">

        </div>
    </div>

    <div class="row">
        <div class="col table-responsive" id="tab-event">
            <table id="events">
                <thead>
                    <tr>
                        <th>Localización</th>
                        <th>Fecha inicio</th>
                        <th>Fecha fin</th>
                        <th>Mapa</th>
                        <th>Guardar</th>
                        <th>Modificar</th>
                        <th>Borrar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="text" value="Puertollano"></td>
                        <td><input type="text" value="2020-01-29"></td>
                        <td><input type="text" value="2020-01-31"></td>
                        <td><input class="btn btn-warning" type="button" value="Mapa"></td>
                        <td><input class="btn btn-primary" type="button" value="Guardar"></td>
                        <td><input class="btn btn-primary" type="button" value="Modificar"></td>
                        <td><input class="btn btn-danger" type="button" value="Borrar"></td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</div>

@endsection
