<?php

use App\Clases\conexion;
use App\Clases\Auxiliares\Constantes;

session()->put("actPage", Constantes::LUGARTRABAJO);
?>
@extends('../general/base')

@section('titulo')
Lugares de trabajo
@endsection

@section('contenido')

<meta name="csrf_token" content="{{ csrf_token() }}">

<link rel="stylesheet" href="css/informacion/info.css" />
<script type="text/javascript" src="scripts/principal/index.js"></script>
<script src="scripts/general/mapajax.js"></script>





<div class="col">
    <div class="row">
        <div class="col fondo">
            <div class="row h-100 parallax justify-content-center align-items-center" data-parallax="scroll" data-image-src="images/chaparrillo/elegidas/lugaresTrabajo.png">
                <h1 class="bolder">Lugares de trabajo</h1>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col mt-2">
            <div class="row justify-content-center">
                <h1>Aquí podrás ver donde se encuentran nuestros socios</h1>
            </div>

        </div>

    </div>

    <div class="row">
        <div class="col mt-3">
            <div class="row justify-content-center">
<?php
$j = 0;
foreach ($sats as $sat) {

    echo '<div id="mapaLugar' . $j . '" class="mapaLugares"></div>';
    $j++;
}
?>
            </div>

        </div>

    </div>

</div>

<script>
    $(document).ready(function () {

<?php
//dd($sats);
$i = 0;
foreach ($sats as $sat) {
    ?>
            PintarMapa(<?= $sat->latitud ?>,<?= $sat->longitud ?>,<?= $i ?>);
    <?php
    $i++;
}
?>
    });


</script>



@endsection
