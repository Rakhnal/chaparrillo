<?php

use App\Clases\Auxiliares\Constantes;

session()->put("actPage", Constantes::PSILAS);
?>
@extends('../general/base')

@section('titulo')
Psilas del pistacho
@endsection

@section('contenido')

<link rel="stylesheet" href="css/informacion/info.css" />
<script type="text/javascript" src="scripts/principal/index.js"></script>

<div class="col">
    <div class="row format-div-b">
        <div class="col-md-6 no-padding">
            <div class="row h-100 parallax justify-content-center align-items-center" data-parallax="scroll" data-image-src="images/chaparrillo/elegidas/psilas.jpg">
                <div class="col">
                    <div class="row middle-height justify-content-center align-items-end">
                        <h1 class="bolder">Psilas del pistacho</h1>
                    </div>

                    <div class="row middle-height justify-content-center align-items-start">
                        <h1>Labidostomis lusitanica</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="row justify-content-center align-items-center marg-top h20">
                <h2 class="bolder">Descripción</h2>
            </div>
            <div class="row add-padding center h80">
                <p>Hemíptero de la familia Aphalaridae</p>

                <p>Conocidas también como CPP por sus siglas en inglés</p>

                <p>Ninfas y adultos succionan los jugos de las hojas provocando defoliaciones, caída de yemas florales y, eventualmente, parada en el crecimiento vegetativo. Todo ello lleva a una pérdida importante de producción tanto por causas directas como por los efectos colaterales ligados a la enorme generación de melaza por parte de estos hemípteros</p>
            </div>
        </div>
    </div>
    <div class="row format-div-lessp">
        <div class="col">
            <div class="row">
                <p>En estas latitudes existen dos formas estacionales (de verano y de invierno) y una forma intermedia, las cuales se diferencian tanto en su forma como en su fecundidad. Las formas invernales e intermedias son altamente fecundas apareciendo a principios de abril. Las formas intermedias aparecerían cuando el fotoperiodo tiene una duración inferior a las 12 h y las temperaturas superan los 20ºC</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col fondo-s">
            <div class="row h-100 parallax justify-content-center align-items-center" data-parallax="scroll" data-image-src="images/chaparrillo/elegidas/injerto01.jpg">
                <h1 class="bolder">Estrategias de lucha</h1>
            </div>
        </div>
    </div>
    <div class="row format-div">
        <p>El desarrollo de métodos de lucha en esta plaga se encuentra en su etapa más preliminar por no haberse producido daños de importancia en el cultivo a nivel nacional. Sin embargo, la experiencia de otros países productores nos advierte de la necesidad de buscar métodos de control para evitar que esta plaga se convierta en un perjuicio de importancia.</p>
    </div>
</div>

@endsection
