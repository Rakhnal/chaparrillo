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
            <div class="row h-100 parallax justify-content-center align-items-center" data-parallax="scroll" data-image-src="images/chaparrillo/elegidas/gente01.jpg">
                <h1 class="bolder">Colaboradores</h1>
            </div>
        </div>
    </div>
    <div class="row format-div no-margins-paddings">

        <div class="col">

            <div class="row">
                <div class="col">
                    <div class="row justify-content-center align-items-center image-div">
                        <img src="images/chaparrillo/logos/logochapa.jpg" class="colab-img" alt="Logo Chaparrillo"/>
                    </div>
                    <div class="row justify-content-center">
                        <h3>Centro "El Chaparrillo"</h3>
                    </div>
                    <div class="row format-div-colabs">
                        <p>Adscrito al Instituto Regional de Investigación y Desarrollo Agroalimentario y Forestal de Castilla-La Mancha (IRIAF), tiene como objetivo la investigación, desarrollo e innovación en el área agraria y medio ambiental. Cuenta con más de 35 años de experiencia en la investigación y extensión agraria del cultivo del pistacho, y es referencia nacional e internacional en el cultivo.</p>
                    </div>
                    <div class="row justify-content-center">
                        <a href="https://chaparrillo.castillalamancha.es/" target="_blank">https://chaparrillo.castillalamancha.es/</a>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-xl-6  col-md-12">
                    <div class="row">
                        <div class="col diff-height">
                            <div class="row justify-content-center align-items-center image-div">
                                <img src="images/chaparrillo/logos/logoecovalia.jpg" class="colab-img" alt="Logo SAT Ecovalia"/>
                            </div>
                            <div class="row justify-content-center">
                                <h3>ECOVALIA</h3>
                            </div>
                            <div class="row format-div-colabs">
                                <p>Asociación sin ánimo de lucro que trabaja por y para el desarrollo de la producción y la alimentación ecológicas. Su origen se remonta a 1991. Actualmente figuran como referente a nivel nacional y su proyección internacional está en pleno crecimiento.</p>
                            </div>
                            <div class="row justify-content-center">
                                <a href="https://www.ecovalia.org/" target="_blank">https://www.ecovalia.org/</a>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col diff-height">
                            <div class="row justify-content-center align-items-center image-div">
                                <img src="images/chaparrillo/logos/logoecopistacho.jpg" class="colab-img" alt="Logo SAT Ecopistacho"/>
                            </div>
                            <div class="row justify-content-center">
                                <h3>SAT Ecopistacho</h3>
                            </div>
                            <div class="row format-div-colabs">
                                <p>Ecopistacho, se funda en La Mancha el año 2010, como Sociedad Agraria de Transformación de fruto del pistachero, está formada por cultivadores de este fruto comprometidos en conciencia con un modelo de agricultura no agresiva. La SAT Ecopistacho posee las acreditaciones oficiales que certifican su condición ecológica. El objetivo que persigue este colectivo, es: ofrecer a la sociedad un producto natural de máxima calidad basado en el respeto por el medioambiente.</p>
                            </div>
                            <div class="row justify-content-center">
                                <a href="http://www.ecopistacho.com/" target="_blank">http://www.ecopistacho.com/</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6  col-md-12">
                    <div class="row">
                        <div class="col diff-height">
                            <div class="row justify-content-center align-items-center image-div">
                                <img src="images/chaparrillo/logos/image005.jpg" class="colab-img" alt="Logo SAT El Campo"/>
                            </div>
                            <div class="row justify-content-center">
                                <h3>SAT El campo</h3>
                            </div>
                            <div class="row format-div-colabs">
                                <p>La SAT nº516 del Campo es una sociedad agraria de transformación que se nutre las plantaciones de pistacho y de la experiencia de sus asociados. Actualmente está compuesta por 26 socios cuyas plantaciones suman alrededor de 500 hectáreas de pistacho, ubicadas en distintos municipios de la región. Cabe destacar su decidida apuesta por el pistacho ecológico que supone el 40% de su producción total.</p>
                            </div>
                            <div class="row justify-content-center">
                                <a href="http://www.satdelcampo.es/" target="_blank">http://www.satdelcampo.es/</a>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col diff-height">
                            <div class="row justify-content-center align-items-center image-div">
                                <img src="images/chaparrillo/logos/logopistamancha.png" class="colab-img-rounded" alt="Logo SAT Pistamancha"/>
                            </div>
                            <div class="row justify-content-center">
                                <h3>SAT Pistamancha</h3>
                            </div>
                            <div class="row format-div-colabs">
                                <p>Pistamancha tiene en la actualidad 19 socios con una superficie plantada de pistachos de algo más de 300 Has. Estas plantaciones se encuentran en distintos estados de producción y la mayoría de ellos, en proceso de reconversión a cultivo ecológico. Los socios de Pistamancha reciben de forma gratuita los consejos y el asesoramiento de aquellos socios con plantaciones más antiguas y aprovechan su experiencia evitando errores comunes en la implantación de un nuevo pistachar.</p>
                            </div>
                            <div class="row justify-content-center">
                                <a href="https://www.pistamancha.com/" target="_blank">https://www.pistamancha.com/</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col fondo">
            <div class="row h-100 parallax justify-content-center align-items-center" data-parallax="scroll" data-image-src="images/chaparrillo/elegidas/pistachos01.jpg">
                <h1 class="bolder">Descripción</h1>
            </div>
        </div>
    </div>
    <div class="row format-div">
        <p>El objetivo general del proyecto es poner solución a la actual falta de técnicas y productos fitosanitarios realmente eficaces para el control de las cuatro principales plagas que afectan al pistacho en Castilla La Mancha, dentro del esquema de funcionamiento de la producción ecológica amparado por el actual Reglamento (UE) 2018/848 del Parlamento Europeo y del Consejo, sobre producción ecológica y etiquetado de los productos ecológicos, mediante la ejecución de un proyecto piloto.</p>
    </div>
    <div class="row">
        <div class="col fondo">
            <div class="row h-100 parallax justify-content-center align-items-center" data-parallax="scroll" data-image-src="images/chaparrillo/elegidas/pistachos02.jpg">
                <h1 class="bolder">¿Qué son los proyectos piloto?</h1>
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
