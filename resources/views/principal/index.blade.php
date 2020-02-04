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
<script type="text/javascript" src="scripts/principal/index.js"></script>

<img src="images/logo.svg" alt="Logo Principal" id="logomovil"/>

<div class="col">
    <div class="row">
        <div class="col justify-content-center principal-container">
            <div class="row" id="principal">
                <div class="col layer" data-depth="0.00" id="titulopar"></div>
                <div class="col layer" data-depth="0.1" id="capa01"></div>
                <div class="col layer" data-depth="0.2" id="capa02"></div>
                <div class="col layer" data-depth="0.4" id="capa03"></div>
                <div class="col layer" data-depth="0.3" id="capa04"></div>
                <div class="col layer" data-depth="0.3" id="capa05"></div>
                <div class="col layer" data-depth="0.5" id="circle01"></div>
                <div class="col layer" data-depth="0.2" id="circle02"></div>
            </div>
        </div>
    </div>

    <div class="row fade-up fade-ani" id="plagas-container">
        <a class="col-md-3 col-sm-12 tilted" href="index" data-tilt>
            <div class="row justify-content-center plaga-div">
                <div class="col">
                    <div class="row justify-content-center align-items-center">
                        <img src="images/logo.svg" class="plaga-img" alt="Plaga 01"/>
                    </div>
                    <div class="row justify-content-center align-items-center add-padding justify-text">
                        
                        <h2>Clitra</h2>
                        
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris turpis libero, luctus non porta eget, congue vel orci. Aenean cursus fringilla magna, ut rhoncus quam gravida</p>
                        
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris turpis libero, luctus non porta eget, congue vel orci. Aenean cursus fringilla magna, ut rhoncus quam gravida</p>
                    </div>
                </div>
            </div>
        </a>
        <a class="col-md-3 col-sm-12 tilted" href="index" data-tilt>
            <div class="row justify-content-center plaga-div">
                <div class="col">
                    <div class="row justify-content-center align-items-center">
                        <img src="images/logo.svg" class="plaga-img" alt="Plaga 01"/>
                    </div>
                    <div class="row justify-content-center align-items-center add-padding justify-text">
                        
                        <h2>Polilla de Almacén</h2>
                        
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris turpis libero, luctus non porta eget, congue vel orci. Aenean cursus fringilla magna, ut rhoncus quam gravida</p>
                        
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris turpis libero, luctus non porta eget, congue vel orci. Aenean cursus fringilla magna, ut rhoncus quam gravida</p>
                    </div>
                </div>
            </div>
        </a>

        <a class="col-md-3 col-sm-12 tilted" href="index" data-tilt>
            <div class="row justify-content-center plaga-div">
                <div class="col">
                    <div class="row justify-content-center align-items-center">
                        <img src="images/logo.svg" class="plaga-img" alt="Plaga 01"/>
                    </div>
                    <div class="row justify-content-center align-items-center add-padding justify-text">
                        
                        <h2>Psilas del Pistacho</h2>
                        
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris turpis libero, luctus non porta eget, congue vel orci. Aenean cursus fringilla magna, ut rhoncus quam gravida</p>
                        
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris turpis libero, luctus non porta eget, congue vel orci. Aenean cursus fringilla magna, ut rhoncus quam gravida</p>
                    </div>
                </div>
            </div>
        </a>

        <a class="col-md-3 col-sm-12 tilted" href="index" data-tilt>
            <div class="row justify-content-center plaga-div">
                <div class="col">
                    <div class="row justify-content-center align-items-center">
                        <img src="images/logo.svg" class="plaga-img" alt="Plaga 01"/>
                    </div>
                    <div class="row justify-content-center align-items-center add-padding justify-text">
                        
                        <h2>Chinches</h2>
                        
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris turpis libero, luctus non porta eget, congue vel orci. Aenean cursus fringilla magna, ut rhoncus quam gravida</p>
                        
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris turpis libero, luctus non porta eget, congue vel orci. Aenean cursus fringilla magna, ut rhoncus quam gravida</p>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>

<script>
    var scenePrincipal = document.getElementById('principal');
    var parallaxInstance = new Parallax(scenePrincipal);

    $(document).ready(function () {
        $('.tilted').tilt({
            scale: 1.05
        })
    })
</script>
@endsection
