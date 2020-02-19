<?php

use App\Clases\conexion;
use App\Clases\Auxiliares\Constantes;

session()->put("actPage", Constantes::ED_USUARIO);
$prin = session()->get("userObj");
?>

@extends('../general/base')
@section('titulo')
Inicio
@endsection
@section('contenido')
<link rel="stylesheet" type="text/css" href="css/editUsu/editarusuario.css" />
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDwKmL1KMaYg3Hl6ggnEnCVgCCHhtsgvEU&libraries=drawing&callback=initMap&sensor=true"></script>
<script type="text/javascript" src="{{ URL::asset('scripts/general/editar_usuario.js') }}"></script>
<link href="css/editUsu/cropper.min.css" rel="stylesheet" type="text/css"/>
<div class="col-12 ml-3">
    <div class="row col-12 form_base">
        <div class="col-12 text-center mt-2">
            <h1>Perfil</h1>
        </div>
        <div class="row col-12">
            <div class=" col-4" >
                <?php $seesion_user = $prin->img_user;?>
                
                <script type="text/javascript" src="{{ URL::asset('scripts/general/main.js') }}"></script>
                <script type="text/javascript" src="{{ URL::asset('scripts/general/cropper.min.js') }}"></script>
                <!--        boostrap model change profile pic-->
                <div class="col-12" id="ajusteimagen" style="display:none;">
                    <div class="ajax-response" id="loading"></div>
                    <h4 class="m-t-5 m-b-5 ellipsis text-center">Ajustar imagen</h4>                    
                    <div class="profile-pic-wraper">
                        <?php if ($seesion_user!='0'): ?>
                            <img src="data:image/jpg;base64,<?php echo base64_encode($seesion_user); ?>" alt="" id="change-profile-pic" class="col-12">
                        <?php else: ?>
                            <img src="images/profile-pic/default.png" alt="" id="change-profile-pic" class="col-12" >    
                        <?php endif; ?>
                    </div>
                    <div>
                        <form enctype="multipart/form-data">
                            <input type="file" accept="image/*" id="profile-file-input" onchange="loadFile(event)" value="Archivo..." name="Archivo..." class="bwr-transparent">
                        </form><!--data:image/png;base64,iVB-->
                    </div>
                </div>
            </div>
            <form class="col-8" name="formulario_editUser" id="formulario_editUser" action="edit_us" method="POST">
                @csrf
                <div id="profile-result" class="mb-2 justify-content-center d-flex row">
                    <?php if ($seesion_user != '0'): ?>
                        <img src="data:image/jpg;base64,<?php echo base64_encode($seesion_user); ?>" class="img-circle" id="laola">  
                    <?php else : ?>
                        <img src="images/profile-pic/default.png" class="img-circle">    
                    <?php endif; ?>
                </div>
                <div class="col-12">
                    <div class="row">
                        <div class="col-6">
                            <label class="form_control col-12">Email:</label>
                            <input type="email" name="email" class="input read w-100 text_black" value="<?php echo $prin->email; ?>" id="email" readonly="true">
                        </div>
                        <div class="col-6">
                            <label class="form_control col-12">Contraseña:</label>
                            <input type="button" class="btn btn-light w-100 input" data-toggle="modal" data-target="#exampleModalCenter" id="password" value="Cambiar contraseña"> 
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
                                        <input type="password" name="passwed" class="text_black passwrd" id="passw"> 
                                        <label class="form_control">Confirmar contraseña:</label>
                                        <input type="password" name="passwn" class="text_black passwrd"> 
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                        <button type="button" class="btn btn-success" data-dismiss="modal">Aceptar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label class="form_control col-12">Nombre:</label>
                            <input type="text" name="nombre" class="w-100 text_black input" value="<?php echo $prin->nombre; ?>" id="nombre">
                        </div>
                        <div class="col-6">
                            <label class="form_control col-12">Apellidos:</label>
                            <input type="text" name="apellidos" class=" w-100 text_black input" value="<?php echo $prin->apellidos; ?>" id="apell">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12"><label class="form_control">Localización:</label></div>
                        <div class="col-6">
                            <input name="pais" type="text" class="text_black w-100 input" placeholder="Pais" id="paise" value="<?php echo $prin->pais; ?>">
                        </div>
                        <div class="col-6">
                            <input name="localidad" type="text" class="text_black w-100 input" placeholder="Localidad" id="local" value="<?php echo $prin->localidad; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label class="form_control">Posición:</label>
                            <div id="mapa" class="col-12"> </div>
                            <script>
                                initMap();
                                block();
                            </script>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 text-center mb-3">
                    <button type="button" class="btn btn-primary" id="editarUsuario" >Editar</button>
                    <input type="submit" class="btn btn-success" id="bd_edit" value="Aceptar">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection