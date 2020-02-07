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
                <form action="" method="POST" enctype="multipart/form-data">
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
                <button type="button" class="close clear white-color" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form name="logForm" action="login" method="POST">
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
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Registrar Usuario</h4>
                <button type="button" class="close clear" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                Pruebaaa
            </div>
            <div class="modal-footer">
                <button type="button" class="blur-btn" data-toggle="modal" data-target="#register"></button>
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
                <form action="formevent" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="cwBsSF1xj4KmGiTL8AkIKYHmiiIhD8GMNbliQgDx">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Nombre:</label>
                                <input name="nomb" type="text" class="form-control" value="" placeholder="Nombre del evento" required>
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
                                <textarea id="ta-event" rows="5" cols="30" placeholder="Escribe una descripción"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="por-event">Portada de evento:</label>
                                <input id="por-event" accept="image/*" name="portada" type="file" class="form-control-file">
                            </div>
                            <div id="response-container"></div>
                        </div>

                        <div class="col-6">

                            <div class="form-group">
                                <label>Localización:</label>
                                <input name="loca" type="text" class="form-control" placeholder="Localización" required>
                            </div>

                            <div id="map" class="mapa ml-3">

                            </div>

                        </div>
                    </div>
                    <input id="mod-evento" name="save" type="submit" class="btn btn-primary" value="Guardar">
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
