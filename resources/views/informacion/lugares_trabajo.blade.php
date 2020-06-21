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
                <h3>Lista de colaboradores</h3>
            </div>

        </div>

    </div>

    <div class="row" id="tablalugar">
        <div class="col">
            <div class="row justify-content-center">
                <table id="colabola">
                    <thead>
                        <tr>
                            <th id="nombre-sat">Nombre</th>
                            <th id="apellidos-sat">Apellidos</th>
                            <th id="localizacion-sat">Localización</th>
                            <th id="buscar"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($sats as $sat) {
                            ?>
                            <tr>

                                <td><?php echo $sat->nombre; ?></td>
                                <td><?php echo $sat->apellidos; ?></td>
                                <td><?php echo $sat->localidad; ?></td>
                        <form action="verSat" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input name="iduser" type="hidden" value="<?= $sat->id_user; ?>">
                            <td><button class="btn btn-modal b-modify" type="submit" id="b-sat"></button></td>
                        </form>

                        </tr>
                    <?php } ?>

                    </tbody>

                </table>
            </div>
        </div>
    </div>

</div>

@endsection
