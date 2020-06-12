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

        <div class="col-md-12">
            <div class="row justify-content-center">
                <table id="coment" class="table-responsive">
                    <thead>
                        <tr>
                            <th id="img-user">Imagen</th>
                            <th id="nombre-user">Creado</th>
                            <th id="coment">Comentario</th>
                            <th id="borrar"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        session()->put("tema", $tema->id_item);

                        foreach ($coment as $co) {
                            ?>
                            <tr>
                                <td><img src="data:image/jpg;base64,<?php echo base64_encode($co->img_user); ?>" alt="Imagen usuario" class="img-fluid img-coment"></td>
                                <td style="display: grid;"><span class="ml-2 mr-2 mt-2 bot">Fecha: <?php echo $co->fecha_subida; ?></span><span class="ml-2 mr-2 bot">Escrito por: <?php echo $co->nombre; ?></span> </td>
                                <td><?php echo $co->descripcion; ?></td>
                        <input type="hidden" name="id_publi" value="<?= $co->id_item ?>">
                        <?php
                        if (session()->has('userObj')) {
                            $user = session()->get('userObj');
                            ?>
                        <td><?php if ($user->id_user == $co->id_user) { ?>
                            
                            <form name="borrarComentario" action="borrarComentarioTema" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }} 
                                <input name="id_itemb" type="hidden" value="<?=$co->id_item; ?>">
                                <input type="submit" name="borrar-coment" class="btn btnAdd mt-2" value="Borrar">
                            </form>
                        </td>
                                <?php } ?>
                            </tr>
                        <?php }
                    } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <?php if (session()->has("userObj")) { ?>
                        <form name="formucomentario" action="comentarTema" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <td colspan="3"><textarea id="taa-coment" name="comentario" class="comentarForo" required="" placeholder="Escribe un comentario"></textarea></td>
                            <td><input type="submit" name="env-coment" class="btn btnAdd mt-2" value="Enviar"></td>
                        </form>
                        <?php } ?>
                        </tr>
                        </tfoot>
                </table>
            </div>
        </div>
    </div>


</div>

@endsection
