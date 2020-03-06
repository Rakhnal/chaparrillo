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

<?php
$user = session()->get("userObj");
?>

<div class="col">
    <div class="row">
        <div class="col-4">
            <nav>
                <div class="breadcrumb" id="migas">
                    <div class="breadcrumb-item">Usuario</div>
                    <div class="breadcrumb-item active">Administrar Informes</div>
                </div>
            </nav>
        </div>
        <div class="col">

            <div class="row justify-content-end">
                <input class="btn btn-nuevo margin-top-less margin-right-por" type="button" id="exportTable" value="Exportar Tabla">
                <?php
                if ($user->rol == Constantes::ADMIN) {
                    ?>

                    <input class="btn btn-nuevo blurmodal margin-top-less margin-right-por" type="button" id="plagasBtn" data-toggle="modal" data-target="#modalPlagas" value="Administrar Plagas">

                    <?php
                }
                ?>
            </div>
        </div>
    </div>
    <div class="row" id="mainTable">
        <div class="col">
            <div class="row table-responsive">
                <table id="tablaAdminInformes">
                    <thead>
                        <tr>
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
                                <td><?= $inf->nombre_producto ?></td>
                                <td><?= $inf->nombre_plaga ?></td>
                                <td><?= $inf->fecha_hora ?></td>
                                <td><?= $inf->nombre ?> <?= $inf->apellidos ?></td>
                                <td><input class="btn btn-eliminar" data-id="<?= $inf->id_informe ?>" id="delInforme" type="submit" name="delete" value=""></td>
                                <td><input class="btn btn-modal blurmodal b-modify" type="button" id="b-modify" data-id="<?= $inf->id_informe ?>" data-toggle="modal" data-target="#modalInforme" value=""></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
                <table id="tablaInformesExportar" hidden>
                    <thead>
                        <tr>
                            <th>Plaga a tratar</th>
                            <th>Producto</th>
                            <th>Fecha Informe</th>
                            <th>Usuario</th>
                            <th>Litro por Hectarea</th>
                            <th>Daño Aproximado (%)</th>
                            <th>Poligono</th>
                            <th>Parcela</th>
                            <th>Municipio</th>
                            <th>Comentario</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($infs as $inf) {
                            ?>
                            <tr>
                                <td><?= $inf->nombre_plaga ?></td>
                                <td><?= $inf->nombre_producto ?></td>
                                <td><?= $inf->fecha_hora ?></td>
                                <td><?= $inf->nombre ?> <?= $inf->apellidos ?></td>
                                <td><?= $inf->litro_hectarea ?></td>
                                <td><?= $inf->aprox_dmg ?></td>
                                <td><?= $inf->poligono ?></td>
                                <td><?= $inf->parcela ?></td>
                                <td><?= $inf->municipio ?></td>
                                <td><?= $inf->comentario ?></td>
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

    <script src="scripts/tablas/jquery.table2excel.js"></script>

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
                    $('#polInput').val(respuesta.poligono);
                    $('#parInput').val(respuesta.parcela);
                    $('#munInput').val(respuesta.municipio);
                    $('#litroHectarea').val(respuesta.litro_hectarea);
                    $('#fechaInforme').val(respuesta.fecha_hora);
                    $('#danioAprox').val(respuesta.aprox_dmg);
                    $('#coment').val(respuesta.comentario);

                    var selectUsers = document.getElementById('userProp');
                    var selectPlagas = document.getElementById('plagaTratar');

                    selectUsers.value = respuesta.id_user;
                    selectPlagas.value = respuesta.id_plaga;
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

        $(document).on("click", "#delInforme", function () {
            var id = $(this).attr("data-id");

            swal({
                title: "¿Estás seguro?",
                text: "Una vez eliminado no podrás recuperar el informe.",
                icon: "warning",
                buttons: true,
                dangerMode: true
            })
                    .then((willDelete) => {
                        if (willDelete) {
                            eliminarInforme(id);
                        } else {
                            swal("El informe no ha sido eliminado.");
                        }
                    });
        });

        $(document).on("click", "#exportTable", function () {

            $("#tablaInformesExportar").table2excel({
                exclude: ".noExl", // Si hay algún tr con esta clase no lo pone en el excel
                name: "Hoja 01",
                filename: "Informe_Plagas", // Nombre del archivo (no poner la extensión)
                fileext: ".xls" // Ectensión del archivo
            });
        });

        function eliminarInforme(id) {
            var token = '{{csrf_token()}}';
            var parametros = {
                "idinforme": id,
                "_token": token
            };
            $.ajax({
                url: "actInforme",
                data: parametros,
                type: 'post',
                success: function (response) {
                    if (response === "ok") {
                        location.reload();
                    } else {
                        swal("Error al eliminar el informe.", {
                            icon: "error"
                        });
                    }
                },
                statusCode: {
                    404: function () {
                        swal('Página no encontrada.');
                    }
                },
                error: function () {
                    swal("Algo ha ido mal ", {
                        icon: "error"
                    });
                }
            });
        }
    </script>

</div>

@endsection
