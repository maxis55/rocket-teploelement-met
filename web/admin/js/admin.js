'use strict';

$(document).ready(function(){
    $('.s-boxbtn').on('click', '.btn.btn-block.btn-danger', function (e) {
        e.preventDefault();
        $(this).prev().removeAttr('value');
        $(this).parents('.box-img').find('img').removeAttr('src');
    })

});