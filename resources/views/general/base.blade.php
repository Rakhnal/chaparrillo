<?php

use App\Clases\Auxiliares\Constantes;
use App\Clases\conexion;
?>

<!DOCTYPE html>
<html>
    <head>
        <title> @yield('titulo') </title>

        <link rel="shortcut icon" type="image/jpg" href="images/logo.png" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css" />
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="scripts/general/modales.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/parallax/3.1.0/parallax.min.js"></script>
        <script src="https://cdn.jsdelivr.net/parallax.js/1.4.2/parallax.min.js"></script>
        <script type="text/javascript" src="{{ URL::asset('scripts/general/tilt.jquery.min.js') }}"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />

        <script src="scripts/general/geolocate.js"></script>

        <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
        <script type="text/javascript" src="scripts/general/gmaps.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDwKmL1KMaYg3Hl6ggnEnCVgCCHhtsgvEU&libraries=drawing&callback=initMap"async defer></script>

        <script src="scripts/principal/formValidations.js"></script>

        <link rel="stylesheet" href="css/general.css" />
        <script src="scripts/general/sweetalert.min.js"></script>
    </head>
    <body>

        <?php
        $user = session()->get("userObj");

        if (session()->get("actPage") == Constantes::INDEX) {
            ?>
            <script type="text/javascript" src="{{ URL::asset('scripts/general/headerscrollindex.js') }}"></script>
            <?php
        } else {
            ?>
            <script type="text/javascript" src="{{ URL::asset('scripts/general/headerscroll.js') }}"></script>
            <?php
        }
        ?>

        <!-- ******************************************************************* -->
        <!-- ******************************************************************* -->
        <!-- **************************** MODALES ****************************** -->
        <!-- ******************************************************************* -->
        <!-- ******************************************************************* -->

        <!-- ******************** Ventana Agregar Usuaio *********************** -->
        <div class="modal fade eventos" id="ventana-crear-usuario" data-backdrop="static">
            <div class="modal-dialog modal-xxl modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="modal-title">
                            Registro de Usuario
                        </div>
                        <span data-dismiss="modal"><button class="close clear white-color salir">&times;</button></span>
                    </div>
                    <div class="modal-body">
                        <form action="agregarUsuario" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <label class="form_control col-12">Email:</label>
                                        <input type="email" name="email" class="input read w-100 text_black" value="" id="emailusers">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <label class="form_control col-12">Nombre:</label>
                                        <input type="text" name="nombre" class="w-100 text_black input" value="" id="nombreusers">
                                    </div>
                                    <div class="col-6">
                                        <label class="form_control col-12">Apellidos:</label>
                                        <input type="text" name="apellidos" class=" w-100 text_black input" value="" id="apellusers">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12"><label class="form_control">Localización:</label></div>
                                    <div class="col-6">
                                        <input name="pais" type="text" class="text_black w-100 input" placeholder="Pais" id="paiseusers" value="">
                                    </div>
                                    <div class="col-6">
                                        <input name="localidad" type="text" class="text_black w-100 input" placeholder="Localidad" id="localusers" value="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <label class="form_control">Posición:</label>
                                        <div id="mapaEditUsers" class="mapaEditUsers" style=" height: 200px;"></div>
                                        <div class="row justify-content-center">
                                            <div class="col">
                                                <div class="row justify-content-center align-content-center align-items-center">
                                                    <button class="btn btn-nuevo" type="button" name="btnresetEUsers" id="btnresetEUsers">Reiniciar Marcador</button>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="text" autocomplete="off" id="latitudInputEUsers" name="latitudInputEUsers" value="" hidden/>
                                        <input type="text" autocomplete="off" id="longitudInputEUsers" name="longitudInputEUsers" value="" hidden/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 text-center mb-3">
                                <input type="submit" class="btn btn-success" id="bd_edit_users" value="Aceptar">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- ******************** Ventana Agregar Evento *********************** -->
        <div class="modal fade eventos" id="ventana-crear" data-backdrop="static">
            <div class="modal-dialog modal-xxl modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="modal-title">
                            Registro de Eventos
                        </div>
                        <span data-dismiss="modal"><button class="close clear white-color salir">&times;</button></span>
                    </div>
                    <div class="modal-body">
                        <form action="agregarEvento" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label>Evento:</label>
                                        <input name="nomb" type="text" class="form-control" placeholder="Nombre del evento" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Fecha inicio</label>
                                        <input name="feci" type="date" class="form-control"  required>
                                    </div>
                                    <div class="form-group">
                                        <label>Fecha fin:</label>
                                        <input name="fecf" type="date" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Descripción:</label>
                                        <textarea id="taa-eventA" name="descrip" class="descDocumento" placeholder="Escribe una descripción"></textarea>
                                    </div>
                                </div>

                                <div class="col-4">

                                    <div class="form-group">
                                        <label>Localización:</label>
                                        <input name="loca" type="text" class="form-control" placeholder="Localización" required>
                                    </div>

                                    <div id="map" class="mapa">

                                    </div>

                                    <button class="btn btn-nuevo mt-2" type="button" name="btnreset2" id="btnreset2">Reiniciar Marcador</button>

                                    <input id="latitud" type="hidden" name="latitud" value="">
                                    <input id="longitud" type="hidden" name="longitud" value="">
                                    <script>
                                        $('#latitud').val(localStorage.getItem('latitud'));
                                        $('#longitud').val(localStorage.getItem('longitud'));
                                    </script>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label>Portada de evento:</label>
                                        <input id="imgEvento" name="portada" type="file" accept="image/*" class="form-control-file" required>
                                    </div>
                                    <div id="img-portada">

                                    </div>
                                    <div class="text-center mt-4">
                                        <input type="submit" name="add" class="btn btnAdd" value="Agregar">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!------------- Pantalla modal del login-->
        <div id="login" class="modal fade" role="dialog" data-backdrop = "static">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Iniciar Sesión</h4>
                        <button type="button" class="close salir clear white-color" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form name="logForm" action="login" method="POST">
                            {{ csrf_field() }}
                            <div class="row justify-content-center">
                                <div class="name-form">
                                    <input type="email" autocomplete="off" name="correo" id="correo" value="" required/>
                                    <label for="correo" class = "label-name">
                                        <span class = "content-name">
                                            Correo
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="name-form">
                                    <input type="password" autocomplete="off" name="pass" id="pass" value="" required/>
                                    <label for="pass" class = "label-name">
                                        <span class = "content-name">
                                            Contraseña
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <input type="submit" class="btn-input add-top-margin" value = "Entrar" name = "login"/>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn-input" data-toggle="modal" data-target="#register" data-dismiss="modal" id="btnRegister">Registrarse</button>
                    </div>
                </div>
            </div>
        </div>

        <!------------- Pantalla modal del registro-->
        <div id="register" class="modal fade" role="dialog" data-backdrop = "static">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Registrar Usuario</h4>
                        <button type="button" class="close salir clear" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form name="regForm" onsubmit="return samePasswords()" action="registro" method="POST">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col">
                                    <div class="row justify-content-center">
                                        <div class="name-form">
                                            <input type="email" autocomplete="off" name="correo" id="correo" value="" required/>
                                            <label for="correo" class = "label-name">
                                                <span class = "content-name">
                                                    Correo
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="name-form">
                                            <input type="password" autocomplete="off" name="pass" id="passPpal" value="" required/>
                                            <label for="passPpal" class = "label-name">
                                                <span class = "content-name">
                                                    Contraseña
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="name-form">
                                            <input type="password" autocomplete="off" name="passVal" id="passVal" value="" required/>
                                            <label for="passVal" class = "label-name">
                                                <span class = "content-name">
                                                    Repita la contraseña
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="name-form">
                                            <input type="text" autocomplete="off" name="name" id="name" value="" required/>
                                            <label for="name" class = "label-name">
                                                <span class = "content-name">
                                                    Nombre
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="name-form">
                                            <input type="text" autocomplete="off" name="apellidos" id="apellidos" value="" required/>
                                            <label for="apellidos" class = "label-name">
                                                <span class = "content-name">
                                                    Apellidos
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="name-form">
                                            <input type="text" autocomplete="off" name="localidad" id="localidad" value="" required/>
                                            <label for="localidad" class = "label-name">
                                                <span class = "content-name">
                                                    Localidad
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="name-form">
                                            <input type="text" autocomplete="off" name="pais" id="pais" value="" required/>
                                            <label for="pais" class = "label-name">
                                                <span class = "content-name">
                                                    País
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div id="mapaRegistro">

                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col">
                                            <div class="row justify-content-center align-content-center align-items-center">
                                                <button class="btn btn-nuevo" type="button" name="btnreset" id="btnreset">Reiniciar Marcador</button>
                                            </div>
                                        </div>
                                    </div>

                                    <input type="text" autocomplete="off" name="latitudInput" id="latitudInput" value="" hidden/>

                                    <input type="text" autocomplete="off" name="longitudInput" id="longitudInput" value="" hidden/>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <input type="submit" class="btn-input add-top-margin" value = "Registrarse" name = "regBtn"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!------------- Pantalla modal que muestra que el usuario ya está registrado-->
        <div id="yaexiste" class="modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Información</h4>
                        <button type="button" class="close salir white-color" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">

                        <p>El usuario que intentas registrar ya existe, prueba a iniciar sesión</p>

                    </div>
                </div>
            </div>
        </div>

        <!------------- Pantalla modal que muestra que el usuario tiene datos erroneos-->
        <div id="noexiste" class="modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Error</h4>
                        <button type="button" class="close salir white-color" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">

                        <p>Usuario/Contraseña incorrectos</p>

                    </div>
                </div>
            </div>
        </div>

        <!------------- Pantalla modal que muestra que se ha registrado correctamente -->
        <div id="okregistro" class="modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">¡Bienvenid@!</h4>
                        <button type="button" class="close salir white-color" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">

                        <p>Ha sido registrado correctamente</p>

                    </div>
                </div>
            </div>
        </div>

        <!-- *************** Ventana Modificar Evento ******************** -->
        <div class="modal fade eventos" id="ventana-modificar" data-backdrop="static">
            <div class="modal-dialog modal-xxl modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="modal-title">
                            Modificar Eventos
                        </div>
                        <span data-dismiss="modal"><button class="close clear white-color salir">&times;</button></span>
                    </div>
                    <div class="modal-body">
                        <form action="guardarEvento" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label>Nombre:</label>
                                        <input name="nomb" id="nomb-e" type="text" value="" class="form-control" placeholder="Nombre del evento" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Fecha inicio</label>
                                        <input name="feci" id="feci-e" type="date" value="" class="form-control"  required>
                                    </div>
                                    <div class="form-group">
                                        <label>Fecha fin:</label>
                                        <input name="fecf" id="fecf-e" type="date" value="" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Descripción:</label>
                                        <textarea id="taa-event" class="descDocumento" placeholder="Escribe una descripción"></textarea>
                                    </div>

                                    <div class="respuesta">

                                    </div>

                                </div>

                                <div class="col-4">

                                    <div class="form-group">
                                        <label>Localización:</label>
                                        <input name="loca" id="localM-e" type="text" value="" class="form-control" placeholder="Localización" required>
                                    </div>

                                    <div id="map2" class="mapa">

                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label>Portada de evento:</label>
                                        <input id="imgEvento2" name="portada" type="file" accept="image/*" class="form-control-file" >
                                    </div>
                                    <div id="img-portada2">

                                        <img src="" id="img-eventoP" alt="Portada evento" class="img-fluid">

                                    </div>
                                    <div class="text-center mt-4">
                                        <input type="submit" name="add" class="btn btnAdd" value="Guardar">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Ventana modal para subir documentación -->

        <div class="modal fade" id="modalSubirDocumento" data-backdrop="static">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header align-items-center">
                        <div class="modal-title">
                            Subir documentación
                        </div>
                        <span class="btn salir" data-dismiss="modal"><button class="close clear white-color salir">&times;</button></span>
                    </div>
                    <form name="formSubDoc" class="formDocs m-0" action="subirDocumento" method="POST" enctype="multipart/form-data" accept-charset="UTF-8">
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="text" class="pl-2" id="nombreSubirDoc" name="nombreSubirDoc" placeholder="Nombre del documento" required>
                            </div>
                            <div class="form-group">
                                <textarea class="pl-2 descDocumento" id="descSubirDoc" name="descSubirDoc" placeholder="Descripción de la documentación (opcional)"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="year" class="pl-2" id="anioSubirDoc" name="anioSubirDoc" placeholder="Año de publicación" length="4" pattern="^[0-9]{4}$" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="pl-2" id="autoresSubirDoc" name="autoresSubirDoc" placeholder="Autores del documento" required>
                            </div>
                            <div class="form-group">
                                <div>
                                    <input type="file" class="btn p-0 form-control-file" id="subirAdjuntos" name="subirAdjuntos" accept="file_extension/*" required>
                                </div>
                                <label for="subirAdjuntos">
                                    <span>Adjuntar archivos</span>
                                </label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="text-right">
                                <input type="submit" class="btn validarDocs" id="subirDocumento" name="subirDocumento" value="Subir documentación">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Ventana modal para editar documentación -->

        <div class="modal fade" id="modalEditarDocumento" data-backdrop="static">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header align-items-center">
                        <div class="modal-title">
                            Editar documentación
                        </div>
                        <span class="btn salir" data-dismiss="modal"><button class="close clear white-color salir">&times;</button></span>
                    </div>
                    <form name="formEditDoc" class="formDocs m-0" action="modificarDocumento" method="POST">
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="text" class="pl-2" id="nombreEditarDoc" name="nombreEditarDoc" placeholder="Nombre del documento" required>
                            </div>
                            <div class="form-group">
                                <textarea class="pl-2 descDocumento" name="descEditarDoc" name="descEditarDoc" placeholder="Descripción de la documentación"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="number" class="pl-2" id="anioEditarDoc" name="anioEditarDoc" placeholder="Año de publicación" pattern="[0-9]{4}" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="pl-2" id="autoresEditarDoc" name="autoresEditarDoc" placeholder="Autores del documento" required>
                            </div>
                            <div class="form-group form-inline">
                                <div>
                                    <input class="btn p-0" id="editarAdjuntos" name="editarAdjuntos" type="file">
                                </div>
                                <label for="editarAdjuntos">
                                    <span>Adjuntar archivos</span>
                                </label>
                                <div class="ml-5">
                                    <select class="pl-2" id="selectVisible" name="selectVisible">
                                        <option value="0">No visible</option>
                                        <option value="1">Visible</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="text-right">
                                <input type="submit" class="btn validarDocs" id="editarDocumento" name="editarDocumento" value="Guardar cambios">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- ******************** Ventana Administración Plagas *********************** -->
        <div class="modal fade" id="modalPlagas" data-backdrop="static">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="modal-title">
                            Administración de plagas
                        </div>
                        <span data-dismiss="modal"><button class="close clear white-color salir">&times;</button></span>
                    </div>
                    <div class="modal-body">

                        <div class="row table-responsive">
                            <table id="tablaAdminPlagas">
                                <thead>
                                    <tr>
                                        <th hidden>ID</th>
                                        <th>Nombre</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $plagas = conexion::sacarPlagas();

                                    foreach ($plagas as $plaga) {
                                        ?>
                                        <tr>
                                    <form action="actPlaga" name="infForm" onsubmit="return confirm('¿Quieres proceder con la acción?')" method="POST">
                                        {{ csrf_field() }}
                                        <td hidden><input type="number" name="idplaga"value="<?= $plaga->id_plaga ?>"/></td>
                                        <td><input type="text" name="nomPlaga" class="cajaNormal" value="<?= $plaga->nombre_plaga ?>"/></td>
                                        <td><input type="submit" name="delPlaga" id="delPlaga" class="btn btn-eliminar" value="."/></td>
                                        <td><input type="submit" name="modPlaga" id="modPlaga" class="btn btn-guardar" value="."/></td>
                                    </form>
                                    </tr>
                                    <?php
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Ventana modal para mostrar el informe -->

        <div class="modal fade" id="modalInforme" data-backdrop="static">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header align-items-center">
                        <div class="modal-title">
                            Nuevo Informe
                        </div>
                        <span class="btn salir" data-dismiss="modal"><button class="close clear white-color salir">&times;</button></span>
                    </div>
                    <form name="formNewInforme" action="newInforme" method="POST">
                        {{ csrf_field() }}
                        <input type="number" hidden id="idInforme">

                        <div class="modal-body">
                            <div class="row justify-content-center">
                                <div class="col">
                                    <div class="row justify-content-center">
                                        <p>Nombre del producto:</p>
                                    </div>
                                    <div class="row justify-content-center">
                                        <input type="text" class="cajaNormal" autocomplete="off" id="productName" name="productName" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="row justify-content-center">
                                        <p>Plaga a tratar:</p>
                                    </div>
                                    <div class="row justify-content-center">
                                        <select id="plagaTratar" name="plagaTratar">
                                            <?php
                                            $plagas = conexion::sacarPlagas();

                                            foreach ($plagas as $plaga) {
                                                ?>
                                                <option value="<?= $plaga->id_plaga ?>"><?= $plaga->nombre_plaga ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row justify-content-center">
                                <div class="col">
                                    <div class="row justify-content-center">
                                        <p>Polígono:</p>
                                        <input type="text" class="cajaNormal" autocomplete="off" id="polInput" name="polInput" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="row justify-content-center">
                                        <p>Parcela:</p>
                                        <input type="text" class="cajaNormal" autocomplete="off" id="parInput" name="parInput" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="row justify-content-center">
                                        <p>Municipio:</p>
                                        <input type="text" class="cajaNormal" autocomplete="off" id="munInput" name="munInput" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row justify-content-center">
                                <div class="col">
                                    <div class="row justify-content-center">
                                        <p>Litros por hectárea:</p>
                                        <input type="number" class="cajaNormal" autocomplete="off" id="litroHectarea" name="litroHectarea" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="row justify-content-center">
                                        <p>Fecha Informe:</p>
                                        <input type="date" class="cajaNormal" autocomplete="off" id="fechaInforme" name="fechaInforme" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row justify-content-center">
                                <div class="col">
                                    <div class="row justify-content-center">
                                        <p>Daño aproximado (%):</p>
                                        <input type="number" class="cajaNormal" max="100" min="1" id="danioAprox" name="danioAprox" required>
                                    </div>
                                    <?php
                                    if ($user != null) {
                                        if ($user->rol == Constantes::ADMIN) {

                                            $usuarios = conexion::obtenerUsuariosEspeciales();
                                            ?>
                                            <div class="row justify-content-center">
                                                <p>Usuario Informe:</p>

                                                <select name="userProp" id="userProp">
                                                    <option value="" selected></option>

                                                    <?php
                                                    foreach ($usuarios as $usuario) {
                                                        ?>
                                                        <option value="<?= $usuario->id_user ?>"><?= $usuario->nombre ?> <?= $usuario->apellidos ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>

                                            </div>
                                            <?php
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="col">
                                    <div class="row justify-content-center">
                                        <p>Comentario:</p>
                                        <textarea class="textAreaInf" id="coment" name="coment" required></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row justify-content-center">
                                <input type="submit" class="btn btn-guardar margin-top" id="btnNewInforme" name="btnNewInforme" value="">
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        <!-- Ventana modal para añadir un nuevo informe -->

        <div class="modal fade" id="modalNuevoInforme" data-backdrop="static">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header align-items-center">
                        <div class="modal-title">
                            Nuevo Informe
                        </div>
                        <span class="btn salir" data-dismiss="modal"><button class="close clear white-color salir">&times;</button></span>
                    </div>
                    <form name="formNewInforme" action="newInforme" method="POST">
                        {{ csrf_field() }}
                        <input type="number" hidden id="idInforme">

                        <div class="modal-body">
                            <div class="row justify-content-center">
                                <div class="col">
                                    <div class="row justify-content-center">
                                        <p>Nombre del producto:</p>
                                    </div>
                                    <div class="row justify-content-center">
                                        <input type="text" class="cajaNormal" autocomplete="off" id="productName" name="productName" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="row justify-content-center">
                                        <p>Plaga a tratar:</p>
                                    </div>
                                    <div class="row justify-content-center">
                                        <select id="plagaTratar" name="plagaTratar">
                                            <?php
                                            $plagasTWO = conexion::sacarPlagas();

                                            foreach ($plagasTWO as $plaga) {
                                                ?>
                                                <option value="<?= $plaga->id_plaga ?>"><?= $plaga->nombre_plaga ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row justify-content-center">
                                <div class="col">
                                    <div class="row justify-content-center">
                                        <p>Polígono:</p>
                                        <input type="text" class="cajaNormal" autocomplete="off" id="polInput" name="polInput" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="row justify-content-center">
                                        <p>Parcela:</p>
                                        <input type="text" class="cajaNormal" autocomplete="off" id="parInput" name="parInput" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="row justify-content-center">
                                        <p>Municipio:</p>
                                        <input type="text" class="cajaNormal" autocomplete="off" id="munInput" name="munInput" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row justify-content-center">
                                <div class="col">
                                    <div class="row justify-content-center">
                                        <p>Litros por hectárea:</p>
                                        <input type="number" class="cajaNormal" autocomplete="off" id="litroHectarea" name="litroHectarea" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="row justify-content-center">
                                        <p>Fecha Informe:</p>
                                        <input type="date" class="cajaNormal" autocomplete="off" id="fechaInforme" name="fechaInforme" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row justify-content-center">
                                <div class="col">
                                    <div class="row justify-content-center">
                                        <p>Daño aproximado (%):</p>
                                        <input type="number" class="cajaNormal" max="100" min="1" id="danioAprox" name="danioAprox" required>
                                    </div>
                                    <?php
                                    if ($user != null) {
                                        if ($user->rol == Constantes::ADMIN) {

                                            $usuarios = conexion::obtenerUsuariosEspeciales();
                                            ?>
                                            <div class="row justify-content-center">
                                                <p>Usuario Informe:</p>

                                                <select name="userProp">
                                                    <option value="" selected></option>

                                                    <?php
                                                    foreach ($usuarios as $usuario) {
                                                        ?>
                                                        <option value="<?= $usuario->id_user ?>"><?= $usuario->nombre ?> <?= $usuario->apellidos ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>

                                            </div>
                                            <?php
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="col">
                                    <div class="row justify-content-center">
                                        <p>Comentario:</p>
                                        <textarea class="textAreaInf" id="coment" name="coment" required></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row justify-content-center">
                                <input type="submit" class="btn btn-guardar margin-top" id="btnNewInforme" name="btnNewInforme" value="">
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        <!-- Ventana modal para mostrar información de la página -->

        <div class="modal fade" id="quienessomos" data-backdrop="static">
            <div class="modal-dialog modal-xxl modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header align-items-center">
                        <div class="modal-title">
                            Quienes somos
                        </div>
                        <span class="btn salir" data-dismiss="modal"><button class="close clear white-color salir">&times;</button></span>
                    </div>
                    <div class="modal-body add-padding">
                        <div class="row justify-content-center">
                            <div class="col">
                                <div class="row justify-content-center">
                                    <h3>Centro "El Chaparrillo"</h3>
                                </div>
                                <div class="row justify-content-center">
                                    <p class="thinner">Adscrito al Instituto Regional de Investigación y Desarrollo Agroalimentario y Forestal de Castilla-La Mancha (IRIAF), tiene como objetivo la investigación, desarrollo e innovación en el área agraria y medio ambiental. Cuenta con más de 35 años de experiencia en la investigación y extensión agraria del cultivo del pistacho, y es referencia nacional e internacional en el cultivo.</p>
                                </div>
                                <div class="row justify-content-center">
                                    <a href="https://chaparrillo.castillalamancha.es/" target="_blank">chaparrillo.castillalamancha.es</a>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col margin-right">
                                <div class="row justify-content-center">
                                    <h3>ECOVALIA</h3>
                                </div>
                                <div class="row justify-content-center">
                                    <p class="thinner">Asociación sin ánimo de lucro que trabaja por y para el desarrollo de la producción y la alimentación ecológicas. Su origen se remonta a 1991. Actualmente figuran como referente a nivel nacional y su proyección internacional está en pleno crecimiento.</p>
                                </div>
                                <div class="row justify-content-center">
                                    <a href="https://www.ecovalia.org/" target="_blank">www.ecovalia.org</a>
                                </div>
                            </div>
                            <div class="col">
                                <div class="row justify-content-center">
                                    <h3>SAT Ecopistacho</h3>
                                </div>
                                <div class="row justify-content-center">
                                    <p class="thinner">Ecopistacho, se funda en La Mancha el año 2010, como Sociedad Agraria de Transformación de fruto del pistachero, está formada por cultivadores de este fruto comprometidos en conciencia con un modelo de agricultura no agresiva. La SAT Ecopistacho posee las acreditaciones oficiales que certifican su condición ecológica. El objetivo que persigue este colectivo, es: ofrecer a la sociedad un producto natural de máxima calidad basado en el respeto por el medioambiente.</p>
                                </div>
                                <div class="row justify-content-center">
                                    <a href="http://www.ecopistacho.com/" target="_blank">www.ecopistacho.com</a>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col margin-right">
                                <div class="row justify-content-center">
                                    <h3>SAT El campo</h3>
                                </div>
                                <div class="row justify-content-center">
                                    <p class="thinner">La SAT nº516 del Campo es una sociedad agraria de transformación que se nutre las plantaciones de pistacho y de la experiencia de sus asociados. Actualmente está compuesta por 26 socios cuyas plantaciones suman alrededor de 500 hectáreas de pistacho, ubicadas en distintos municipios de la región. Cabe destacar su decidida apuesta por el pistacho ecológico que supone el 40% de su producción total.</p>
                                </div>
                                <div class="row justify-content-center">
                                    <a href="http://www.satdelcampo.es/" target="_blank">www.satdelcampo.es</a>
                                </div>
                            </div>
                            <div class="col">
                                <div class="row justify-content-center">
                                    <h3>SAT Pistamancha</h3>
                                </div>
                                <div class="row justify-content-center">
                                    <p class="thinner">Pistamancha tiene en la actualidad 19 socios con una superficie plantada de pistachos de algo más de 300 Has. Estas plantaciones se encuentran en distintos estados de producción y la mayoría de ellos, en proceso de reconversión a cultivo ecológico. Los socios de Pistamancha reciben de forma gratuita los consejos y el asesoramiento de aquellos socios con plantaciones más antiguas y aprovechan su experiencia evitando errores comunes en la implantación de un nuevo pistachar.</p>
                                </div>
                                <div class="row justify-content-center">
                                    <a href="https://www.pistamancha.com/" target="_blank">www.pistamancha.com</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ******************************************************************* -->
        <!-- ******************************************************************* -->
        <!-- ******************************************************************* -->
        <!-- ******************************************************************* -->

        <div class="loader-wrapper">
            <span class="loader"><span class="loader-inner"></span></span>
        </div>

        <script>
            $(window).on("load", function () {
                $(".loader-wrapper").fadeOut("slow");
                $("body").css("overflow", "visible");
            });
        </script>

        <div id="blur" class="container-fluid">

            <div class = "row" id = "header">

                <nav class="navbar navbar-expand-lg" id="navHeader">
                    <?php
                    // En el index el logo estará posicionado por defecto en otro sitio
                    if (session()->get("actPage") == Constantes::INDEX) {
                        ?>
                        <a class="navbar-brand" href="index"><img src="images/logo.svg" class="imgLogo hidden" id="imgLogo" alt="Logo principal"/></a>
                        <?php
                    } else {
                        ?>
                        <a class="navbar-brand" href="index"><img src="images/logo.svg" class="imgLogo" id="imgLogo" alt="Logo principal"/></a>
                        <?php
                    }
                    ?>

                    <button class="navbar-toggler second-button" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"><div class="animated-icon2"><span></span><span></span><span></span><span></span></div></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">                        
                        <ul class="nav navbar-nav ml-auto">

                            <form class="row form-inline my-2 my-lg-0 justify-content-center">
                                <input class="form-control mr-sm-2" type="search" placeholder="Buscar en la página" aria-label="Search">
                                <button class="btn btn-outline-success my-2 my-sm-0 margin-right" type="submit" id="searchButton"></button>
                            </form>

                            <li class="nav-item">
                                <a class="nav-link menu-text" href="index">Inicio</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link menu-text" href="proyecto">Proyecto</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link menu-text" href="cultivos">Cultivo en CLM</a>
                            </li>

                            <div class="dropdown-container">
                                <a class="nav-link menu-text" href="#" id="ddListar" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Plagas del Proyecto
                                </a>
                                <div class="dropdown-menu" aria-labelledby="ddListar">
                                    <a class="dropdown-item menu-text" href="clitra">Clitra</a>
                                    <a class="dropdown-item menu-text" href="polilla">Polilla de Almacén</a>
                                    <a class="dropdown-item menu-text" href="psilas">Psilas del Pistacho</a>
                                    <a class="dropdown-item menu-text" href="chinches">Chinches</a>
                                </div>
                            </div>
                            <li class="nav-item">
                                <a class="nav-link menu-text" href="lugares">Lugares de Trabajo</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link menu-text" href="noticias">Noticias</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link menu-text" href="foro">Foro</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link menu-text" href="documentacion">Documentación</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link menu-text" href="agenda">Agenda</a>
                            </li>

                            <?php
                            if ($user == null) {
                                ?>
                                <li class="nav-item">
                                    <button type="button" class="blurmodal" data-toggle="modal" data-target="#login" id="btnUser"></button>
                                </li>
                                <?php
                            } else {
                                ?>
                                <li class="nav-item">
                                    <div class="dropdown-container">
                                        <a class="nav-link" href="#" id="ddPerfil" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <?php
                                            if ($user->img_user != null) {
                                                ?>
                                                <img src="data:image/jpeg;base64,<?php echo base64_encode($user->img_user); ?>" alt="Imagen de perfil" id="imgUser"/>
                                                <?php
                                            } else {
                                                ?>
                                                <img src="images/profile-pic/default.png" alt="Imagen por defecto" id="imgUser"/>
                                                <?php
                                            }
                                            ?>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="ddPerfil">

                                            <a class="dropdown-item menu-text" href="Editar_usuario">Perfil</a>
                                            <?php
                                            if ($user->rol == Constantes::ADMIN) {
                                                ?>
                                                <a class="dropdown-item menu-text" href="admin_usuarios">Administrar Usuarios</a>
                                                <a class="dropdown-item menu-text" href="adminDocument">Administrar Documentación</a>
                                                <a class="dropdown-item menu-text" href="admin_event">Administrar Eventos</a>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if ($user->rol == Constantes::ADMIN || $user->rol == Constantes::SWATS) {
                                                ?>
                                                <a class="dropdown-item menu-text" href="adminInformes">Administrar Informes</a>
                                                <?php
                                            }
                                            ?>
                                            <!--a class="dropdown-item menu-text" href="#">Mensajes</a-->
                                            <a class="dropdown-item menu-text" href="logout">Cerrar Sesión</a>
                                        </div>
                                    </div>
                                </li>
                                <?php
                            }
                            ?>
                        </ul>
                    </div>
                </nav>
            </div>

            <div class = "row" id = "main">
                @yield('contenido')
            </div>

            <?php
            // Agregar aquí las páginas donde no se quiera mostrar el footer
            if (session()->get("actPage") != Constantes::AD_EVENTOS && session()->get("actPage") != Constantes::AD_DOCUMENTOS && session()->get("actPage") != Constantes::ED_USUARIO && session()->get("actPage") != Constantes::AD_INFORMES) {
                ?>

                <div class="row footer font-small blue pt-4">

                    <div class="col">                        
                        <div class="row justify-content-center">
                            <div class="col">
                                <div class="row justify-content-end">
                                    <img src="images/footer/logojccm.png" id="logojccm" alt="Logo de la JCCM" />
                                </div>
                            </div>

                            <div class="col">
                                <div class="row justify-content-start">
                                    <img src="images/footer/logochapa.jpg" align-middle id="logochapa" alt="Logo Chaparrillo" />
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <img src="images/footer/logouemapa.png" id="logouemapa" alt="Logo de la UE y del MAPA" />
                        </div>
                    </div>

                    <div class="col">

                        <div class="row justify-content-center">
                            <div class="col">
                                <div class="row justify-content-center">
                                    <a href="http://pistacho.chil.org/" target="_blank">
                                        <img src="images/footer/logochil.png" id="logochil" alt="Logo Chil.Me"/>
                                    </a>
                                </div>
                            </div>

                            <div class="col">
                                <div class="row justify-content-center">
                                    <a href="https://www.facebook.com/Centro-Agrario-El-Chaparrillo-289847297876695/?ref=br_rs" target="_blank">
                                        <img src="images/footer/logoface.svg" id="logoface" alt="Facebook del Chaparrillo"/>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center almost-full-height">
                            <div class="col">
                                <div class="row justify-content-center align-content-center align-items-center full-height">
                                    <a href="https://www.facebook.com/Centro-Agrario-El-Chaparrillo-289847297876695/?ref=br_rs" target="_blank">
                                        <h5>FAQs</h5>
                                    </a>
                                </div>
                            </div>

                            <div class="col">
                                <div class="row justify-content-center align-content-center align-items-center full-height">
                                    <a href="" class="blurmodal" data-toggle="modal" data-target="#quienessomos">
                                        <h5>Quienes Somos</h5>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                <?php
            }

            if (isset($yaexiste)) {
                ?>
                <script>$('#yaexiste').modal('show');</script>
                <?php
            }

            if (isset($noexiste)) {
                ?>
                <script>$('#noexiste').modal('show');</script>
                <?php
            }

            if (isset($okregistro)) {
                ?>
                <script>$('#okregistro').modal('show');</script>
                <?php
            }
            ?>
        </div>
    </body>
</html>
