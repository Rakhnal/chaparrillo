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
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script src="scripts/tablas/paginacion.js"></script>
<script type="text/javascript" src="scripts/general/gmaps.js"></script>
<script src="scripts/general/geolocate.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDwKmL1KMaYg3Hl6ggnEnCVgCCHhtsgvEU&libraries=drawing&callback=initMap"async defer></script>

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
                        <th>Portada</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Localización</th>
                        <th>Fecha inicio</th>
                        <th>Fecha fin</th>
                        <th>Guardar</th>
                        <th>Borrar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><img src="" alt="imagen"></td>
                        <td>dasdfidsk</td>
                        <td>dasdfidsk</td>
                        <td>asdfasdfsd</td>
                        <td>asdfsdfs</td>
                        <td>asdf</td>
                        <td><input class="btn btn-primary blurmodal" type="button" id="b-modify" data-toggle="modal" data-target="#ventana-modificar" value="Modificar"></td>
                        <td><input class="btn btn-danger" id="delete" type="button" value="Borrar"></td>
                    </tr>
                    <tr>
                        <td class="text-center" colspan="7"><input class="btn btn-primary blurmodal" type="button" id="crear" data-toggle="modal" data-target="#ventana-crear" value="Agregar"></td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</div>

@endsection
