<?php

use App\Clases\Auxiliares\Constantes;
?>

<!DOCTYPE html>
<html>
    <head>
        <title> @yield('titulo') </title>

        <script type="text/javascript" src="{{ URL::asset('scripts/general/jquery-3.4.1.min.js') }}"></script>
        <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css" />
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="scripts/general/modales.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/parallax/3.1.0/parallax.min.js"></script>

        <link rel="stylesheet" href="css/general.css" />+
    </head>
    <body>

        <?php
        if (session()->get("actPage") == Constantes::INDEX) {
            ?>
            <script type="text/javascript" src="{{ URL::asset('scripts/general/headerscrollindex.js') }}"></script>
            <?php
        } else {
            ?>
            <script type="text/javascript" src="{{ URL::asset('scripts/general/headerscroll.js') }}"></script>
            <?php
        }
            
            include 'auxiliarphp/modales.php';


        ?>
        <div id="blur" class="container-fluid">

            <div class = "row" id = "header">

                <nav class="navbar navbar-expand-lg">
                    <?php
                    // En el index el logo estará posicionado por defecto en otro sitio
                    if (session()->get("actPage") != Constantes::INDEX) {
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

                            <div class="dropdown-container">
                                <a class="nav-link" href="#" id="ddPerfil" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="images/icons/login.png" alt="Logearse" id="btnUser"/>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="ddPerfil">
                                    <a class="dropdown-item menu-text" href="#">Perfil</a>
                                    <a class="dropdown-item menu-text" href="#">Administrar Usuarios</a>
                                    <a class="dropdown-item menu-text" href="#">Administrar Documentación</a>
                                    <a class="dropdown-item menu-text" href="admin_event">Administrar Eventos</a>
                                    <a class="dropdown-item menu-text" href="#">Administrar Informes</a>
                                    <a class="dropdown-item menu-text" href="#">Mensajes</a>
                                    <a class="dropdown-item menu-text" href="#">Cerrar Sesión</a>
                                </div>
                            </div>
                        </ul>
                    </div>

                    <?php
                    // Si existe el usuario en sesión significa que está iniciada la sesión
                    if (session()->exists("userObj")) {
                        $userObj = session()->get("userObj");
                        ?>
                        <a id="closeSes" href="cerrarSesion">Cerrar Sesión</a>
                        <?php
                    } else {
                        // No está iniciada la sesión
                        ?>

                        <?php
                    }
                    ?>
                </nav>
            </div>

            <div class = "row" id = "main">
                @yield('contenido')
            </div>

            <div class="row footer font-small blue pt-4">

                FOOTER

            </div>
        </div>
    </body>
</html>
