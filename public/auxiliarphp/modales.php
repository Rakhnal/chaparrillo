<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<!-- *************** Ventana Agregar Evento ******************** -->
<div class="modal fade eventos" id="ventana-crear" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <div class="modal-title">
                    Registro de Eventos
                </div>
                <span data-dismiss="modal"><button class="btn btn-danger salir">&times;</button></span>
            </div>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                     <div class="right">
                        <div class="form-group">
                            <label>Nombre:</label>
                            <input name="nomb" type="text" class="form-control" placeholder="Introduce el nombre del evento" required>
                        </div>
                        <div class="form-group">
                            <label>Descripción:</label>
                            <input name="desc" type="text" class="form-control" placeholder="Introduce una descripción" required>
                        </div>
                        <div class="form-group">
                            <label>Localización:</label>
                            <input name="loca" type="text" class="form-control" placeholder="Introduce tu localización" required>
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
                            <label>Portada de evento:</label>
                            <input name="portada" type="file" class="form-control-file">
                        </div>
                    </div>
                                 
                    <div class="left">
                        
                        <div id="map" class="mapa">
                            
                        </div>
                        
                    </div>

                </div>
                <div class="modal-footer">
                    <input id="add-evento" name="add" type="submit" class="btn btn-primary" value="Añadir">
                </div>
            </form>
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
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <div class="modal-title">
                    Modificar Eventos
                </div>
                <span data-dismiss="modal"><button class="btn btn-danger salir">&times;</button></span>
            </div>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="right">
                        <div class="form-group">
                            <label>Nombre:</label>
                            <input name="nomb" type="text" class="form-control" placeholder="Introduce el nombre del evento" required>
                        </div>
                        <div class="form-group">
                            <label>Descripción:</label>
                            <input name="desc" type="text" class="form-control" placeholder="Introduce una descripción" required>
                        </div>
                        <div class="form-group">
                            <label>Localización:</label>
                            <input name="loca" type="text" class="form-control" placeholder="Introduce tu localización" required>
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
                            <label>Portada de evento:</label>
                            <input name="portada" type="file" class="form-control-file">
                        </div>
                    </div>
                    
                    <div class="left">
                        
                        <div id="map" class="mapa">
                            
                        </div>
                        
                    </div>

                </div>
                <div class="modal-footer">
                    <input id="mod-evento" name="save" type="submit" class="btn btn-primary" value="Guardar">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Ventana modal para subir documentación -->

<div class="modal fade" id="modalSubirDocumento" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-transparent">
            <div class="modal-header bg-dark text-white">
                <div class="modal-title">
                    Subir documentación
                </div>
                <span class="btn btn-danger salir" data-dismiss="modal">&times;</span>
            </div>
            <form name="formulario" action="" method="POST">
                <div class="modal-body bg-light">
                    <div class="form-group">
                        <input type="text" class="pl-2 border border-dark" id="nombreDocumento" name="nombreDocumento" placeholder="Nombre del documento" required>
                    </div>
                    <div class="form-group">
                        <textarea cols="40" rows="10" class="pl-2 border border-dark" id="descDocumento" name="descDocumento" placeholder="Descripción de la documentación"></textarea>
                    </div>
                    <div class="form-group">
                        <input class="btn p-0" id="subirAdjuntos" name="subirAdjuntos" type="file">
                    </div>
                    <label for="subirAdjuntos">
                        <span>Seleccionar adjuntos</span>
                    </label>
                </div>
                <div class="modal-footer bg-light">
                    <div class="text-right">
                        <input type="submit" class="btn border border-dark" id="subirDocumento" name="subirDocumento" value="Subir documentación">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Ventana modal para editar documentación -->

<div class="modal fade" id="modalEditarDocumento" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-transparent">
            <div class="modal-header bg-dark text-white">
                <div class="modal-title">
                    Editar documentación
                </div>
                <span class="btn btn-danger salir" data-dismiss="modal">&times;</span>
            </div>
            <form name="formulario" action="" method="POST">
                <div class="modal-body bg-light">
                    <div class="form-group">
                        <input type="text" class="pl-2 border border-dark" id="nombreDocumento" name="nombreDocumento" placeholder="Nombre del documento" required>
                    </div>
                    <div class="form-group">
                        <textarea cols="40" rows="10" class="pl-2 border border-dark" id="descDocumento" name="descDocumento" placeholder="Descripción de la documentación"></textarea>
                    </div>
                    <div class="form-group">
                        <input class="btn p-0" id="subirAdjuntos" name="subirAdjuntos" type="file">
                    </div>
                    <label for="subirAdjuntos">
                        <span>Seleccionar adjuntos</span>
                    </label>
                </div>
                <div class="modal-footer bg-light">
                    <div class="text-right">
                        <input type="submit" class="btn border border-dark" id="editarDocumento" name="editarDocumento" value="Confirmar cambios">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>