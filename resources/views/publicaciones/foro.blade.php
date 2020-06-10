<?php

use App\Clases\conexion;
use App\Clases\Auxiliares\Constantes;

session()->put("actPage", Constantes::FORO);
?>
@extends('../general/base')

@section('titulo')
Foro
@endsection

@section('contenido')

<meta name="csrf_token" content="{{ csrf_token() }}">
<link href="css/foro/estiloForo.css" type="text/css" rel="stylesheet">

<div class="col">
    <div class="row format-div-b">

        <div class="col-xl-12  col-md-12 no-padding h-100">
            <div class="row h-100 parallax justify-content-center align-items-center" data-parallax="scroll" data-image-src="images/chaparrillo/elegidas/foro.jpg">
                <div class="col">
                    <div class="row middle-height justify-content-center align-items-end">
                        <h1 class="bolder">Foro</h1>
                    </div>
                    <div class="row middle-height justify-content-center align-items-end">
                        <h5 class="bolder">General</h5>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <?php
    if (session()->has("userObj")) {
        ?>
        <div class="row">
            <div class="col-xl-12 mt-3">
                <div class="row justify-content-end ">
                    <button class="btn btnAdd blurmodal m-1" type="button" id="crear-tema" data-toggle="modal" data-target="#ventanaCrearForo">Crear tema</button>
                </div>

            </div>
        </div>
        <?php
    }
    ?>
    <div class="row" id="tablaForo">
        <div class="col-xl-12">
            <div class="row table-responsive" id="tab-foro">
                <table id="foro">
                    <thead>
                        <tr align="center">
                            <th id="tema">Tema</th>
                            <th id="ultComent">Último comentario</th>
                            <th id="respuesta">Respuestas</th>
                            <th></th>
                        </tr>
                    </thead>
                    <?php
                    foreach ($coment as $co) {
                        ?>
                        <form action="verForo" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <tbody>
                                <tr align="center">

                                    <td align="left"><?= $co->nombre ?></td>
                                    <td><?= $co->fecha_subida ?></td>
                                    <td><?= $co->views ?></td>
                                    <td><button type="submit" name="ver" class="btn btnAdd" value="<?= $co->id_item ?>" >Entrar</button></td>

                                </tr>
                            </tbody>
                        </form>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-4">
            {{ $coment->links() }}
        </div>

        <div class="col-4 d-flex justify-content-center">

        </div>
        <div class="col-4">

        </div>

    </div>

</div>

@endsection
