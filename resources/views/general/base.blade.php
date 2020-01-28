<?php

use App\Clases\Auxiliares\Constantes;
?>

<!DOCTYPE html>
<html>
    <head>
        <title> @yield('titulo') </title>

        <script src="scripts/general/jquery-3.4.1.min.js"></script>
        <link rel="stylesheet" href="css/bootstrap/bootstrap.css" />
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
        <script src="scripts/general/parallax.js"></script>

        <link rel="stylesheet" href="css/general.css" />
    </head>
    <body>

        <div class="container-fluid">

            <div class = "row" id = "header">

                <nav class="navbar navbar-expand-lg">
                    <?php
                    // En el index el logo estará posicionado por defecto en otro sitio
                    //if (session()->get("actPage") != Constantes::INDEX) {
                    ?>
                    <a class="navbar-brand" href="index"><img src="images/logo.png" class="imgLogo" alt="Logo principal"/></a>
                    <?php
                    //}
                    ?>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">                        
                        <ul class="nav navbar-nav ml-auto">

                            <form class="form-inline my-2 my-lg-0">
                                <input class="form-control mr-sm-2" type="search" placeholder="Buscar en la página" aria-label="Search">
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit" id="searchButton"></button>
                            </form>

                            <li class="nav-item">
                                <a class="nav-link menu-text" href="crudUsuarios">Inicio</a>
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
                                    <img src="images/icons/login.png" alt="Logearse"/>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="ddPerfil">
                                    <a class="dropdown-item menu-text" href="#">Perfil</a>
                                    <a class="dropdown-item menu-text" href="#">Administrar Usuarios</a>
                                    <a class="dropdown-item menu-text" href="#">Administrar Documentación</a>
                                    <a class="dropdown-item menu-text" href="#">Administrar Eventos</a>
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

            <footer class="page-footer font-small blue pt-4 fixed-bottom">

                <div class="container-fluid text-center text-md-left">

                    <div class="row">

                        <div class="col-md-9 mt-md-0 mt-3">
                            <h5 class="text-uppercase">Footer Content</h5>
                            <p>Here you can use rows and columns to organize your footer content.</p>

                        </div>
                        <hr class="clearfix w-100 d-md-none pb-3">

                        <div class="col-md-3 mb-md-0 mb-3">
                            <h5 class="text-uppercase">Links</h5>

                            <ul class="list-unstyled">
                                <li>
                                    <a href="#!">Link 1</a>
                                </li>
                                <li>
                                    <a href="#!">Link 2</a>
                                </li>
                                <li>
                                    <a href="#!">Link 3</a>
                                </li>
                                <li>
                                    <a href="#!">Link 4</a>
                                </li>
                            </ul>

                        </div>

                    </div>

                </div>

            </footer>
        </div>
    </body>
</html>
