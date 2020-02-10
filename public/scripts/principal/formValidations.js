/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// Comprueba si las contraseñas del formulario de registro son iguales
function samePasswords() {

    if ($('#passPpal').val() === $('#passVal').val()) {
        return true;
    } else {
        $('#passPpal').css('border', '1px solid red');
        $('#passVal').css('border', '1px solid red');

        return false;
    }

}

