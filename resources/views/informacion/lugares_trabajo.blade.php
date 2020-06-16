<?php

use App\Clases\conexion;
use App\Clases\Auxiliares\Constantes;

session()->put("actPage", Constantes::LUGARTRABAJO);
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

        var token = '{{csrf_token()}}';
        var parametros = {
            "ide": $(this).attr('data-id'),
            "_token": token
        };

        $.ajax({
            url: "lugares",
            data: parametros,
            type: "get",
            success: function (response) {
                var respuesta = JSON.parse(response);
                
                

            },
            statusCode: {
                404: function () {
                    alert('web not found');
                }
            },
            error: function (x, xs, xt) {
//                window.open(JSON.stringify(x));
                alert('error: ' + JSON.stringify(x) + "\n error string: " + xs + "\n error throwed: " + xt);
            }
        });
        
        PintarMapa(0,0);

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
                <h1>Aquí podrás ver a dondé se encuentran nuestros socios</h1>
            </div>

        </div>

    </div>

    <div class="row">
        <div class="col mt-3">
            <div class="row justify-content-center">
                <div id="mapalugar" class="mapaLugares"></div>
            </div>

        </div>

    </div>

</div>



@endsection
