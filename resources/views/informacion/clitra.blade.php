<?php

use App\Clases\Auxiliares\Constantes;

session()->put("actPage", Constantes::CLITRA);
?>
@extends('../general/base')

@section('titulo')
Clitra
@endsection

@section('contenido')

<link rel="stylesheet" href="css/informacion/info.css" />
<script type="text/javascript" src="scripts/principal/index.js"></script>

<div class="col">
    <div class="row format-div-b">
        <div class="col-xl-6  col-md-12 no-padding">
            <div class="row h-100 parallax justify-content-center align-items-center" data-parallax="scroll" data-image-src="images/chaparrillo/elegidas/clitrar.jpg">
                <div class="col">
                    <div class="row middle-height justify-content-center align-items-end">
                        <h1 class="bolder">Clitra</h1>
                    </div>

                    <div class="row middle-height justify-content-center align-items-start">
                        <h1><i>Labidostomis lusitanica</i></h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6  col-md-12">
            <div class="row justify-content-center marg-top">
                <h2 class="bolder">Ciclo</h2>
            </div>
            <div class="row add-padding center">
                <p>Aproximadamente en mayo los adultos se desplazan desde la maleza cercana a las plantaciones, permaneciendo en los árboles jóvenes</p>

                <p>Los árboles mayores sólo son atacados cuando no encuentran árboles jóvenes de los que alimentarse</p>

                <p>Los acoplamientos tienen lugar en los mismos árboles, aunque luego se desplazan a la maleza donde realizan su puesta en hojas y ramitas en grupos de unos 10 huevos que eclosionan a los 12 días</p>

                <p>Cuando salen las larvas se refugian en el suelo, hojas secas, etc.</p>

                <p>Puede haber una segunda generación, aunque esta situación es poco probable para las condiciones medias de la mitad sur peninsular</p>
            </div>
        </div>
    </div>
    <div class="row format-div-lessp">
        <div class="col">
            <div class="row">
                <p>Escarabajo crisomélido</p>
            </div>
            <div class="row">
                <p>Daños especialmente en plantaciones jóvenes donde muestra una rápida propagación y voracidad en el consumo de brotes</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col fondo-s">
            <div class="row h-100 parallax justify-content-center align-items-center" data-parallax="scroll" data-image-src="images/chaparrillo/elegidas/pistachos02.jpg">
                <h1 class="bolder">Estrategias de lucha</h1>
            </div>
        </div>
    </div>
    <div class="row format-div">
        <p>Las actuales estrategias de lucha ecológica no están siendo efectivas para el control de Labidostomis lusitanica, ya que los productos que actualmente se emplean (piretrinas principalmente), pierden su efectividad a las pocas horas de su aplicación, y no tienen carácter preventivo. </p>
        <p>Hay que tratar continuamente la plantación para evitar las repetidas oleadas de ataques de clitra que se suceden entre los meses de mayo y junio.</p>
    </div>
</div>

@endsection
