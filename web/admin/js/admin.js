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

function addCity(clicked_button){
    var nextTable=$(clicked_button).closest('.box').find('.table-append');
    nextTable.append('<tr><td><input type="text" class="form-control" name="cities_names[]" placeholder="Город ..."></td> <td><input class="form-control" name="cities_messages[]" placeholder="Сообщение ..."></td> <th><button type="button" class="btn btn-block btn-danger btn-xs" onclick="$(this).parent().parent().remove();">Удалить</button></th> </tr>');
}

function createPlacemark(coords) {
    return new ymaps.Placemark(coords, {
        iconCaption: 'поиск...'
    }, {
        preset: 'islands#redDotIconWithCaption',
        draggable: true
    });
}
function getAddress(coords,mainMapPlacemark) {
    $('#maps_cords').val(coords);
    ymaps.geocode(coords).then(function (res) {
        var firstGeoObject = res.geoObjects.get(0);

        mainMapPlacemark.properties
            .set({
                iconCaption: [
                    firstGeoObject.getLocalities().length ? firstGeoObject.getLocalities() : firstGeoObject.getAdministrativeAreas(),
                    firstGeoObject.getThoroughfare() || firstGeoObject.getPremise()
                ].filter(Boolean).join(', '),
                balloonContent: firstGeoObject.getAddressLine()
            });
    });
}