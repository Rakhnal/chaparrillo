<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div class="modal fade" id="ventana-mapa">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title">
                    Pinche su ubicación
                </div>
                <span data-dismiss="modal"><button id="salir" class="btn btn-danger">X</button></span>
            </div>
            <div class="modal-body">
                
                <div class="map">
                    
                </div>
                
            </div>
            <div class="modal-footer">
                Pie de la ventana
            </div>
        </div>
    </div>
</div>

</div>

<!------------- Pantalla modal del login-->
<div id="login" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Iniciar Sesión</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
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
                        <input type="submit" value = "Entrar" name = "login"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Ventana modal para subir documentación -->

<section class="modal fade" id="modalSubirDocumento">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-transparent">
            <div class="modal-header bg-dark text-white">
                <div class="modal-title">
                    Subir documentación
                </div>
                <span class="btn btn-danger" data-dismiss="modal">X</span>
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
                        <input class="p-0" id="subirAdjuntos" name="subirAdjuntos" type="file">
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
</section>

<!-- Ventana modal para editar documentación -->

<section class="modal fade" id="modalEditarDocumento">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-transparent">
            <div class="modal-header bg-dark text-white">
                <div class="modal-title">
                    Editar documentación
                </div>
                <span class="btn btn-danger" data-dismiss="modal">X</span>
            </div>
            <form name="formulario" action="" method="POST">
                <div class="modal-body bg-light">
                    <div class="form-group">
                        <input type="text" class="pl-2 border border-dark" id="nombreDocumento2" name="nombreDocumento2" placeholder="Nombre del documento" required>
                    </div>
                    <div class="form-group">
                        <textarea cols="40" rows="10" class="pl-2 border border-dark" id="descDocumento2" name="descDocumento2" placeholder="Descripción de la documentación"></textarea>
                    </div>
                    <div class="form-group">
                        <input class="p-0" id="editarAdjuntos" name="subirAdjuntos" type="file">
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
</section>
