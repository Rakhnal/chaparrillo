<?php

use App\Clases\Auxiliares\Constantes;

session()->put("actPage", Constantes::CULTIVO_CLM);
?>
@extends('../general/base')

@section('titulo')
Cultivo en CLM
@endsection

@section('contenido')

<link rel="stylesheet" href="css/informacion/info.css" />
<script type="text/javascript" src="scripts/principal/index.js"></script>

<div class="col">

    <div class="row">
        <div class="col fondo">
            <div class="row h-100 parallax justify-content-center align-items-center" data-parallax="scroll" data-image-src="images/chaparrillo/elegidas/pistachos04.png">
                <h1 class="bolder">Cultivo en CLM</h1>
            </div>
        </div>
    </div>
    <div class="row format-div no-margins-paddings">

        <div class="col">

            <div class="row">
                <div class="col">
                    <div class="row justify-content-center">
                        <h3>Situación actual</h3>
                    </div>
                    <div class="row format-div-colabs">
                        <p>A nivel mundial existen unas 550.000 ha actuales. Irán figura como el país más destacado con 250.000 ha, a pesar de la drástica reconversión llevada a cabo a partir del año 2005, momento en el que se prescindió de un importante número de plantaciones ubicadas en lugares poco propicios. En segundo lugar, destaca California (EE. UU.) con 140.000 ha, Turquía y Siria siguen a California, situándose España tras ellos con una cifra superior a las 22.000 ha (estimación 2019), por encima de países tradicionales como Grecia e Italia.</p>
                    </div>
                    <div class="row justify-content-center align-items-center">
                        <div class="col-6 d-flex justify-content-center">
                            <img src="images/chaparrillo/elegidas/grafica1.jpg" alt="Gráfica 1"/>
                        </div>
                        <div class="col-6 d-flex justify-content-center">
                            <img src="images/chaparrillo/elegidas/grafica2.jpg" alt="Gráfica 2"/>
                        </div>
                    </div>
                    <div class="row format-div-colabs text-center pie-texto">
                        <p>(Fuente: FAOSTAT. Statistics Division, Food and Agricultural Organization of the U.N. http//faostat.fao.org)</p>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    <div class="row justify-content-center">
                        <h3>Patrones y variedades</h3>
                    </div>
                    <div class="row format-div-colabs">
                        <p>Los portainjertos más comunes del pistachero en Castilla-La Mancha son:</p>
                        <ul>
                            <li class="patrones_variedades">- Cornicabra o terebinto (<i>Pistacia terebinthus</i>)</li>
                            <img src="images/chaparrillo/elegidas/cornicabra.jpg" class="fotos_lista mb-3" alt="Cornicabra">
                            <li class="patrones_variedades">- Atlántica (<i>P. atlantica</i>)</li>
                            <img src="images/chaparrillo/elegidas/p_atlantica.jpg" class="fotos_lista mb-3" alt="Atlántica">
                            <li class="patrones_variedades">- UCB1 (<i>P. atlantica x P. integerrima</i>)</li>
                            <img src="images/chaparrillo/elegidas/ucb1.jpg" class="fotos_lista mb-3" alt="UCB1">
                        </ul>
                    </div>
                    <div class="row format-div-colabs">
                        <p>Entre las diferentes variedades de pistachero que pueden resultar interesantes para Castilla La Mancha pueden destacarse:</p>
                        <ul>
                            <li class="patrones_variedades">- Kerman</li>
                            <img src="images/chaparrillo/elegidas/kerman.jpg" class="fotos_lista mb-3" alt="Kerman">
                            <li class="patrones_variedades">- Larnaka</li>
                            <img src="images/chaparrillo/elegidas/larnaka.jpg" class="fotos_lista mb-3" alt="Larnaka">
                            <li class="patrones_variedades">- Avdat</li>
                            <img src="images/chaparrillo/elegidas/avdat.jpg" class="fotos_lista mb-3" alt="Avdat">
                            <li class="patrones_variedades">- Sirora</li>
                            <img src="images/chaparrillo/elegidas/sirora.jpg" class="fotos_lista mb-3" alt="Sirora">
                            <li class="patrones_variedades">- Peter (masculina)</li>
                            <img src="images/chaparrillo/elegidas/peter.jpg" class="fotos_lista mb-3" alt="Peter">
                            <li class="patrones_variedades">- C-Especial (masculina)</li>
                            <img src="images/chaparrillo/elegidas/c-especial.jpg" class="fotos_lista mb-3" alt="C-Especial">
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
