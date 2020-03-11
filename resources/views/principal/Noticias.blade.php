<?php

use App\Clases\conexion;
use App\Clases\Auxiliares\Constantes;

session()->put("actPage", Constantes::AD_NOTICIAS);
$user = session()->get("userObj");
$rol = $user->rol;
?>
@extends('../general/base')
@section('titulo')
Inicio
@endsection
@section('contenido')
<link rel="stylesheet" type="text/css" href="css/editUsu/editarusuario.css" />
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<link href="css/noticias/noticias.css" rel="stylesheet" type="text/css"/>
<div class="mr-1 ml-1 mt-1 row">
    <div class="contenedor">
        <button class="botonF1">
            <span>+</span>
        </button>
    </div>
    <div class="col-8 mt-1 ">
        <?php foreach ($noticias as $noticia) { ?>
            @csrf<?php ?>
            <div class="mt-3 mb-3 form_base noticia_base col-12 pr-0 titulo_noticia">
                <div class="col-8">
                    <div class="row">
                        <div class="col-1">
                            <?php
                            if ($rol > 0) {
                                ?><input class="btn btn-no-destacada" id="destacar" type="submit" name="destacar" value=""><?php
                            }
                            ?>
                        </div>
                        <div class="col-8 text-center"><a><span class="block"><?= $noticia->categoria; ?></span></a></div>
                        <div class="col-3"><a><?= $noticia->fecha_subida; ?></a></div>
                    </div>
                    <div class="mt-2">
                        <h2>
                            <a href=""><?= $noticia->titulo; ?></a>
                        </h2>  
                    </div>
                    <div class="ml-4" id="cuerpo_noticia">
                        <p><?= $noticia->descripcion; ?></p>
                    </div>
                </div>
                <div class="col-4 img_noticia pr-0">
                    <?php if ($noticia->imagen == null || $noticia->imagen == "" || $noticia->imagen == '') {
                        ?><img src="images/profile-pic/default.png" alt="Imagen" class="img_noticia"><?php
                    } else {
                        ?><img src="data:image/jpg;base64,<?php echo base64_encode($noticia->imagen); ?>" alt="Imagen" class="img_noticia">
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
    </div>
    <div class="col-4 mt-1">
        <div class="mt-3 mb-3 row destacadas text-center titulo_noticia"><h1><img src="images/icons/king.png" alt="Imagen" class="icon">   Destacadas</h1></div>
        <?php foreach ($destacadas as $destacada) { ?>
            <div class="mt-3 mb-3 titulo_noticia row destacadas">
                <div class="row">
                    <div class="col-5 ml-2"><a><?= $destacada->fecha_subida; ?></a></div>
                    <div class="col-5"><a><span class="block"><?= $destacada->categoria; ?></span></a></div>
                </div>
                <div>
                    <h4 class="ml-4">
                        <a href=""><?= $destacada->titulo; ?></a>
                    </h4>  
                </div>
            </div>
        <?php } ?>
    </div>
    <div>
        {{  $noticias->links() }}
    </div>
</div>
@endsection
