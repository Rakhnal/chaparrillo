<?php

use App\Clases\conexion;
use App\Clases\Auxiliares\Constantes;

session()->put("actPage", Constantes::INDEX);
?>
@extends('../general/base')

@section('titulo')
Inicio
@endsection

@section('contenido')

<link rel="stylesheet" href="css/principal/index.css" />

<div class="col">
    <div class="row">
        <div class="col justify-content-center principal-container">
            <div class="row" id="principal">
                <!--div class="col-6 layer" data-depth="0.2"><img src="images/chaparrillo/elegidas/pistachos01.jpg" id="pistacho01" alt="Imagen Pistacho 01" /></div>
                <div class="col-6 layer" data-depth="0.2"><img src="images/chaparrillo/elegidas/pistachos02.jpg" id="pistacho02" alt="Imagen Pistacho 02" /></div-->
            </div>
        </div>
    </div>
</div>

<script>
    var scenePrincipal = document.getElementById('principal');
    var parallaxInstance = new Parallax(scenePrincipal);
</script>
@endsection
