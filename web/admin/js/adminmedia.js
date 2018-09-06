'use strict';

$(document).ready(function(){

    $('#images_input').change(function(){
        var filelist = $(this)[0].files;
        $.each(filelist, function(){
            $('#img_list').append('<p>' + this.name + '</p>');
        });
    });

    var modal = $("#MediaLibrary"),
        MediaBtnList = $(".media-open-button"),
        LoadMoreMedia = $("#medialoadmore");

    $.each( MediaBtnList, function(){
        $(this).on('click', function(){
            $(this).addClass('active-media');
            modal[0].style.display = 'block';
            if(LoadMoreMedia.data('page') == 0) {
                $.ajax({
                    method:"POST",
                    url:HomeUrl + '/admin/media-library',
                    data:{_csrf:MediaCsrf,counter:LoadMoreMedia.data('page')},
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
        })
    });

    LoadMoreMedia.on('click', function(){
        $.ajax({
            method:"POST",
            url:HomeUrl + '/admin/media-library',
            data:{_csrf:MediaCsrf,counter:LoadMoreMedia.data('page')},
            success:function(res){
                $('.inner-media').append(res[0]);
                if(!res[1]){
                    LoadMoreMedia[0].style.display = "none";
                }
                LoadMoreMedia.data('page', res[2]);
            },
            error:function(res){console.dir(res);}
        })
    });

    modal.on('click', '.media-selected', function(){

        var CurrentMediaBtn = $('.active-media'),
            parent = CurrentMediaBtn.parent().parent(),
            modal = $("#MediaLibrary"),
            image_src = $(this).attr('src');

        if(modal.hasClass('tiny')){

            tinymce.activeEditor.execCommand('mceInsertContent', false, '<img class="tiny-img" src="' + image_src + '"></img>');
        }else{
            $(parent).find("img").attr('src', $(this).attr('src'));
            $(parent).find("input").val($(this).data('imageid'));
            CurrentMediaBtn.removeClass('active-media');
        }
        modal.removeClass('tiny');
        modal[0].style.display = "none";
    });

    var span = $(".close-media")[0];
    span.onclick = function() {
        console.log(11);
        modal.removeClass('tiny');
        modal[0].style.display = "none";
    };
})