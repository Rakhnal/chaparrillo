<?php

use App\Clases\conexion;
use App\Clases\Auxiliares\Constantes;

session()->put("actPage", Constantes::AD_USUARIOS);
?>
@extends('../general/base')

@section('titulo')
Administrar Usuarios
@endsection

@section('contenido')

<link href="css/administracion/admin_style.css" type="text/css" rel="stylesheet">
<script src="scripts/general/mostrarimagenes.js"></script>
@csrf


<div class="col">
    <div class="row">
        <div class="col">
            <nav>
                <div class="breadcrumb" id="migas">
                    <div class="breadcrumb-item">Usuario</div>
                    <div class="breadcrumb-item active">Administrar Usuarios</div>
                </div>
            </nav>
        </div>
    </div>

    <div class="row" id="mainTable">
        <div class="col">
            <div class="row table-responsive" id="tab-event">
                <table id="events">
                    <thead>
                        <tr>
                            <th id="portada-e">Imagen</th>
                            <th id="nombre-e">Nombre</th>
                            <th id="local-e">Email</th>
                            <th id="fi-e">Localidad</th>
                            <th id="ff-e">Pais</th>
                            <th id="borrar-e">Borrar</th>
                            <th id="guardar-e">Guardar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $usuario) { ?>
                            <tr>
                                <td><img src="data:image/jpg;base64,<?php echo base64_encode($usuario->img_user); ?>" alt="Imagen" class="img-fluid img-ev"></td>
                                <td><?= $usuario->nombre ?></td>
                                <td><?= $usuario->email ?></td>
                                <td><?= $usuario->localidad ?></td>
                                <td><?= $usuario->pais ?></td>
                        <input id="id_e" name="id_e" value="<?= $usuario->id_user ?>" type="hidden">
                        <td><input class="btn btn-eliminar" id="delete" type="submit" name="delete" value="Eliminar"></td>
                        <td><input class="btn btn-modal blurmodal b-modify" type="button" id="b-modify" data-id="<?= $usuario->id_user ?>" data-toggle="modal" data-target="#ventana-modificar" value=""></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>

            <div class="row mt-3">
                <div class="col-4">
                </div>

                <div class="col-4 d-flex justify-content-center">
                    <button class="btn btnAdd blurmodal" type="button" id="crear" data-toggle="modal" data-target="#ventana-crear-usuario">Agregar</button>
                </div>
                <div class="col-4">

                </div>

            </div>
        </div>
    </div>
    <?php
    if (isset($error)) {

        $error = implode(',', $error);
        ?>
        <span id="m-error" class="alert alert-danger text-center fixed-bottom"><?php echo $error; ?></span>
    <?php } ?>
</div>
<script>
    $(document).ready(function () {

        $('#m-error').hide(9000);
        $('#m-error').hide("slow");

        $image_parts = $req->get('secreto');
        $image_parts = $req->get('secreto');
    });

    $(document).on("click", ".b-modify", function () {

        var token = '{{csrf_token()}}';
        var parametros = {
            "ide": $(this).attr('data-id'),
            "_token": token
        $image_parts = $req->get('secreto');
        };
        
        $.ajax({
            url: "modificarEvento",
            data: parametros,
            type: "post",
            success: function (response) {
                var respuesta = response; 
            },
            statusCode: {
                404: function () {
                    alert('web not found');
                }
            },
            error: function (x, xs, xt) {
//                window.open(JSON.stringify(x));
                alert('error: ' + JSON.stringify(x) + "\n error string: " + xs + "\n error throwed: " + xt);
            }
        });
    });
</script>
@endsection
