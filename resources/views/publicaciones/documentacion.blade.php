<?php

use App\Clases\conexion;
use App\Clases\Auxiliares\Constantes;

session()->put("actPage", Constantes::DOCUMENTACION);
?>

<link rel="stylesheet" type="text/css" href="css/administracion/admin_style.css">
<script type="text/javascript" src="scripts/general/modales.js"></script>
<meta name="csrf_token" content="{{ csrf_token() }}">
<!-- Author: Nathan -->

@extends('../general/base')

@section('titulo')
Documentación
@endsection

@section('contenido')

<div class="col">
    <div class="row">
        <div class="col">
            <nav>
                <div class="breadcrumb" id="migas">
                    <div class="breadcrumb-item active">Documentación</div>
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
                            <th>Año de publicación</th>
                            <th>Autores</th>
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
                                <td><?= $doc->anio ?></td>
                                <td><?= $doc->autores ?></td>
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

@endsection
