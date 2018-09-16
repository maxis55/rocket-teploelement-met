'use strict';

$(document).ready(function(){
    //prevent target blank in media library div
    // $('.media-content').on('click','.media-selected-file',function () {
    //     return false;
    // });

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
            if(LoadMoreMedia.data('media-type')!==$(this).data('media-type')){
                if($(this).data('media-type')===''){
                    LoadMoreMedia.data('media-type','image');
                }else{
                    LoadMoreMedia.data('media-type',$(this).data('media-type'));
                }
                $('.inner-media').empty();
                LoadMoreMedia.data('page',0);
                LoadMoreMedia.show();
            }

            modal[0].style.display = 'block';
            if(LoadMoreMedia.data('page') === 0) {
                $.ajax({
                    method:"POST",
                    url:HomeUrl + '/admin/media-library',
                    data:{
                        _csrf:MediaCsrf,
                        counter:LoadMoreMedia.data('page'),
                        type:LoadMoreMedia.data('media-type')
                    },
                    success:function(res){
                        $('.inner-media').append(res[0]);
                        if(!res[1]){
                            LoadMoreMedia[0].style.display = "none";
                        }
                        LoadMoreMedia.data('page', res[2]);
                    },
                    error:function(res){
                        console.dir(res);
                    }
                })
            }
        })
    });

    LoadMoreMedia.on('click', function(){
        $.ajax({
            method:"POST",
            url:HomeUrl + '/admin/media-library',
            data:{
                _csrf:MediaCsrf,
                counter:LoadMoreMedia.data('page'),
                type:LoadMoreMedia.data('media-type')
            },
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

    modal.on('click', '.media-selected, .media-selected-file', function(e){
        e.preventDefault();
        var CurrentMediaBtn = $('.active-media'),
            parent = CurrentMediaBtn.parent().parent(),
            modal = $("#MediaLibrary"),
            image_src = $(this).attr('src');

        if(modal.hasClass('tiny')){

            tinymce.activeEditor.execCommand('mceInsertContent', false, '<img class="tiny-img" src="' + image_src + '">');
        }else{
            if(LoadMoreMedia.data('media-type')==='image'){
                $(parent).find("img").attr('src', $(this).attr('src'));
                $(parent).find("input").val($(this).data('imageid'));
            }else{
                if(LoadMoreMedia.data('media-type')==='file'){
                    $(parent).find("a").attr('href', $(this).attr('href'));
                    $(parent).find("a").html($(this).html());
                    $(parent).find("input").val($(this).data('imageid'));
                }
            }

            CurrentMediaBtn.removeClass('active-media');
        }
        modal.removeClass('tiny');
        modal[0].style.display = "none";
    });

    var span = $(".close-media")[0];
    span.onclick = function() {

        $('.active-media').each(function (index) {
           $(this).removeClass('active-media');
        });
        modal.removeClass('tiny');
        modal[0].style.display = "none";
    };
})