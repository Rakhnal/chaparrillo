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
        <div class="col-md-6 fondo">
            <div class="row h-100 parallax justify-content-center align-items-center" data-parallax="scroll" data-image-src="images/chaparrillo/elegidas/clitrar.jpg">
                <div class="col">
                    <div class="row middle-height justify-content-center align-items-end">
                        <h1 class="bolder">Citra</h1>
                    </div>

                    <div class="row middle-height justify-content-center align-items-start">
                        <h1>Labidostomis lusitanica</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <p>El objetivo general del proyecto es poner solución a la actual falta de técnicas y productos fitosanitarios realmente eficaces para el control de las cuatro principales plagas que afectan al pistacho en Castilla La Mancha, dentro del esquema de funcionamiento de la producción ecológica amparado por el actual Reglamento (UE) 2018/848 del Parlamento Europeo y del Consejo, sobre producción ecológica y etiquetado de los productos ecológicos, mediante la ejecución de un proyecto piloto.</p>
        </div>
    </div>
    <div class="row format-div">
        <p>El objetivo general del proyecto es poner solución a la actual falta de técnicas y productos fitosanitarios realmente eficaces para el control de las cuatro principales plagas que afectan al pistacho en Castilla La Mancha, dentro del esquema de funcionamiento de la producción ecológica amparado por el actual Reglamento (UE) 2018/848 del Parlamento Europeo y del Consejo, sobre producción ecológica y etiquetado de los productos ecológicos, mediante la ejecución de un proyecto piloto.</p>
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
