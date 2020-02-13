<?php

use App\Clases\Auxiliares\Constantes;
?>

<!DOCTYPE html>
<html>
    <head>
        <title> @yield('titulo') </title>

        <link rel="shortcut icon" type="image/jpg" href="images/logo.png" />
        <script type="text/javascript" src="{{ URL::asset('scripts/general/jquery-3.4.1.min.js') }}"></script>
        <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css" />
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="scripts/general/modales.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/parallax/3.1.0/parallax.min.js"></script>
        <script type="text/javascript" src="{{ URL::asset('scripts/general/tilt.jquery.min.js') }}"></script>

        <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
        <script type="text/javascript" src="scripts/general/gmaps.js"></script>
        <script src="scripts/general/geolocate.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDwKmL1KMaYg3Hl6ggnEnCVgCCHhtsgvEU&libraries=drawing&callback=initMap"async defer></script>

        <script src="scripts/principal/formValidations.js"></script>

        <link rel="stylesheet" href="css/general.css" />
    </head>
    <body>

        <?php
        $user = session()->get("userObj");

        if (session()->get("actPage") == Constantes::INDEX) {
            ?>
            <script type="text/javascript" src="{{ URL::asset('scripts/general/headerscrollindex.js') }}"></script>
            <?php
        }
        ?>

        <!-- ******************************************************************* -->
        <!-- ******************************************************************* -->
        <!-- **************************** MODALES ****************************** -->
        <!-- ******************************************************************* -->
        <!-- ******************************************************************* -->

        <!-- ******************** Ventana Agregar Evento *********************** -->
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
                                    <div class="row justify-content-center">
                                        <div class="name-form col">
                                            <input type="text" autocomplete="off" name="cp" id="cp" value="" required/>
                                            <label for="cp" class = "label-name">
                                                <span class = "content-name">
                                                    Código Postal
                                                </span>
                                            </label>
                                        </div>
                                        <div class="col">
                                            <button type="button" onclick="this.resetMarker()" name="btnreset" id="btnreset">Reiniciar Marcador</button>
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
                        <div class="modal-body">
                            <div class="row justify-content-center">
                                <div class="col">
                                    <div class="row justify-content-center">
                                        <p>Nombre del producto:</p>
                                    </div>
                                    <div class="row justify-content-center">
                                        <input type="text" autocomplete="off" id="productName" name="productName" required>
                                    </div>
                                </div>                                
                            </div>
                            <div class="row justify-content-center">
                                <div class="col">
                                    <div class="row justify-content-center">
                                        <p>Litros por hectárea:</p>
                                        <input type="number" autocomplete="off" id="litroHectarea" name="litroHectarea" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="row justify-content-center">
                                        <p>Fecha Informe:</p>
                                        <input type="date" autocomplete="off" id="fechaInforme" name="fechaInforme" required>
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

        <!-- ******************************************************************* -->
        <!-- ******************************************************************* -->
        <!-- ******************************************************************* -->
        <!-- ******************************************************************* -->

        <div class="loader-wrapper">
            <span class="loader"><span class="loader-inner"></span></span>
        </div>

        <script>
            $(window).on("load", function(){
            $(".loader-wrapper").fadeOut("slow");
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

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">                        
                        <ul class="nav navbar-nav ml-auto">

                            <form class="form-inline my-2 my-lg-0">
                                <input class="form-control mr-sm-2" type="search" placeholder="Buscar en la página" aria-label="Search">
                                <button class="btn btn-outline-success my-2 my-sm-0 margin-right" type="submit" id="searchButton"></button>
                            </form>

                            <li class="nav-item">
                                <a class="nav-link menu-text" href="index">Inicio</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link menu-text" href="crudCoches">Proyecto</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link menu-text" href="crudCoches">Cultivo en CLM</a>
                            </li>

                            <div class="dropdown-container">
                                <a class="nav-link menu-text" href="#" id="ddListar" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Plagas del Proyecto
                                </a>
                                <div class="dropdown-menu" aria-labelledby="ddListar">
                                    <a class="dropdown-item menu-text" href="#">Clitra</a>
                                    <a class="dropdown-item menu-text" href="#">Polilla de Almacén</a>
                                    <a class="dropdown-item menu-text" href="#">Psilas del Pistacho</a>
                                    <a class="dropdown-item menu-text" href="#">Chinches</a>
                                </div>
                            </div>
                            <li class="nav-item">
                                <a class="nav-link menu-text" href="crudCoches">Lugares de Trabajo</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link menu-text" href="crudCoches">Noticias</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link menu-text" href="crudCoches">Foro</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link menu-text" href="crudCoches">Documentación</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link menu-text" href="crudCoches">Agenda</a>
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
                                                <img src="images/icons/default.png" alt="Imagen por defecto" id="imgUser"/>
                                                <?php
                                            }
                                            ?>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="ddPerfil">

                                            <a class="dropdown-item menu-text" href="#">Perfil</a>
                                            <?php
                                            if ($user->rol == Constantes::ADMIN) {
                                                ?>
                                                <a class="dropdown-item menu-text" href="#">Administrar Usuarios</a>
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
                                    <a href="https://www.facebook.com/Centro-Agrario-El-Chaparrillo-289847297876695/?ref=br_rs" target="_blank">
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
