/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).mousemove(function (event) {
    if (event.pageX > (window.screen.availWidth / 2)) {
        document.body.style.backgroundColor = "#8F7E4F";
        $('.dropdown-menu').css('background-color', 'rgba(92, 79, 43, 0.9)');
        $('.navbar').css('background-color', 'rgba(92, 79, 43, 0.9)');
        $('.modal-content').css('background-color', 'rgba(92, 79, 43, 0.9)');
        $('.footer').css('background-color', 'rgba(92, 79, 43, 0.9)');
    } else {
        document.body.style.backgroundColor = "#78aa57";
        $('.dropdown-menu').css('background-color', 'rgba(82, 117, 59, 0.9)');
        $('.navbar').css('background-color', 'rgba(82, 117, 59, 0.9)');
        $('.modal-content').css('background-color', 'rgba(82, 117, 59, 0.9)');
        $('.footer').css('background-color', 'rgba(82, 117, 59, 0.9)');
    }
});

$(function(){
    $(window).scroll(function(){
        var scroll_actual = document.documentElement.scrollTop;
        //fade-in
        $('.fade-ani').each(function(){
            var actual_height = document.getElementById('principal-container').clientHeight - 300;
            
            var bottom_of_object = $(this).position().top + $(this).outerHeight();
            if (scroll_actual > actual_height){
                $(this).addClass('showing');
            } else {
                $(this).removeClass('showing');
            }
        })
    })
});