<?php

use App\Clases\conexion;
use App\Clases\Auxiliares\Constantes;

session()->put("actPage", Constantes::ED_USUARIO);
?>

@extends('../general/base')
@section('titulo')
Inicio
@endsection
@section('contenido')
<link rel="stylesheet" type="text/css" href="css/editUsu/editarusuario.css" />
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDwKmL1KMaYg3Hl6ggnEnCVgCCHhtsgvEU&libraries=drawing&callback=initMap&sensor=true"></script>

<link href="css/editUsu/cropper.min.css" rel="stylesheet" type="text/css"/>
<div class="col-12 ml-3">
    <div class="row col-12 form_base">
        <div class="col-12 text-center mt-2">
            <h2>Editar perfil</h2>
        </div>
        <div class="row col-12"><!--cambiar-->
            <div class=" col-4" >
                <?php $seesion_user = "stint"; ?>
                <div id="profile-result" class="mb-2 justify-content-center d-flex">
                    <?php if (file_exists('images/profile-pic/' . $seesion_user . '.jpg')): ?>
                        <img src="<?php echo 'images/profile-pic/' . $seesion_user . '.jpg'; ?>"class="img-circle">
                    <?php else: ?>
                        <img src="images/profile-pic/default.png" class="img-circle">    
                    <?php endif; ?>
                </div>
                <script type="text/javascript" src="{{ URL::asset('scripts/general/main.js') }}"></script>
                <script type="text/javascript" src="{{ URL::asset('scripts/general/cropper.min.js') }}"></script>
                <!--        boostrap model change profile pic-->
                <div class="col-12" id="ajusteimagen">
                    <div class="ajax-response" id="loading"></div>
                    <h4 class="m-t-5 m-b-5 ellipsis text-center">Ajustar imagen</h4>                    
                    <div class="profile-pic-wraper">
                        <?php if (file_exists('images/profile-pic/' . $seesion_user . '.jpg')): ?>
                            <img src="<?php echo 'images/profile-pic/' . $seesion_user . '.jpg'; ?>" alt="" id="change-profile-pic" class="col-12">
                        <?php else: ?>
                            <img src="images/profile-pic/default.png" alt="" id="change-profile-pic" class="col-12" >    
                        <?php endif; ?>
                    </div>
                    <div>
                        <form enctype="multipart/form-data">
                            <input type="file" accept="image/*" id="profile-file-input" onchange="loadFile(event)" value="Archivo..." name="Archivo...">
                        </form>
                    </div>
                </div>
            </div>
            <form class="col-8">
                <div class="col-12">
                    <div class="row">
                        <div class="col-6">
                            <label class="form_control col-12">Email:</label>
                            <input type="email" name="email" class=" w-100 text_black" value="COMEME" required="" id="email">
                        </div>
                        <div class="col-6">
                            <label class="form_control col-12">Contraseña:</label>
                            <input type="button" class="btn btn-light w-100" data-toggle="modal" data-target="#exampleModalCenter" id="password" value="Cambiar contraseña" disabled="true" > 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label class="form_control col-12">Nombre:</label>
                            <input type="text" name="nombre" class="w-100 text_black" value="LOS" id="nombre">
                        </div>
                        <div class="col-6">
                            <label class="form_control col-12">Apellidos:</label>
                            <input type="text" name="apellidos" class=" w-100 text_black" value="" id="apell">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12"><label class="form_control">Localización:</label></div>
                        <div class="col-6">
                            <input name="Pais"  type="text" class="text_black w-100" placeholder="Pais" value="HUEVOS" id="pais">
                        </div>
                        <div class="col-6">
                            <input name="localidad" type="text" class="text_black w-100" placeholder="Localidad" id="local">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label class="form_control">Posición:</label>
                            <script>
                                function blok() {
                                    document.getElementById("email").disabled = true;
                                    document.getElementById("pais").disabled = true;
                                    document.getElementById("local").disabled = true;
                                    document.getElementById("nombre").disabled = true;
                                    document.getElementById("apell").disabled = true;
                                    document.getElementById("password").disabled = true;   
                                    document.getElementById("ajusteimagen").disabled = true;  
                                }
                                function desblok() {
                                    document.getElementById("email").disabled = false;
                                    document.getElementById("pais").disabled = false;
                                    document.getElementById("local").disabled = false;
                                    document.getElementById("nombre").disabled = false;
                                    document.getElementById("apell").disabled = false;
                                    document.getElementById("password").disabled = false; 
                                }
                                function initMap() {
                                    // Creamos un objeto mapa y especificamos el elemento DOM donde se va a mostrar.
                                    var map = new google.maps.Map(document.getElementById('mapa'), {
                                        center: {lat: 38.694777119, lng: -4.1108735307},
                                        scrollwheel: false,
                                        zoom: 15,
                                        zoomControl: true,
                                        rotateControl: false,
                                        mapTypeControl: true,
                                        streetViewControl: false
                                    });
                                    // Creamos dos marcadores.
                                    var marker1 = new google.maps.Marker({
                                        position: {lat: 38.69477711972968, lng: -4.110873530782783},
                                        draggable: false
                                    });
                                    // a este marcador le añadimos un icono personalizado
                                    var marker2 = new google.maps.Marker({
                                        position: {lat: 38.69477711972968, lng: -4.110873530782783},
                                        icon: "images/icons/location.svg",
                                        draggable: false
                                    });
                                    // Le asignamos el mapa a los marcadores.
                                    marker2.setMap(map);
                                }
                            </script>
                            <div id="mapa" class="col-12"> </div>
                            <script>initMap(); blok();</script>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 text-center mb-3">
                    <button type="button" class="btn btn-primary" onclick="desblok()">Editar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Cambiar contraseña</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label class="form_control">Nueva contraseña:</label>
                <input type="password" name="passw" class="text_black passwrd" value="" required=""> 
                <label class="form_control">Confirmar contraseña:</label>
                <input type="password" name="passw" class="text_black passwrd" value="" required=""> 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-success" data-dismiss="modal">Aceptar</button>
            </div>
        </div>
    </div>
</div>
@endsection
