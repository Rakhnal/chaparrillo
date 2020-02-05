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
        <div class="col">
            <nav>
                <div class="breadcrumb" id="migas">
                    <div class="breadcrumb-item">Usuario</div>
                    <div class="breadcrumb-item active">Administrar Eventos</div>
                </div>
            </nav>
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
                        <th>Datos</th>
                        <th>Portada</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($events as $event) {
                        ?>
                        <tr>
                            <td><input type="text" value="<?= $event->nombre ?>"></td>
                            <td><input type="date" value="<?= $event->fecha_inicio ?>"></td>
                            <td><input type="date" value="<?= $event->fecha_fin ?>"></td>
                            <td><input class="btn btn-warning" type="button" id="b-mapa" data-toggle="modal" data-target="#ventana-mapa" value="Mapa"></td>
                            <td><input class="btn btn-primary" type="button" value="Guardar"></td>
                            <td><input class="btn btn-primary" type="button" value="Modificar"></td>
                            <td><input class="btn btn-danger" type="button" value="Eliminar"></td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col">
            {{ $events->links() }}
        </div>
    </div>
</div>

@endsection
