<?php

use App\Clases\conexion;
use App\Clases\Auxiliares\Constantes;

session()->put("actPage", Constantes::DOCUMENTACION);
?>

<link rel="stylesheet" type="text/css" href="css/administracion/admin_style.css">
<link rel="stylesheet" type="text/css" href="css/publicaciones/documentacion.css">
<script type="text/javascript" src="scripts/general/modales.js"></script>
<meta name="csrf_token" content="{{ csrf_token() }}">
<!-- Author: Nathan -->

@extends('../general/base')

@section('titulo')
Documentación
@endsection

@section('contenido')

<div class="col">
    <div class="row mt-5 mb-5">
        <div class="col d-flex justify-content-end">
            <form name="filtro" id="filtro" action="mostrarDocsFiltrados" method="POST">
                @csrf
                <select name="selectCategoria" id="selectCategoria" onchange="this.form.submit();">
                    <option value="null" disabled selected>Selecciona una categoría</option>
                    <option value="todas">Todas</option>
                    <?php
                    $cats = conexion::sacarCategorias();

                    foreach ($cats as $cat) {
                        ?>
                        <option value="<?= $cat->id_categoria ?>"><?= $cat->nombre ?></option>
                        <?php
                    }
                    ?>
                </select>
            </form>
        </div>
    </div>
    <div class="row">
        <?php
        $docs = session()->get('mostrar');

        foreach ($docs as $doc) {
            ?>
            <div class="col-xl-4 col-md-12 divDocumento p-0 mb-5">
                <a class="enlaceDocumento blurmodal" data-toggle="modal" data-target="#modalVerDocumento" id="mostrarDocumento" name="mostrarDocumento" data-id="<?= $doc->id_documento ?>">
                    <div class="row">
                        <div class="col text-center docNombre">
                            <?= $doc->nombre ?>
                        </div>
                    </div>
                    <div class="p-5">
                        <div class="row">
                            <div class="col text-center">
                                <span class="docFechaSubida">Subido en <?= $doc->fecha_subida ?></span>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-6 p-0 text-center">
                                <img src="images/icons/calendar.png" class="iconitos">
                                <span class="docAnio"><?= $doc->anio ?></span>
                            </div>
                            <div class="col-6 p-0 text-center">
                                <img src="images/icons/face-id.png" class="iconitos">
                                <span class="docAutores"><?= $doc->autores ?></span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <?php
        }
        ?>
    </div>
    <div class="row mt-3">  
        <div class="col-4">
            {{ $docs->links() }}
        </div>
        <div class="col-4">

        </div>
        <div class="col-4">

        </div>
    </div>
</div>

<script>

    $(document).on("click", "#mostrarDocumento", function () {
        var token = '{{csrf_token()}}';
        var parametros = {
            "identificador": $(this).attr('data-id'),
            "_token": token
        };
        alert(parametros);
        $.ajax({
            url: "buscarDocumento",
            data: parametros,
            type: 'post',
            success: function (response) {
                var respuesta = JSON.parse(response);
                $('#nombreEditarDoc').val(respuesta.nombre);
                $('#descEditarDoc').val(respuesta.descripcion);
                $('#anioEditarDoc').val(respuesta.anio);
                $('#autoresEditarDoc').val(respuesta.autores);
            },
            statusCode: {
                404: function () {
                    swal('Página no encontrada.');
                }
            },
            error: function () {
                swal("Algo ha ido mal :/", {
                    icon: "error"
                });
            }
        });
    });

</script>

@endsection
