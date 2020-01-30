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

<img src="images/logo.png" alt="Logo Principal" id="logomovil"/>

<div class="col">
    <div class="row">
        <div class="col justify-content-center principal-container">
            <div class="row" id="principal">
                <div class="col layer" data-depth="0.00"><img src="images/parallax/titulo.png" id="titulopar" alt="Pistachos Ecologicos" /></div>
                <div class="col layer" data-depth="0.1"><img src="images/parallax/capa01.png" id="capa01" alt="Imagen Pistacho 01" /></div>
                <div class="col layer" data-depth="0.2"><img src="images/parallax/capa02.png" id="capa02" alt="Imagen Pistacho 02" /></div>
                <div class="col layer" data-depth="0.4"><img src="images/parallax/capa03.png" id="capa03" alt="Imagen Pistacho 03" /></div>
                <div class="col layer" data-depth="0.3"><img src="images/parallax/capa04.png" id="capa04" alt="Imagen Pistacho 04" /></div>
            </div>
        </div>
    </div>
</div>

<script>
    var scenePrincipal = document.getElementById('principal');
    var parallaxInstance = new Parallax(scenePrincipal);
</script>
@endsection
