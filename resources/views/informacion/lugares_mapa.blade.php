<?php

use App\Clases\conexion;
use App\Clases\Auxiliares\Constantes;

session()->put("actPage", Constantes::LUGARESMAPA);
?>
@extends('../general/base')

@section('titulo')
Lugares de trabajo
@endsection

@section('contenido')

<meta name="csrf_token" content="{{ csrf_token() }}">

<link rel="stylesheet" href="css/informacion/info.css" />
<script type="text/javascript" src="scripts/principal/index.js"></script>
<script src="scripts/general/mapajax.js"></script>

<script>
    $(document).ready(function () {

        PintarMapa(<?= $sat->latitud ?>, <?= $sat->longitud ?>);

    });

</script>

<div class="col">
    <div class="row">
        <div class="col fondo">
            <div class="row h-100 parallax justify-content-center align-items-center" data-parallax="scroll" data-image-src="images/chaparrillo/elegidas/lugaresTrabajo.png">
                <h1 class="bolder">Lugares de trabajo</h1>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col mt-2">
            <div class="row justify-content-center">
                <h3>Aquí se encuentra el colaborador seleccionado</h3>
            </div>

        </div>

    </div>

    <div class="row">
        <div class="col mt-2">
            <div class="row justify-content-center">
                <div id="mapalugar" class="mapaLugares">

                </div>
            </div>

        </div>

    </div>

    <div class="row">
        <div class="col mb-2 mt-2">
            <div class="row justify-content-center">
                <a href="lugares"><button class="btn btnAdd">Volver</button></a>
            </div>

        </div>

    </div>


</div>

@endsection
