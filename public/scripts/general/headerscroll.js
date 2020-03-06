/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
window.onscroll = function () {
    scrollFunction();
};

function scrollFunction() {
    if (document.body.scrollTop > 70 || document.documentElement.scrollTop > 70) {

        $('.dropdown-menu').css('margin-top', '15px');

        document.getElementById("header").style.height = "25px";
        document.getElementById("navHeader").style.minHeight = "25px";
        document.getElementById("imgLogo").style.height = "55px";
        document.getElementById("imgLogo").style.width = "55px";

        if (document.getElementById("btnUser") !== null) {
            document.getElementById("btnUser").style.width = "30px";
            document.getElementById("btnUser").style.height = "30px";
        } else {
            document.getElementById("imgUser").style.width = "30px";
            document.getElementById("imgUser").style.height = "30px";
        }
    } else {

        $('.dropdown-menu').css('margin-top', '25px');

        document.getElementById("header").style.height = "100px";
        document.getElementById("navHeader").style.minHeight = "100px";
        document.getElementById("imgLogo").style.height = "75px";
        document.getElementById("imgLogo").style.width = "75px";
        if (document.getElementById("btnUser") !== null) {
            document.getElementById("btnUser").style.width = "35px";
            document.getElementById("btnUser").style.height = "35px";
        } else {
            document.getElementById("imgUser").style.width = "40px";
            document.getElementById("imgUser").style.height = "40px";
        }
    }
}