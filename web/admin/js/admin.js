'use strict';

$(document).ready(function(){
    $('.s-boxbtn').on('click', '.btn.btn-block.btn-danger', function (e) {
        e.preventDefault();
        $(this).prev().removeAttr('value');
        $(this).parents('.box-img').find('img').removeAttr('src');
    })


});
function addRow(clicked_button,name,placeholder){
    var nextTable=$(clicked_button).parents('.box-header').next('.table-append');
    nextTable.append( '<tr><td><input type="text" class="form-control" name="'+name+'" placeholder="'+placeholder+'"></td><th><button type="button" class="btn btn-block btn-danger btn-xs" onclick="$(this).parents('+"'tr'"+').remove();">Удалить</button></th></tr>' );
}