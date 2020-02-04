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
                <span data-dismiss="modal"><button class="btn btn-danger salir">X</button></span>
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

                        <div class="map">

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

<!-- *************** Ventana Modificar Evento ******************** -->
<div class="modal fade eventos" id="ventana-modificar" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <div class="modal-title">
                    Modificar Eventos
                </div>
                <span data-dismiss="modal"><button class="btn btn-danger salir">X</button></span>
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

                        <div class="map">

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
</section>

