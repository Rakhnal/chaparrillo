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
<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="scripts/general/gmaps.js"></script>
<script src="scripts/general/geolocate.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDwKmL1KMaYg3Hl6ggnEnCVgCCHhtsgvEU&libraries=drawing&callback=initMap"async defer></script>
<script src="scripts/general/mostrarimagenes.js"></script>
<script src="scripts/ajax/eventosajax.js"></script>

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
        <div class="col">
            <div class="row table-responsive" id="tab-event">
                <table id="events">
                    <thead>
                        <tr>
                            <th>Portada</th>
                            <th>Nombre</th>
                            <th>Localización</th>
                            <th>Fecha inicio</th>
                            <th>Fecha fin</th>
                            <th>Guardar</th>
                            <th>Borrar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($events as $event) { ?>
                            <tr>
                        <form action="formevent" name="formu-event" onsubmit="return confirm('¿Seguro que quieres borrar el evento?')" method="POST">
                            {{ csrf_field() }}
                            <td><img src="" alt="imagen"></td>
                            <td><?= $event->nombre ?></td>
                            <td><?= $event->localizacion ?></td>
                            <td><?= $event->fecha_inicio ?></td>
                            <td><?= $event->fecha_fin ?></td>
                            <input name="id_e" value="<?=$event->id_evento?>" type="hidden">
                            <td><input class="btn btn-primary blurmodal" type="button" id="b-modify" data-user="<?= $event->id_evento ?>" data-toggle="modal" data-target="#ventana-modificar" value="Modificar"></td>
                            <td><input class="btn btn-danger" id="delete" type="submit" name="delete" value="Borrar"></td>
                        </form>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
            
            <div class="row mt-3">
                <div class="col-4">
                    {{ $events->links() }}
                </div>

                <div class="col-4 d-flex justify-content-center">
                    <button class="btn btn-warning blurmodal" type="button" id="crear" data-toggle="modal" data-target="#ventana-crear">Agregar</button>
                </div>
                <div class="col-4">

                </div>

            </div>
        </div>
        <div class="col-6">
            <button class="btn btn-primary blurmodal float-right" id="crear" data-toggle="modal" data-target="#ventana-crear">Agregar</button>
        </div>
    </div>

</div>

@endsection
