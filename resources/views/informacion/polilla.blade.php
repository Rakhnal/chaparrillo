<?php

use App\Clases\Auxiliares\Constantes;

session()->put("actPage", Constantes::POLILLA);
?>
@extends('../general/base')

@section('titulo')
Polilla de Almacen
@endsection

@section('contenido')

<link rel="stylesheet" href="css/informacion/info.css" />
<script type="text/javascript" src="scripts/principal/index.js"></script>

<div class="col">
    <div class="row format-div-b">

        <div class="col-xl-6  col-md-12 no-padding">
            <div class="row h-100 parallax justify-content-center align-items-center" data-parallax="scroll" data-image-src="images/chaparrillo/elegidas/plodia.jpg">
                <div class="col">
                    <div class="row middle-height justify-content-center align-items-end">
                        <h1 class="bolder">Polilla de Almacen</h1>
                    </div>

                    <div class="row middle-height justify-content-center align-items-start">
                        <h1><i>Plodia interpunctella</i></h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6  col-md-12">
            <div class="row justify-content-center align-items-center marg-top h20">
                <h2 class="bolder">Descripción</h2>
            </div>
            <div class="row add-padding center h80 format-div-colabs">
                <p>Polilla de la familia Pyralidae con hábitos nocturnos</p>

                <p>Daños en el proceso de almacenaje, cuando deposita los huevos en el hueco que ella misma genera dentro del grano de pistacho, a través de la fisura de su cáscara</p>

                <p>Pueden ser observadas revoloteando alrededor de fuentes de luz y llegan a tener hasta cinco generaciones anuales, con una duración de unos 40-45 días cada una de ellas</p>

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
            <div class="row h-100 parallax justify-content-center align-items-center" data-parallax="scroll" data-image-src="images/chaparrillo/elegidas/plodia2.jpg">
                <h1 class="bolder">Estrategias de lucha</h1>
            </div>
        </div>
    </div>
    <div class="row format-div">
        <p>Las actuales estrategias pasan por el empleo de cámaras de refrigeración. En muchas ocasiones se opta por vender de forma precipitada a los tostaderos para eliminar así el problema, pese a que en la operación se pierda parte de la rentabilidad y del valor añadido que pudiera extraerse del producto.</p>
        <p>Actualmente los productores no ejercen el control en campo de Plodia interpunctella, mediante productos fitosanitarios ecológicos.</p>
    </div>
</div>

@endsection
