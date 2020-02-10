<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<!-- *************** Ventana Agregar Evento ******************** -->
<div class="modal fade eventos" id="ventana-crear" data-backdrop="static">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title">
                    Registro de Eventos
                </div>
                <span data-dismiss="modal"><button class="close clear white-color salir">&times;</button></span>
            </div>
            <div class="modal-body">
                <form action="agregarEvento" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="cwBsSF1xj4KmGiTL8AkIKYHmiiIhD8GMNbliQgDx">
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label>Nombre:</label>
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
                                <textarea id="taa-event" rows="5" cols="20" placeholder="Escribe una descripción"></textarea>
                            </div>

                        </div>

                        <div class="col-4">

                            <div class="form-group">
                                <label>Localización:</label>
                                <input name="loca" type="text" class="form-control" placeholder="Localización" required>
                            </div>

                            <div id="map" class="mapa">

                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label>Portada de evento:</label>
                                <input id="imgEvento" name="portada" type="file" accept="image/*" class="form-control-file" required>
                            </div>
                            <div id="img-portada">

                            </div>
                            <div class="text-center mt-4">
                                <input type="submit" name="add" class="btn btn-primary" value="Agregar">
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
                    <input type="hidden" name="_token" value="bZZElfKz0EwY6czibB7HfVV95MIJkzTA4yU2Qoyf">
                    <div class="row justify-content-center">
                        <div class="name-form">
                            <input type="email" name="correo" id="correo" value="" required/>
                            <label for="correo" class = "label-name">
                                <span class = "content-name">
                                    Correo
                                </span>
                            </label>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="name-form">
                            <input type="password" name="pass" id="pass" value="" required/>
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
                    <input type="hidden" name="_token" value="bZZElfKz0EwY6czibB7HfVV95MIJkzTA4yU2Qoyf">
                    <div class="row">
                        <div class="col">
                            <div class="row justify-content-center">
                                <div class="name-form">
                                    <input type="email" name="correo" id="correo" value="" required/>
                                    <label for="correo" class = "label-name">
                                        <span class = "content-name">
                                            Correo
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="name-form">
                                    <input type="password" name="pass" id="passPpal" value="" required/>
                                    <label for="passPpal" class = "label-name">
                                        <span class = "content-name">
                                            Contraseña
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="name-form">
                                    <input type="password" name="passVal" id="passVal" value="" required/>
                                    <label for="passVal" class = "label-name">
                                        <span class = "content-name">
                                            Repita la contraseña
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="name-form">
                                    <input type="text" name="name" id="name" value="" required/>
                                    <label for="name" class = "label-name">
                                        <span class = "content-name">
                                            Nombre
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="name-form">
                                    <input type="text" name="apellidos" id="apellidos" value="" required/>
                                    <label for="apellidos" class = "label-name">
                                        <span class = "content-name">
                                            Apellidos
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="name-form">
                                    <input type="text" name="localidad" id="localidad" value="" required/>
                                    <label for="localidad" class = "label-name">
                                        <span class = "content-name">
                                            Localidad
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="name-form">
                                    <input type="text" name="pais" id="pais" value="" required/>
                                    <label for="pais" class = "label-name">
                                        <span class = "content-name">
                                            País
                                        </span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row justify-content-center">
                                <div class="name-form">
                                    <input type="text" name="cp" id="cp" value="" required/>
                                    <label for="cp" class = "label-name">
                                        <span class = "content-name">
                                            Código Postal
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div id="mapaRegistro">

                            </div>
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
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title">
                    Modificar Eventos
                </div>
                <span data-dismiss="modal"><button class="close clear white-color salir">&times;</button></span>
            </div>
            <div class="modal-body">
                 <form action="modificarEvento" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="cwBsSF1xj4KmGiTL8AkIKYHmiiIhD8GMNbliQgDx">
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label>Nombre:</label>
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
                                <textarea id="taa-event" rows="5" cols="20" placeholder="Escribe una descripción"></textarea>
                            </div>

                        </div>

                        <div class="col-4">

                            <div class="form-group">
                                <label>Localización:</label>
                                <input name="loca" type="text" class="form-control" placeholder="Localización" required>
                            </div>

                            <div id="map2" class="mapa">

                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label>Portada de evento:</label>
                                <input id="imgEvento2" name="portada" type="file" accept="image/*" class="form-control-file" required>
                            </div>
                            <div id="img-portada2">

                            </div>
                            <div class="text-center mt-4">
                                <input type="submit" name="add" class="btn btn-primary" value="Guardar">
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
            <form name="formSubDoc" class="formDocs m-0" action="" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="pl-2" id="nombreDocumento" name="nombreDocumento" placeholder="Nombre del documento" required>
                    </div>
                    <div class="form-group">
                        <textarea class="pl-2 descDocumento" name="descDocumento" placeholder="Descripción de la documentación"></textarea>
                    </div>
                    <div class="form-group">
                        <input class="btn p-0" id="subirAdjuntos" name="subirAdjuntos" type="file">
                    </div>
                    <label for="subirAdjuntos">
                        <span>Adjuntar archivos</span>
                    </label>
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
            <form name="formEditDoc" class="formDocs m-0" action="" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="pl-2" id="nombreDocumento2" name="nombreDocumento2" placeholder="Nombre del documento" required>
                    </div>
                    <div class="form-group">
                        <textarea class="pl-2 descDocumento" name="descDocumento2" placeholder="Descripción de la documentación"></textarea>
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


<?php
if (isset($_GET['yaexiste'])) {
    ?>
    <script>$('#yaexiste').modal('show');</script>
    <?php
}

if (isset($_GET['noexiste'])) {
    ?>
    <script>$('#noexiste').modal('show');</script>
    <?php
}

if (isset($_GET['okregistro'])) {
    ?>
    <script>$('#okregistro').modal('show');</script>
    <?php
}
?>
