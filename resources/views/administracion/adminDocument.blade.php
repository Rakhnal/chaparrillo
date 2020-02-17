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
                            <th>Fecha de subida</th>
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
                                <td><?= $doc->fecha_subida ?></td>
                                <td><form name="formEliminar" action="eliminarDocumento" method="POST">{{ csrf_field() }}<input type="button" id="eliminarDocumentos" data-id="<?= $doc->id_documento ?>" class="btn btnDelete" name="btnEliminar" value="Eliminar"></form></td>
                                <td><form name="formModificar" action="modificarDocumento" method="POST"><input type="button" id="modificarDocumentos" class="btn btnEdit blurmodal" data-idMod="<?= $doc->id_documento ?>" data-toggle="modal" data-target="#modalEditarDocumento" value="Modificar"></form></td>
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
                    <button class="btn blurmodal btnAdd" id="subirDocument" data-toggle="modal" data-target="#modalSubirDocumento">Agregar</button>
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
//        alert(id);
//        var token = '{{csrf_token()}}';
//        $.ajax({
//            type: "post",
//            url: "eliminarDocumento",
//            data: {identificador: id, _token: token},
//            success: function (response) {
//                alert("Success!");
//                return response;
//            },
//            error: function () {
//                alert("Me he roto");
//            }
//        });
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
                    alert('web not found');
                }
            },
            error: function () {
                alert("Me he roto");
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
        var id = $(this).attr("data-id");
        .then((willDelete) => {
            if (willDelete) {
                modificarDocument(id);
            } else {
                swal("Tranquilo, tu documento está a salvo ;}");
            }
        });
    });

    function modificarDocument(id) {
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
                    alert(response);
                } else {
                    swal("Error al modificar el documento.", {
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

</script>

@endsection
