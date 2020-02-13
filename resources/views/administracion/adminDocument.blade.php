<?php

use App\Clases\conexion;
use App\Clases\Auxiliares\Constantes;

session()->put("actPage", Constantes::AD_DOCUMENTOS);
?>

<link rel="stylesheet" type="text/css" href="css/administracion/admin_style.css">
<script type="text/javascript" src="scripts/general/modales.js"></script>

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
                                <td><button id="eliminarDocumentos" data-id="<?= $doc->id_documento ?>" class="btn btnDelete" name="btnEliminar">Eliminar</button></td>
                                <td><button id="modificarDocumentos" class="btn btnEdit blurmodal" data-toggle="modal" data-target="#modalEditarDocumento">Modificar</button></td>
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

<script>

    $(document).on("click", "#eliminarDocumentos", function () {
        var id = $(this).attr("data-id");
        swal({
            title: "¿Estás seguro?",
            text: "Una vez eliminado no podrás recuperar tu documento.",
            icon: "warning",
            buttons: true,
            confirmButtonText: "Sí",
            cancelButtonText: "No",
            dangerMode: true
        })
                .then((willDelete) => {
                    if (willDelete) {
                        swal(eliminarDocument(id), {
                            icon: "success",
                        });
                    } else {
                        swal("Tranquilo, tu documento está a salvo ;}");
                    }
                });
    });

    function eliminarDocument(id) {
        alert(id);
        var msg = "";
        $.ajax({
            data: {identificador: id},
            url: "eliminarDocumento",
            method: "POST",
            success: function (response) {
                msg = "¡El documento ha sido eliminado con éxito!";
                return response;
            }
        });
        return msg;
        alert("Puta");
    }

</script>

@endsection
