<?php

use App\Clases\Auxiliares\Constantes;

session()->put("actPage", Constantes::PROYECTO);
?>
@extends('../general/base')

@section('titulo')
Proyecto
@endsection

@section('contenido')

<link rel="stylesheet" href="css/informacion/info.css" />
<script type="text/javascript" src="scripts/principal/index.js"></script>

<div class="col">
    <div class="row">
        <div class="col fondo">
            <div class="row h-100 parallax justify-content-center align-items-center" data-parallax="scroll" data-image-src="images/chaparrillo/elegidas/pistachos01.jpg">
                <h1>Descripción</h1>
            </div>
        </div>
    </div>
    <div class="row format-div">
        <p>El objetivo general del proyecto es poner solución a la actual falta de técnicas y productos fitosanitarios realmente eficaces para el control de las cuatro principales plagas que afectan al pistacho en Castilla La Mancha, dentro del esquema de funcionamiento de la producción ecológica amparado por el actual Reglamento (UE) 2018/848 del Parlamento Europeo y del Consejo, sobre producción ecológica y etiquetado de los productos ecológicos, mediante la ejecución de un proyecto piloto.</p>
    </div>
    <div class="row">
        <div class="col fondo">
            <div class="row h-100 parallax justify-content-center align-items-center" data-parallax="scroll" data-image-src="images/chaparrillo/elegidas/pistachos02.jpg">
                <h1>¿Qué son los proyectos piloto?</h1>
            </div>
        </div>
    </div>
    <div class="row format-div">
        <p>Son proyectos de carácter multidisciplinar en los que se pretende que los actores implicados cooperen y se coordinen para mejorar u obtener técnicas o productos innovadores. Con este enfoque se pretende subsanar la falta actual de transferencia tecnológica por parte del sector investigador, así como la demanda de conocimientos por parte del sector. </p>
        <p>La Unión Europea a través de los fondos FEADER, el Ministerio de Agricultura, Pesca y Alimentación y la Junta de Comunidades de Castilla-La Mancha cofinancian estos proyectos a través de la medida 16 del Programa de Desarrollo Rural de Castilla-La Mancha para el periodo 2014-2020.</p>
    </div>
    <div class="row">
        <div class="col fondo">
            <div class="row h-100 parallax justify-content-center align-items-center" data-parallax="scroll" data-image-src="images/chaparrillo/elegidas/pistachos03.jpg">
                
            </div>
        </div>
    </div>
</div>

@endsection
