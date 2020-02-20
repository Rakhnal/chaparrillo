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
<script src="scripts/general/mostrarimagenes.js"></script>
<meta name="csrf_token" content="{{ csrf_token() }}">


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

    <div class="row" id="mainTable">
        <div class="col">
            <div class="row table-responsive" id="tab-event">
                <table id="events">
                    <thead>
                        <tr>
                            <th id="portada-e">Portada</th>
                            <th id="nombre-e">Nombre</th>
                            <th id="local-e">Localización</th>
                            <th id="fi-e">Fecha inicio</th>
                            <th id="ff-e">Fecha fin</th>
                            <th id="borrar-e">Borrar</th>
                            <th id="guardar-e">Guardar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($events as $event) { ?>
                            <tr>
                                <td><img src="data:image/jpg;base64,<?php echo base64_encode($event->imagen); ?>" alt="Portada evento" class="img-fluid img-ev"></td>
                                <td><?= $event->nombre ?></td>
                                <td><?= $event->localizacion ?></td>
                                <td><?= $event->fecha_inicio ?></td>
                                <td><?= $event->fecha_fin ?></td>
                        <input id="id_e" name="id_e" value="<?= $event->id_evento ?>" type="hidden">
                        <td><input class="btn btn-eliminar" id="delete" type="submit" name="delete" value="Eliminar"></td>
                        <td><input class="btn btn-guardar blurmodal b-modify" type="button" id="b-modify" data-id="<?= $event->id_evento ?>" data-toggle="modal" data-target="#ventana-modificar" value="Modificar"></td>
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
                    <button class="btn btnAdd blurmodal" type="button" id="crear" data-toggle="modal" data-target="#ventana-crear">Agregar</button>
                </div>
                <div class="col-4">

                </div>

            </div>
        </div>
    </div>
    <?php
    if (isset($error)) {

        $error = implode(',', $error);
        ?>
        <span id="m-error" class="alert alert-danger text-center fixed-bottom"><?php echo $error; ?></span>
    <?php } ?>
</div>
<script>
    $(document).ready(function () {

        $('#m-error').hide(9000);
        $('#m-error').hide("slow");

    });

    $(document).on("click", ".b-modify", function () {

        var token = '{{csrf_token()}}';
        var parametros = {
            "ide": $(this).attr('data-id'),
            "_token": token
        };
        
        $.ajax({
            url: "modificarEvento",
            data: parametros,
            type: "post",
            success: function (response) {
                var respuesta = response; 
            },
            statusCode: {
                404: function () {
                    alert('web not found');
                }
            },
            error: function (x, xs, xt) {
//                window.open(JSON.stringify(x));
                alert('error: ' + JSON.stringify(x) + "\n error string: " + xs + "\n error throwed: " + xt);
            }
        });
    });
</script>
@endsection
