<?php

use App\Clases\Auxiliares\Constantes;
use App\Clases\conexion;

session()->put("actPage", Constantes::FAQS);
?>
@extends('../general/base')

@section('titulo')
Preguntas frecuentes
@endsection

@section('contenido')

<?php
$user = session()->get("userObj");
?>

<link rel="stylesheet" href="css/informacion/info.css" />
<script type="text/javascript" src="scripts/principal/index.js"></script>

<div class="col">
    <div class="row">
        <div class="col">
            <div class="row justify-content-center">
                <h1>Preguntas Frecuentes</h1>
            </div>
        </div>
    </div>

    <?php
    $faqs = conexion::obtenerFaqs();

    foreach ($faqs as $faq) {
        ?>

        <div class="row faq">
            <div class="col">
                <div class="row justify-content-center">
                    <h3><?= $faq->pregunta ?></h3>
                    <?php
                    if (null != $user && $user->rol == Constantes::ADMIN) {
                        ?>
                        <form action="delFaq" name="delFaqForm" method="POST">
                            {{ csrf_field() }}
                            <input type="number" hidden name="idfaq" value="<?= $faq->idfaq ?>"/>
                            <td><input type="submit" name="delFaq" id="delFaq" class="btn btn-eliminar" value="."/></td>
                        </form>
                        <?php
                    }
                    ?>
                </div>
                <div class="row justify-content-center">
                    <h5><?= $faq->respuesta ?></h5>
                </div>
            </div>
        </div>

        <?php
    }

    if (null != $user && $user->rol == Constantes::ADMIN) {
        ?>
        <button class="btn btn-aniadir blurmodal" id="newFaq" data-toggle="modal" data-target="#modalFaq"></button>
        <?php
    }
    ?>

</div>

@endsection
