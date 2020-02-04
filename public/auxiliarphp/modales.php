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