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
    <div class="row">
        <div class="col table-responsive">
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
                            <td><?= $doc->nombre ?></td>
                            <td><?= $doc->fecha_subida ?></td>
                            <td><button class="btn btn-danger" data-toggle="modal" data-target="#modalEliminar">Eliminar</button></td>
                            <td><button class="btn btn-primary blurmodal" data-toggle="modal" data-target="#modalEditarDocumento">Modificar</button></td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row mt-3">  
        <div class="col-6">
            {{ $docs->links() }}
        </div>
        <div class="col-6">
            <button class="btn btn-success blurmodal float-right" id="subirDocument" data-toggle="modal" data-target="#modalSubirDocumento">Subir nueva documentación</button>
        </div>
    </div>
</div>

@endsection
