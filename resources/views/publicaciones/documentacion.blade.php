<?php

use App\Clases\conexion;
use App\Clases\Auxiliares\Constantes;

session()->put("actPage", Constantes::DOCUMENTACION);
?>

<link rel="stylesheet" type="text/css" href="css/administracion/admin_style.css">
<link rel="stylesheet" type="text/css" href="css/publicaciones/documentacion.css">
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
    <div class="row mb-5">
        <div class="col">
            <select id="selectCategoria">
                <option value="todas">Todas las categorías</option>
                <?php
                $cats = conexion::sacarCategorias();

                foreach ($cats as $cat) {
                    ?>
                    <option value="<?= $cat->id_categoria ?>"><?= $cat->nombre ?></option>
                    <?php
                }
                ?>
            </select>
        </div>
    </div>
    <div class="row">
        <?php
        foreach ($docs as $doc) {
            ?>
            <div class="col-4 divDocumento mb-5">
                <div class="row">
                    <div class="col text-center">
                        <span class="docNombre"><?= $doc->nombre ?></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col text-center">
                        <span class="docFechaSubida">Subido en <?= $doc->fecha_subida ?></span>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-6 p-0 text-center">
                        <img src="images/icons/calendar.png" class="iconitos">
                        <span class="docAnio"><?= $doc->anio ?></span>
                    </div>
                    <div class="col-6 p-0 text-center">
                        <img src="images/icons/face-id.png" class="iconitos">
                        <span class="docAutores"><?= $doc->autores ?></span>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
    <div class="row mt-3">  
        <div class="col-4">
            {{ $docs->links() }}
        </div>
        <div class="col-4">

        </div>
        <div class="col-4">

        </div>
    </div>
</div>

@endsection
