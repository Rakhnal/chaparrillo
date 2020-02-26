
$(document).ready(function () {
    /**
     * funcion para el pulsado del boton editar
     */
    $("#editarUsuario").click(function () {
        if (document.getElementById("nombre").disabled === false) {
            alert('Datos actualizados');
        }
        desblok();
        /**
         * bloquea los campos del formulario si ya estan bloqueados los desbloquea
         * @returns {undefined}
         */
        function desblok() {
            if (document.getElementById("nombre").disabled === true) {
                document.getElementById("bd_edit").disabled = false;
                document.getElementById("paise").disabled = false;
                document.getElementById("local").disabled = false;
                document.getElementById("nombre").disabled = false;
                document.getElementById("apell").disabled = false;
                document.getElementById("password").disabled = false;
                document.getElementById("profile-file-input").disabled = false;
                ActivarCampo();
            } else {
                document.getElementById("paise").disabled = true;
                document.getElementById("bd_edit").disabled = true;
                document.getElementById("local").disabled = true;
                document.getElementById("nombre").disabled = true;
                document.getElementById("apell").disabled = true;
                document.getElementById("password").disabled = true;
                document.getElementById("ajusteimagen").disabled = true;
                document.getElementById("profile-file-input").disabled = true;
                DesActivarCampo();
            }
        }

        /**
         * modifica el alert con un estilo propio
         * @param {type} message
         * @returns {undefined}
         */
        function alertDGC(message) {
            var dgcTiempo = 1;
            var ventanaCS = '<div class="alert alert-success alert-dismissible fade show"  role="alert">' + message + '<button type="button" class="close" data-dismiss="alert">&times;</button></div>';
            $('body').append(ventanaCS);
            var alVentana = $('.dgcVentana').height();
            var alNav = $(window).height();
            var supNav = $(window).scrollTop();
            $('.dgcAlert').css('height', $(document).height());
            $('.dgcVentana').css('top', ((alNav - alVentana) / 2 + supNav - 100) + 'px');
            $('.dgcAlert').css('display', 'block');
            $('.dgcAlert').animate({opacity: 1}, dgcTiempo);
            $('.dgcCerrar,.dgcAceptar').click(function (e) {
                $('.dgcAlert').animate({opacity: 0}, dgcTiempo);
                setTimeout("$('.dgcAlert').remove()", dgcTiempo);
            });
            window.setTimeout(function () {
                $(".alert").slideUp(300, function () {
                    $(this).remove();
                });
                setTimeout(function () {
                    $(".alert").close();
                }, 6000);
            }, 5000);
        }

        window.alert = function (message) {
            alertDGC(message);
        };
    });
});

/**
 * bloquea los campos del formulario
 * @returns {undefined}
 */
function block() {
    document.getElementById("paise").disabled = true;
    document.getElementById("local").disabled = true;
    document.getElementById("nombre").disabled = true;
    document.getElementById("apell").disabled = true;
    document.getElementById("password").disabled = true;
    document.getElementById("profile-file-input").disabled = true;
    document.getElementById("bd_edit").disabled = true;

    DesActivarCampo();
}

/**
 * activa el campo del elemento ajusteimagen
 * @returns {Boolean}
 */
function ActivarCampo() {
    var contenedor = document.getElementById("ajusteimagen");
    contenedor.style.display = "block";
    return true;
}

/**
 * desactiva el campo del elemento ajusteimagen
 * @returns {Boolean}
 */
function DesActivarCampo() {
    var contenedor = document.getElementById("ajusteimagen");
    contenedor.style.display = "none";
    return true;
}


function myFunction() {
    document.getElementById("formulario_editUser").submit();
}


