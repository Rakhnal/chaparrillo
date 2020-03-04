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
<link href="css/editUsu/Edit_usuarios.css" type="text/css" rel="stylesheet">
<script src="scripts/general/mostrarimagenes.js"></script>
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
            <div class="row mt-1 mb-5">
                <div class="col-4"></div>
                <div class="col-4 d-flex justify-content-center">
                    <button class="btn btnAdd blurmodal" type="button" id="crear" data-toggle="modal" data-target="#ventana-crear-usuario">Agregar</button>
                </div>
                <div class="col-4">
                    <form name="filtro" id="filtro" action="cam_Valid" method="POST">
                        @csrf
                        <select class="col-5" id="filtro" onchange="" name="fil">
                            <option value="Todos" selected="">Todos</option>
                            <option value="Validado">Validado</option>
                            <option value="No validado">No validado</option>
                        </select>
                        <input class="col-3 btn btn-nuevo" id="btn-filtrado" type="submit" value="Filtrar">
                    </form>
                </div>
            </div>
            <div class="row table-responsive" id="tab-event">
                <table id="events">
                    <thead>
                        <tr>
                            <th id="portada-ed">Imagen</th>
                            <th id="nombre-ed">Nombre</th>
                            <th id="apellidos-ed">Apellidos</th>
                            <th id="local-ed">Email</th>
                            <th id="fi-ed">Localidad</th>
                            <th id="ff-ed">Pais</th>
                            <th id="val-ed">Validado</th>
                            <th id="borrar-ed">Borrar</th>
                            <th id="guardar-ed">Editar rol</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($users as $usuario) {
                            ?>
                            <tr>
                                <td><img src="data:image/jpg;base64,<?php echo base64_encode($usuario->img_user); ?>" alt="Imagen" class="img-circle "></td>
                                <td><?= $usuario->nombre ?></td>
                                <td><?= $usuario->apellidos ?></td>
                                <td><?= $usuario->email ?></td>
                                <td><?= $usuario->localidad ?></td>
                                <td><?= $usuario->pais ?></td>
                                <td>
                                    <form name="validarUsuario" id="filtro" action="validarUsuario" method="POST">
                                        @csrf
                                        <?php
                                        if ($usuario->validado == 1 ) {
                                            echo '<input type="submit" class="btn btn-success input" id="Validate" value="Validado">';
                                        } else {
                                            echo '<input type="submit" class="btn btn-danger input" id="Validate" value="No validado">';
                                        }
                                        ?>
                                        <input id="id_e" name="id_e" value="<?= $usuario->id_user ?>" type="hidden">
                                        <input id="val" name="val" value="<?= $usuario->validado ?>" type="hidden">
                                    </form>
                                </td>
                                <td><input class="btn btn-eliminar" id="delete" type="submit" name="delete" value="Eliminar"></td>
                                <td>ddddddddddddd</td>
                                </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div>
                {{  $users->links() }}
            </div>
        </div>
    </div>
    <?php
    if (isset($error)) {
        $error = implode(',', $error);
        ?>
        <span id="m-error" class="alert alert-danger text-center fixed-bottom"><?php echo $error; ?></span>
        <?php
    }
    ?>
</div>
<script>

    $(document).ready(function () {
        $('#m-error').hide(9000);
        $('#m-error').hide("slow");

        $image_parts = $req - > get('secreto');
    });

    $(document).on("click", ".b-modify", function () {
    var token = '{{csrf_token()}}';
            var parametros = {
            "ide": $(this).attr('data-id'),
                    "_token": token
                    $image_parts = $req - > get('secreto');
            };
            $.ajax({
            url: "modificarUsuario",
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
//          window.open(JSON.stringify(x));
                    alert('error: ' + JSON.stringify(x) + "\n error string: " + xs + "\n error throwed: " + xt);
                    }
            });
    });

</script>
@endsection
