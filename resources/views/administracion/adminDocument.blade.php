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
                        <form name="formDelete" action="eliminarDocumento" onsubmit="return swal('¿Seguro que quieres eliminar el documento?')" method="POST">
                            {{ csrf_field() }}
                            <td><?= $doc->nombre ?></td>
                            <td><?= $doc->fecha_subida ?></td>
                            <input id="id_d" name="id_d" value="<?= $doc->id_documento ?>" type="hidden">
                            <td><input type="submit" class="btn btnDelete" name="btnEliminar" value="Eliminar"></td>
                            <td><button id="modificarDocumentos" class="btn btnEdit blurmodal" data-toggle="modal" data-target="#modalEditarDocumento">Modificar</button></td>
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

@endsection
