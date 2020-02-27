<?php

use App\Clases\conexion;
use App\Clases\Auxiliares\Constantes;

session()->put("actPage", Constantes::AD_DOCUMENTOS);
?>

<link rel="stylesheet" type="text/css" href="css/administracion/admin_style.css">
<script type="text/javascript" src="scripts/general/modales.js"></script>
<meta name="csrf_token" content="{{ csrf_token() }}">

@extends('../general/base')

@section('titulo')
Administrar Documentación
@endsection

@section('contenido')

<div class="col">
    <div class="row">
        <div class="col">
            <nav>
                <div class="breadcrumb" id="migas">
                    <div class="breadcrumb-item">Usuario</div>
                    <div class="breadcrumb-item active">Administrar Documentación</div>
                </div>
            </nav>
        </div>
    </div>
    <div class="row" id="mainTable">
        <div class="col">
            <div class="row table-responsive">
                <table id="tablaAdminDocument">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Año de publicación</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($docs as $doc) {
                            ?>
                            <tr>
                                <td><?= $doc->id_documento ?></td>
                                <td><?= $doc->nombre ?></td>
                                <td><?= $doc->descripcion ?></td>
                                <td><?= $doc->anio ?></td>
                                <td><form name="formEliminarDoc" id="formEliminarDoc" action="eliminarDocumento" method="POST">{{ csrf_field() }}<input type="button" id="eliminarDocumentos" name="btnEliminar" data-id="<?= $doc->id_documento ?>" class="btn btn-eliminar" value="Eliminar"></form></td>
                                <td><input type="button" id="modificarDocumentos" name="btnModificar" data-idMod="<?= $doc->id_documento ?>" class="btn btn-modal blurmodal" data-toggle="modal" data-target="#modalEditarDocumento" value=""></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <div class="row mt-3">  
                <div class="col-4">
                    {{ $docs->links() }}
                </div>
                <div class="col-4 d-flex justify-content-center">
                    <input type="button" class="btn blurmodal btnAdd" name="subirDocument" id="subirDocument" data-toggle="modal" data-target="#modalSubirDocumento" value="Nuevo documento">
                </div>
                <div class="col-4">

                </div>
            </div>
        </div>
    </div>

</div>

<script type="text/javascript">

    $(document).on("click", "#eliminarDocumentos", function () {
        var id = $(this).attr("data-id");
        swal({
            title: "¿Estás seguro?",
            text: "Una vez eliminado no podrás recuperar tu documento.",
            icon: "warning",
            buttons: true,
            dangerMode: true
        })
                .then((willDelete) => {
                    if (willDelete) {
                        eliminarDocument(id);
                    } else {
                        swal("Tranquilo, tu documento está a salvo ;}");
                    }
                });
    });

    function eliminarDocument(id) {
        var token = '{{csrf_token()}}';
        var parametros = {
            "identificador": id,
            "_token": token
        };
        $.ajax({
            url: "eliminarDocumento",
            data: parametros,
            type: 'post',
            success: function (response) {
                if (response === "ok") {
                    location.reload();
                } else {
                    swal("Error al eliminar el documento.", {
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
                swal("Algo ha ido mal :/", {
                    icon: "error"
                });
            }
        });
    }
    
    $(document).on("click", "#modificarDocumentos", function () {
        var id = $(this).attr("data-idMod");
        var token = '{{csrf_token()}}';
        var parametros = {
            "identificador": id,
            "_token": token
        };
        alert(id);
        $.ajax({
            url: "buscarDocumento",
            data: parametros,
            type: 'post',
            success: function (response) {
                var respuesta = JSON.parse(response);
                alert(respuesta.qhp);
                $('#nombreEditarDoc').val(respuesta.nombre);
                $('#descEditarDoc').val(respuesta.descripcion);
                $('#selectVisible').val(respuesta.visible);
            },
            statusCode: {
                404: function () {
                    swal('Página no encontrada.');
                }
            },
            error: function () {
                swal("Algo ha ido mal :/", {
                    icon: "error"
                });
            }
        });
    });

</script>

@endsection
