<?php

use App\Clases\conexion;
use App\Clases\Auxiliares\Constantes;

session()->put("actPage", Constantes::AD_EVENTOS);

?>
@extends('../general/base')

@section('titulo')
Administrar Eventos
@endsection

@section('contenido')

<link href="css/administracion/admin_style.css" type="text/css" rel="stylesheet">
<script src="scripts/tablas/paginacion.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDwKmL1KMaYg3Hl6ggnEnCVgCCHhtsgvEU&libraries=drawing&callback=initMap"async defer></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>

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
        
        <div class="col-9">

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
                        <th>Portada</th>
                        <th>Borrar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="text" value="Puertollano"></td>
                        <td><input type="text" value="2020-01-29"></td>
                        <td><input type="text" value="2020-01-31"></td>
                        <td><input class="btn btn-warning" type="button" id="b-mapa" data-toggle="modal" data-target="#ventana-mapa" value="Mapa"></td>
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
