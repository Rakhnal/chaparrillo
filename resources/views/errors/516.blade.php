<?php

use App\Clases\Auxiliares\Constantes;

session()->put("actPage", Constantes::ERROR516);
?>
@extends('../general/base')

@section('titulo')
Error 516
@endsection

@section('contenido')

<link rel="stylesheet" href="css/informacion/info.css" />
<script type="text/javascript" src="scripts/principal/index.js"></script>

<div class="col">
    <div class="row format-div-b">

        <div class="col-xl-6  col-md-12 no-padding">
            <div class="row justify-content-center align-items-center">
                <img alt="logo" src="images/logo.png" class="w-50 justify-content-center" >
            </div>

        </div>

        <div class="col-xl-6  col-md-12">
            <div class="row justify-content-center align-items-center">
                <h2 class="bolder">Error 516</h2>
            </div>
            <div class="row add-padding center h80 format-div-colabs">
                <p>No sé ha podido encontrar la página, no dispone de los permisos necesarios.</p>
            </div>
        </div>

        <div class="col-xl-12 col-md-12">
            <div class="row justify-content-center align-items-center">
                <a href="index"><button class="btn-nuevo">Volver a Inicio</button></a>
            </div>

        </div>

    </div>

</div>

@endsection
