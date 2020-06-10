<?php

use App\Clases\conexion;
use App\Clases\Auxiliares\Constantes;

session()->put("actPage", Constantes::VERFORO);
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

        <div class="col-md-12">
            <div class="row justify-content-center mt-3">
                <h2><?php echo $tema->nombre; ?></h2>
            </div>
        </div>

        <div class="col-md-12">
            <div class="row ml-2">
                <h3><?php echo $tema->descripcion; ?></h3>
            </div>
        </div>

        <?php
        session()->put("tema", $tema->id_item);
        
        foreach ($coment as $co) {
            ?>

            <div class="col-xl-12  col-md-12 h-100 coment">
                <div class="row ml-4">

                    <img src="data:image/jpg;base64,<?php echo base64_encode($co->img_user); ?>" alt="Imagen usuario" class="img-fluid img-coment">

                    <div class="user-coment">
                        <span class="ml-2 mr-2 mt-2 bot">Fecha: <?php echo $co->fecha_subida; ?></span>
                        <span class="ml-2 mr-2 bot">Escrito por: <?php echo $co->nombre; ?></span>  
                    </div>

                    <h3 class="ml-1"><?php echo $co->descripcion; ?></h3>
                    
                </div>
            </div>
        <?php } ?>

        <?php if (session()->has("userObj")) { ?>
            <div class="col-xl-12  col-md-12 ">
                <div class="row justify-content-center">
                    <form name="formucomentario" action="comentarTema" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <textarea id="taa-coment" name="comentario" class="comentarForo" required="" placeholder="Escribe un comentario"></textarea>

                        <input type="submit" name="env-coment" class="btn btnAdd mt-2" value="Enviar">
                    </form>
                </div>
            </div>
        <?php } ?>

    </div>


</div>

@endsection
