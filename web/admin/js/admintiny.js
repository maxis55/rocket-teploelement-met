$(document).ready(function(){
    initializeTinyMce();
    $('.inner-media').on('click', '.media-selected-tiny', function(){
        // console.dir(this);
        var image_src = $(this).attr('src'),
            modal = $("#MediaLibrary");
        tinymce.activeEditor.execCommand('mceInsertContent', false, '<img class="tiny-img" src="' + image_src + '"></img>');
        modal[0].style.display = "none";
    });
});
function initializeTinyMce(){
    tinymce.init({
        selector: ".field-pages-description textarea, .tinymce_forms textarea",
        language : 'ru',
        browser_spellcheck: true,
        branding: false,
        statusbar: false,
        extended_valid_elements : "i",
        custom_elements: "i",
        width: '100%',
        height: 800,
        autoresize_min_height: 100,
        autoresize_max_height: 700,
        keep_styles : false,
        plugins: [
            'advlist autolink link image lists charmap print preview autoresize',
            'searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking',
            'table contextmenu emoticons paste textcolor code'
        ],
        toolbar1: "styleselect formatselect fontselect fontsizeselect | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify  | table | subscript superscript",
        toolbar2: "cut copy paste | bullist numlist | outdent indent blockquote | undo redo | link unlink anchor | insertdatetime preview | forecolor backcolor | mybutton custom_media textfooter_btn",
        setup: function(editor) {
            editor.addButton('custom_media', {
                text: 'Изображения',
                icon: false,
                onclick:function () {
                    var modal = $("#MediaLibrary"),
                        LoadMoreMedia = $("#medialoadmore");
                        modal.addClass('tiny');
                    $(this).addClass('active-media');
                    modal[0].style.display = 'block';
                    if(LoadMoreMedia.data('page') == 0) {
                        $.ajax({
                            method:"POST",
                            url:HomeUrl + '/admin/media-library',
                            data:{_csrf:MediaCsrf,counter:LoadMoreMedia.data('page'),type:'image'},
                            success:function(res){
                                $('.inner-media').append(res[0]);
                                if(!res[1]){
                                    LoadMoreMedia[0].style.display = "none";
                                }
                                LoadMoreMedia.data('page', res[2]);
                            },
                            error:function(res){console.dir(res);}
                        })
                    }
                }
            });
        }
    });

    $('#insertrepeater').on('click', function(e){
        e.preventDefault();
        tinymce.activeEditor.execCommand('mceInsertContent', false, '%repeater%');
    })

}

