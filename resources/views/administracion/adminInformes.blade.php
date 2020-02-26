<?php

use App\Clases\conexion;
use App\Clases\Auxiliares\Constantes;

session()->put("actPage", Constantes::AD_INFORMES);
?>

<link rel="stylesheet" type="text/css" href="css/administracion/admin_style.css">

@extends('../general/base')

@section('titulo')
Administrar Informes
@endsection

@section('contenido')

<div class="col">
    <div class="row">
        <div class="col">
            <nav>
                <div class="breadcrumb" id="migas">
                    <div class="breadcrumb-item">Usuario</div>
                    <div class="breadcrumb-item active">Administrar Informes</div>
                </div>
            </nav>
        </div>
    </div>
    <div class="row" id="mainTable">
        <div class="col">
            <div class="row table-responsive">
                <table id="tablaAdminInformes">
                    <thead>
                        <tr>
                            <th hidden>ID</th>
                            <th>Producto</th>
                            <th>Plaga a tratar</th>
                            <th>Fecha Informe</th>
                            <th>Usuario</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($infs as $inf) {
                            ?>
                            <tr>
                        <form action="actInforme" name="infForm" onsubmit="return confirm('¿Quieres proceder con la acción?')" method="POST">
                            {{ csrf_field() }}
                            <td hidden><input type="number" name="idinforme" value="<?= $inf->id_informe ?>"/></td>
                            <td><?= $inf->nombre_producto ?></td>
                            <td><?= $inf->plaga_tratar ?></td>
                            <td><?= $inf->fecha_hora ?></td>
                            <td><?= $inf->nombre ?> <?= $inf->apellidos ?></td>
                            <td><input type="submit" name="delInforme" id="delInforme" class="btn btn-eliminar" value="."/></td>
                            <td><input class="btn btn-modal blurmodal b-modify" type="button" id="b-modify" data-id="<?= $inf->id_informe ?>" data-toggle="modal" data-target="#modalInforme" value=""></td>
                        </form>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>

            <div class="row mt-3">  
                <div class="col-4">
                    {{ $infs->links() }}
                </div>
                <div class="col-4 d-flex justify-content-center">
                    <button class="btn btn-nuevo blurmodal" id="newInforme" data-toggle="modal" data-target="#modalNuevoInforme">Nuevo Informe</button>
                </div>
                <div class="col-4">

                </div>
            </div>
        </div>
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
                url: "modificarInforme",
                data: parametros,
                type: "post",
                success: function (response) {
                    var respuesta = JSON.parse(response);
                    
                    $('#idInforme').val(respuesta.id_informe);
                    $('#productName').val(respuesta.nombre_producto);
                    $('#plagaTratar').val(respuesta.plaga_tratar);
                    $('#polInput').val(respuesta.poligono);
                    $('#parInput').val(respuesta.parcela);
                    $('#munInput').val(respuesta.municipio);
                    $('#litroHectarea').val(respuesta.litro_hectarea);
                    $('#fechaInforme').val(respuesta.fecha_hora);
                    $('#danioAprox').val(respuesta.aprox_dmg);
                    $('#coment').val(respuesta.comentario);
                },
                statusCode: {
                    404: function () {
                        alert('web not found');
                    }
                },
                error: function (x, xs, xt) {
                    alert('error: ' + JSON.stringify(x) + "\n error string: " + xs + "\n error throwed: " + xt);
                }
            });
        });
    </script>

</div>

@endsection
