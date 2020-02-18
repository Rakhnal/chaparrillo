<?php

use App\Clases\conexion;
use App\Clases\Auxiliares\Constantes;

session()->put("actPage", Constantes::AD_INFORMES);
?>

<link rel="stylesheet" type="text/css" href="css/administracion/admin_style.css">

@extends('../general/base')

@section('titulo')
Administrar Informes
@endsection

@section('contenido')

<div class="col">
    <div class="row">
        <div class="col">
            <nav>
                <div class="breadcrumb" id="migas">
                    <div class="breadcrumb-item">Usuario</div>
                    <div class="breadcrumb-item active">Administrar Informes</div>
                </div>
            </nav>
        </div>
    </div>
    <div class="row" id="mainTable">
        <div class="col">
            <div class="row table-responsive">
                <table id="tablaAdminInformes">
                    <thead>
                        <tr>
                            <th hidden>ID</th>
                            <th>Producto</th>
                            <th>Litro por hectárea</th>
                            <th>Fecha Informe</th>
                            <th>Usuario</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($infs as $inf) {
                            ?>
                            <tr>
                        <form action="actInforme" name="infForm" onsubmit="return confirm('¿Quieres proceder con la acción?')" method="POST">
                            {{ csrf_field() }}
                            <td hidden><input type="number" name="idinforme" value="<?= $inf->id_informe ?>"/></td>
                            <td><input type="text" name="nombre" value="<?= $inf->nombre_producto ?>"/></td>
                            <td><input type="number" name="litrohect" value="<?= $inf->litro_hectarea ?>"/></td>
                            <td><input type="date" name="fechahora" value="<?= $inf->fecha_hora ?>"></td>
                            <td><?= $inf->nombre ?> <?= $inf->apellidos ?></td>
                            <td><input type="submit" name="delInforme" id="delInforme" class="btn btn-eliminar" value="."/></td>
                            <td><input type="submit" name="modInforme" id="modInforme" class="btn btn-guardar" value="."/></td>
                        </form>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>

            <div class="row mt-3">  
                <div class="col-4">
                    {{ $infs->links() }}
                </div>
                <div class="col-4 d-flex justify-content-center">
                    <button class="btn btn-nuevo blurmodal" id="newInforme" data-toggle="modal" data-target="#modalNuevoInforme">Nuevo Informe</button>
                </div>
                <div class="col-4">

                </div>
            </div>
        </div>
    </div>

</div>

@endsection
