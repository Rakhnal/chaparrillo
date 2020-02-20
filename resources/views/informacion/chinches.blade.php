<?php

use App\Clases\Auxiliares\Constantes;

session()->put("actPage", Constantes::CHINCHES);
?>
@extends('../general/base')

@section('titulo')
Chinches
@endsection

@section('contenido')

<link rel="stylesheet" href="css/informacion/info.css" />
<script type="text/javascript" src="scripts/principal/index.js"></script>

<div class="col">
    <div class="row format-div-b">
        
        <div class="col">
            <div class="row justify-content-center align-items-center marg-top h20">
                <h2 class="bolder">Descripción</h2>
            </div>
            <div class="row add-padding center h80">
                <p>Encuadra a varios géneros y familias del Orden Hemíptera</p>

                <p>Suelen ser un problema desde la floración (finales de marzo y primera quincena de abril) hasta el endurecimiento de la cáscara (segunda quincena de mayo)</p>

                <p>Producen daños en el epicarpio (lesión del epicarpio), cuando introducen su estilete en esa parte exterior del fruto para alimentarse de su savia</p>
                
                <p>El resultado es un ennegrecimiento posterior de los frutos, el tejido dañado se vuelve marrón, el fruto se arruga, se necrosa y, finalmente, se cae. En el interior aparece una pequeña mancha negra de forma irregular que señala por dónde el insecto ha introducido su aparato bucal chupador</p>
            </div>
        </div>
        
        <div class="col-md-6 no-padding">
            <div class="row h-100 parallax justify-content-center align-items-center" data-parallax="scroll" data-image-src="images/chaparrillo/elegidas/chinche.jpg">
                <div class="col">
                    <div class="row middle-height justify-content-center align-items-end">
                        <h1 class="bolder">Chinches</h1>
                    </div>

                    <div class="row middle-height justify-content-center align-items-start">
                        <h1>Hemíptera: Heteróptera</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row format-div-lessp">
        <div class="col">
            <div class="row">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col fondo-s">
            <div class="row h-100 parallax justify-content-center align-items-center" data-parallax="scroll" data-image-src="images/chaparrillo/elegidas/chinche2.jpg">
                <h1 class="bolder">Estrategias de lucha</h1>
            </div>
        </div>
    </div>
    <div class="row format-div">
        <p>El desarrollo de métodos de lucha en esta plaga se encuentra en su etapa más preliminar por no haberse producido daños de importancia en el cultivo a nivel nacional. No obstante, las chinches, en determinados años, son una de las principales plagas que afectan al pistacho, en concreto a su fruto, al que afectan tanto que le hacen inservible para el comercio, siendo por tanto una plaga de relativa importancia económica ante la que surge la necesidad de búsqueda de soluciones.</p>
    </div>
</div>

@endsection
