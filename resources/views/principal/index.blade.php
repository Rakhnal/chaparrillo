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

<div class="col">
    <div class="row">
        <div class="col justify-content-center principal-container" id="principal-container">
            <div class="row" id="principal">
                <div class="col layer" id="titulopar"></div>
                <div class="col layer" id="logogr"></div>
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
                        <img src="images/chaparrillo/elegidas/clitrar.jpg" class="plaga-img" alt="Plaga 01"/>
                    </div>
                    <div class="row justify-content-center align-items-center add-padding justify-text">
                        <div class="col">
                            <div class="row justify-content-center"> 
                                <h2 class="bolder">Clitra</h2>
                            </div>
                            <div class="row justify-content-center"> 
                                <p>Es un escarabajo crisomélido</p>
                            </div>
                            <div class="row justify-content-center"> 
                                <p>Provoca daños especialmente en plantaciones jóvenes donde muestra una rápida propagación y voracidad en el consumo de brotes</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        <a class="col-md-3 col-sm-12 tilted" href="index" data-tilt>
            <div class="row justify-content-center plaga-div">
                <div class="col">
                    <div class="row justify-content-center align-items-center">
                        <img src="images/chaparrillo/elegidas/plodia.jpg" class="plaga-img" alt="Plaga 01"/>
                    </div>
                    <div class="row justify-content-center align-items-center add-padding justify-text">
                        <div class="col">
                            <div class="row justify-content-center"> 
                                <h2 class="bolder">Polilla de Almacén</h2>
                            </div>
                            <div class="row justify-content-center"> 
                                <p>Polilla de la familia Pyralidae con hábitos nocturnos</p>
                            </div>
                            <div class="row justify-content-center"> 
                                <p>Provoca daños en el proceso de almacenaje, cuando deposita los huevos en el hueco que ella misma genera dentro del grano de pistacho</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>

        <a class="col-md-3 col-sm-12 tilted" href="index" data-tilt>
            <div class="row justify-content-center plaga-div">
                <div class="col">
                    <div class="row justify-content-center align-items-center">
                        <img src="images/chaparrillo/elegidas/psilas.jpg" class="plaga-img" alt="Plaga 01"/>
                    </div>
                    <div class="row justify-content-center align-items-center add-padding justify-text">
                        <div class="col">
                            <div class="row justify-content-center"> 
                                <h2 class="bolder">Psilas del Pistacho</h2>
                            </div>
                            <div class="row justify-content-center"> 
                                <p>Hemíptero de la familia Aphalaridae</p>
                            </div>
                            <div class="row justify-content-center"> 
                                <p>Ninfas y adultos succionan los jugos de las hojas provocando defoliaciones, caída de yemas florales y, eventualmente, parada en el crecimiento vegetativo.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>

        <a class="col-md-3 col-sm-12 tilted" href="index" data-tilt>
            <div class="row justify-content-center plaga-div">
                <div class="col">
                    <div class="row justify-content-center align-items-center">
                        <img src="images/chaparrillo/elegidas/chinche.jpg" class="plaga-img" alt="Plaga 01"/>
                    </div>
                    <div class="row justify-content-center align-items-center add-padding justify-text">

                        <h2 class="bolder">Chinches</h2>

                        <p>Encuadra a varios géneros y familias del Orden Hemíptera.</p>

                        <p>Suelen ser un problema desde la floración (finales de marzo y primera quincena de abril) hasta el endurecimiento de la cáscara (segunda quincena de mayo)</p>
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
