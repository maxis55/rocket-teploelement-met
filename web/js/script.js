$(function(){
// IPad/IPhone
    var viewportmeta = document.querySelector && document.querySelector('meta[name="viewport"]'),
        ua = navigator.userAgent,

        gestureStart = function () {
            viewportmeta.content = "width=device-width, minimum-scale=0.25, maximum-scale=1.6";
        },

        scaleFix = function () {
            if (viewportmeta && /iPhone|iPad/.test(ua) && !/Opera Mini/.test(ua)) {
                viewportmeta.content = "width=device-width, minimum-scale=1.0, maximum-scale=1.0";
                document.addEventListener("gesturestart", gestureStart, false);
            }
        };
    scaleFix();
    // Menu Android
    if (window.orientation != undefined) {
        var regM = /ipod|ipad|iphone/gi,
            result = ua.match(regM)
        if (!result) {
            $('.menu li').each(function () {
                if ($(">ul", this)[0]) {
                    $(">a", this).toggle(
                        function () {
                            return false;
                        },
                        function () {
                            window.location.href = $(this).attr("href");
                        }
                    );
                }
            })
        }
    }
});

var ua = navigator.userAgent.toLocaleLowerCase(),
    regV = /ipod|ipad|iphone/gi,
    result = ua.match(regV),
    userScale = "";
if (!result) {
    userScale = ",user-scalable=0"
}


//----Include-Function----
function include(url) {
    document.write('<script src="' + url + '"></script>');
}

if ($(".owl-carousel").length) {
    include("js/owl.carousel.min.js");
}

$(document).ready(function() {

//--- number fix ----

    var number = $(".header_info_lk");

    if (number.length > 0) {

        var a = number.html();
        var pos = a.indexOf(')');
        var res = a.slice(0, pos + 1) + '<span>' + a.slice(pos + 1) + '</span>';
        number.html(res);

    }

//--- number fix end ----


// catolog counter


    $("body").on("click", ".counter-plus", function () {

        var inp_value = parseInt($(this).siblings(".counter-qt ").val(), 10);

        $(this).siblings(".counter-qt").attr("value", inp_value + 1);
    });

    $("body").on("click", ".counter-minus", function () {

        var inp_value = parseInt($(this).siblings(".counter-qt ").val(), 10);

        if (inp_value > 1) {

            $(this).siblings(".counter-qt ").attr("value", inp_value - 1);
        }


    });
});
// catolog counter end

$(document).ready(function () {
//-------Arrow up-------
    function goUp() {
        var windowHeight = $(window).height(),
            windowScroll = $(window).scrollTop();
        if (windowScroll > windowHeight / 2) {
            $('.arrow_up').addClass('active');
        }
        else {
            $('.arrow_up').removeClass('active');
        }
    }

    goUp();
    $(window).on('scroll', goUp);
    $('.arrow_up').on('click', function () {
        $('html,body').animate({scrollTop: 0}, 1100);
        return false;
    });
    //--owl-carousel--------------------
    if ($('.owl-carousel').length) {
        $(".owl-carousel").owlCarousel({
            nav: true,
            items: 5,
            responsiveClass: true,
            responsive: {

                0: {
                    items: 1,
                    nav: true
                },
                320: {
                    items: 1,
                    nav: true
                },

                480: {
                    items: 2,
                    nav: true
                },

                992: {
                    items: 3,
                    nav: true
                },

                1000: {
                    items: 4,
                    nav: true
                }
            }
        });
    }
//---------------input type file-------------------
    if ($('.file').length) {
        var inp = $('.file');
        inp.on('change', function () {
            $('.file_btn').removeClass('active');
            var file_name = inp.val().replace("C:\\fakepath\\", '');
            $('.file_select').text(file_name);

            $('.file_btn').text('Заменить файл').addClass('active');

        });
    }
    $(".submenu_lk").on("mouseenter", function (e) {
        e.preventDefault();
        if (!$(this).next('.submenu2').hasClass('active')) {

            $(this).parent('li').siblings().find('.submenu2').removeClass('active');
            $(this).next('.submenu2').addClass('active');
        }
        else {
            $(this).next('.submenu2').removeClass('active');

        }
    });

    /*------modal window------*/
    var modalOpen = function (self) {
        var template = "<div class='modal_container'></div>";
        var height = $(window).height();
        var modal;
        if (!self) {
            modal = 'thanks';
        } else {
            modal = self.data('modal');
        }
        //console.log(modal);


        modalClose();
        $(template).prependTo('body');
        $('#' + modal).prependTo('.modal_container').addClass('active');
        $('.modal_container').css('height', height);
        $("body").addClass("show_modal");
        $("html").addClass("show_modal");

        document.addEventListener('touchmove', function (e) {
            if ($("body").hasClass("show_modal")) {
                e.preventDefault();
                return true;
            }
        });
    };
    $(".modal_btn").on("click", function () {

        var elem = $(this),
            elem_modal = elem.data('modal'),
            csrf = $('#csrf-token');
        if (elem_modal === 'basket') {
            var serializedForm = $('.add_to_cart_form').serializeArray(),
                formData = new FormData();

            formData.append(csrf.attr('name'), csrf.val());
            serializedForm.forEach(function (element) {
                formData.append(element.name, element.value);
            });

            $.ajax({
                url: '/ajax/add-to-cart',
                type: 'post',
                processData: false,
                contentType: false,
                dataType: 'json',
                data: formData,
                success: function (response) {
                    $('table.basket_tb tbody').html(response['cart_html']);
                    modalOpen(elem);
                }
            });
        } else {
            if (elem_modal === 'order') {
                $('.modal_box_order .order_count').html($('.modal_box_basket .basket_count').html());
            }
            if (elem_modal === 'city') {
                var something=$('#town option[value="'+$('#town_input').val()+'"]').data('message');
                if(something!=undefined&&something!=null){
                    $('#city').find('.modal_box_city span').html(something)
                }else{
                    $('#city').find('.modal_box_city span').html('Срок доставки в ваш город не указан!')
                }

            }
            modalOpen(elem);
        }

    });


    $('.modal_box_basket').on('click', '.basket_close', function () {
        var elem = $(this);

        //get csrf from under table start

        var formData = new FormData();
        var csrf = $('#csrf-token');
        formData.append(csrf.attr('name'), csrf.val());
        formData.append('prod_id', elem.data('prod_id'));


        $.ajax({
            url: '/ajax/delete-from-cart',
            type: 'post',
            processData: false,
            contentType: false,
            dataType: 'json',
            data: formData,
            success: function (response) {
                elem.closest('tbody').find('.basket_count').html(response);
                elem.closest('tr').remove();
                if ($('.basket_close').length < 1) {
                    modalClose();
                }
            }
        });


    });


    function modalClose() {
        if ($("body").hasClass("show_modal")) {
            $("body").removeClass("show_modal");
            $("html").removeClass("show_modal");
            $('.modal').appendTo('body').removeClass('active');
            $('.modal_container').remove();
            $("#menu_overlay").fadeOut();
        }
    }

    $(".modal_close, .modal_close_type").on("click", function () {
        modalClose();
    });

    $('.modal_box_order').on('click', '.modal_return', function () {
        modalOpen($(this));
    });

    $(window).on('click', function (e) {
        var modal = [].slice.call(document.body.getElementsByClassName('modal_container'));
        if (e.target == modal[0]) modalClose();
    });

//----for style select--------------
    $(".select select").on("click", function () {
        if (!$(this).parent().hasClass('active')) {
            $(this).parent().addClass('active');
        }
        else {
            $(this).parent().removeClass('active');
        }
    });

//----for open news content--------------
    $(".news_content").on("click", function () {
        $(this).parents('.main_news_item').siblings().find('.news_content_inner').removeClass('active');
        $(this).parents('.main_news_item').find('.news_content_inner').toggleClass('active');
        $(this).toggleClass('open');
    });

    $(document).on("click ontouchstart", function (event) {
        if ($(event.target).closest('.news_flex').length) return;
        $(".news_content_inner").removeClass("active");
        event.stopPropagation()
    })
    /*-------------open sub_menu responsive-----*/
    if ($(window).width() < 768) {
        $('.sub_menu_lk').on('click', function (e) {
            e.preventDefault();
            if (!$(this).hasClass('active')) {
                $(this).next().slideDown();
                $(this).addClass('active');
            }
            else {
                $(this).next().slideUp();
                $(this).removeClass('active');
            }

        });
    }
    /*---for responsive header nav movie---*/
    if ($(window).width() < 760) {

        console.log(111);
    }
    if ($(window).width() < 760) {
        $('.inner_description_img').insertAfter('.inner_description_text p');
    }
    /*------open menu gamber-------*/
    $('.menu_resp').on('click', function () {
        $("body").toggleClass("show_menu");
    });
    $('.menu_resp_close').on('click', function () {
        $("body").removeClass("show_menu");
    });

//------validation form------
    function checkEmail(currInput) {
        var pattern = /^([a-zA-Z0-9_-]+\.)*[a-zA-Z0-9_-]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)*\.[a-zA-Z]{2,4}$/;
        if (!pattern.exec(currInput.val())) {
            return false;
        }
        else {
            return true;
        }
      }
  function checkName(currInput){
    var pattern=/^[a-zA-Z][a-zA-Z0-9-_\.]{1,20}$/;
    if(!pattern.exec($(currInput).val())){
      return false;
    }
    else{
      return true;
    }
  }
  function checkPhone (currInput) {
    var pattern = /(\(?\d{3}\)?[\- ]?)?[\d\- ]{4,10}$/;
    if(!pattern.exec(currInput.val())){
      return false;
    }
    else{
      return true;
    }
  }

    if ($('.mm_ajax_more_news').length > 0) {
        $('.mm_ajax_more_news').click(function (e) {
            e.preventDefault();
            var csrf = $('#csrf-token'),
                elem = $(this);
            $.ajax({
                url: '/ajax/more-news',
                type: 'get',
                dataType: 'json',
                data: {
                    [csrf.attr('name')]: csrf.val(),
                    page: elem.data('page'),
                    per_page: elem.data('per_page'),
                    sortBy: elem.data('sort'),
                },
                success: function (response) {
                    var responseHtml = response['html'];
                    var news_block = $('.news_flex');
                    responseHtml.forEach(function (element) {
                        news_block.append(element);
                    });
                    elem.data('page', parseInt(elem.data('page')) + 1);
                    if (response['last'] === true || news_block.find('.main_news_item').length === elem.data('max')) {
                        elem.remove();
                    }
                }
            });
        })
    }


    $('.sendBtn').click(function (e) {
        e.preventDefault();

        var btn = this;
        var attr = $(this).data('modal');
        var attr1 = $(this).data('close');
        var errors = false;
        var currentForm = $(this).closest("form.formSend"),
            name = currentForm.find('input[name="name"]'),
            phone = currentForm.find('input[name="phone"]'),
            email = currentForm.find('input[name="email"]'),
            message = currentForm.find('textarea[name="message"]'),
            agreement = currentForm.find("input[name='agree']");
        if (agreement.length) {
            if (agreement.prop('checked') == false) {
                $("#agree").parent().addClass("invalid");
                errors = true;
            }
            else {
                $("#agree").parent().removeClass("invalid");
            }
        }

        if (email.length) {
            if (!email.val().length) {
                email.parent().addClass("invalid");
                errors = true;
            }
            else {
                email.parent().removeClass("invalid");
            }
            if (email.val().length && !checkEmail(email)) {
                email.parent().addClass("invalid1");
                errors = true;
            }
            else {
                email.parent().removeClass("invalid1");
            }
        }
        if (phone.length) {
            if (!phone.val().length || !checkPhone(phone)) {
                phone.parent().addClass("invalid");
                errors = true;
            }
            else {
                phone.parent().removeClass("invalid");
            }
        }
        if (name.length) {
            if (!name.val().length || name.val() == "ФИО") {
                name.parent().addClass("invalid");
                errors = true;
            }
            else {
                name.parent().removeClass("invalid");
            }
        }
        if (message.length) {
            if (!message.val().length || message.val() == " ") {
                message.parent().addClass("invalid");
                errors = true;
            }
            else {
                message.parent().removeClass("invalid");
            }
        }

        if (!errors) {
            var csrf = $('#csrf-token'),
                formData = new FormData();
            if (currentForm.hasClass('form_order')) {
                formData.append(csrf.attr('name'), csrf.val());

                currentForm.serializeArray().forEach(function (element) {
                    formData.append(element.name, element.value);
                });

                $.ajax({
                    url: '/ajax/create-order',
                    type: 'post',
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    data: formData,
                    success: function (response) {

                    }
                });
            }

            if (currentForm.hasClass('form_call') || currentForm.hasClass('contact_form_w_file')) {

                formData.append(csrf.attr('name'), csrf.val());
                currentForm.serializeArray().forEach(function (element) {
                    formData.append(element.name, element.value);
                });

                if (currentForm.hasClass('form_call')) {
                    formData.append('type', 'phone_request');
                } else {
                    formData.append('type', 'info_request');
                }

                if (currentForm.find('input[type="file"]').length && currentForm.find('input[type="file"]').val() !== '') {
                    formData.append('file', currentForm.find('input[type="file"]')[0].files[0], currentForm.find('.file_select').html())
                }

                $.ajax({
                    url: '/ajax/message-create',
                    type: 'post',
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    data: formData,
                    success: function (response) {
                        console.log(response)
                    }
                });
            }
            modalOpen();
            currentForm[0].reset();
        }
    });
    /*-------------main_news_box for 480------*/
    if ($('.main_news_box_inner').length) {
        var news = $('.owl-carousel').find('.main_news_item').eq(0).clone();
        var news2 = $('.owl-carousel').find('.main_news_item').eq(1).clone();
        news.appendTo('.owl-carousel-resp');
        news2.appendTo('.owl-carousel-resp');
    }

    /*------Crop text for catalog_item_content---*/
    function ContentItemCrop() {
        $('.catalog_item_content p').text(function (index, text) {
            var content = text.substr(0, 350);
            if ($(window).width() < 992) {
                content = text.substr(0, 159);
            }
            $('.catalog_item_content p').text(content);
        });
    }

    ContentItemCrop();
    /*-------open categories responsive---*/
    $(".header_supply_open").on("click", function () {
        $(this).toggleClass('active').next().slideToggle();
    });


    //--------------carousel for responsive table .offers_table------------------------------
    if ($(".inner_offers_carousel").length) {


        if ($(window).innerWidth() < 620) {

            var i = 0;
            $('.product_prev_btn').on('click', function () {
                var carousel_item = $(this).parent('.inner_offers_carousel').find('table.offers_table .offers_lk');
                console.log(carousel_item);
                $(carousel_item[i]).removeClass('active');
                i--;
                if (i < 0) {
                    i = carousel_item.length - 1;
                }
                $(carousel_item[i]).addClass('active');
            });

            $('.product_next_btn').on('click', function () {
                var carousel_item = $(this).parent('.inner_offers_carousel').find('table.offers_table .offers_lk');
                console.log(carousel_item);
                $(carousel_item[i]).removeClass('active');
                i++;
                if (i >= carousel_item.length) {
                    i = 0;
                }
                $(carousel_item[i]).addClass('active');
            });
        }
    }
});


function categoriesOpen() {
    var item = $("[class*=header_supply_item]");
    item.removeClass('hidden');
    item.slice(8).addClass('hidden');
    $('.header_supply_btn').text('Показать еще').removeClass('active');

}

function categoriesOpenSx() {
    var item = $("[class*=header_supply_item]");
    var details = $("[class*=header_details_item]");
    $('.header_supply_btn').text('Показать еще').removeClass('active');
    item.removeClass('hidden');
    details.removeClass('hidden');
    item.slice(6).addClass('hidden');
    details.slice(6).addClass('hidden');
}

function categoriesOpenButton(self) {
    var item = $("[class*=header_supply_item]");
    if (!self.hasClass('active')) {
        self.text('Скрыть').addClass('active');
        item.removeClass('hidden');
        console.log(11111);
    }
    else {
        self.text('Показать еще').removeClass('active');
        item.slice(8).addClass('hidden');
        console.log(22222);
    }
}

function categoriesOpenSxButton(self) {
    var item = $("[class*=header_supply_item]");
    var details = $("[class*=header_details_item]");
    if (!(self.hasClass('active'))) {
        console.log(44444);
        self.text('Скрыть').addClass('active');
        self.parents('.header_supply').find(item).removeClass('hidden');
        self.parent('.header_details').find(details).removeClass('hidden');
    } else {
        console.log(55555);
        self.text('Показать еще').removeClass('active');
        item.slice(6).addClass('hidden');
        details.slice(6).addClass('hidden');
    }

}

$('.header_supply_btn').on('click', function (e) {
    if ($(window).width() < 768 && $(window).width() >= 480) {
        categoriesOpenButton($(this));
    } else if ($(window).width() < 480) {
        categoriesOpenSxButton($(this));
    }
});
$(window).on('load resize', function () {
    if ($(window).width() < 768 || $(window).width() >= 480) {
        categoriesOpen();
    }
});
$(window).on('load resize', function () {
    if ($(window).width() < 480) {
        categoriesOpenSx();
    }
});
$(window).on('load resize', function () {
    var oldWidth = $(window).data("oldwidth");
    var newWidth = $(window).width();
    var widthMd = 1200;
    var widthSm = 992;
    var widthXs = 760;
    if (newWidth != oldWidth) {
        if (newWidth < widthMd && (!oldWidth || oldWidth >= widthMd)) {
            $('.breadcrumbs_box').prependTo('#content');
        }
        else if (newWidth >= widthMd && (!oldWidth || oldWidth < widthMd)) {
            $('.breadcrumbs_box').prependTo('.catalog_bl');

        }
        if (newWidth < widthSm && (!oldWidth || oldWidth >= widthSm)) {
            $('.footer_info_sub .info_sub_lk').insertAfter('.footer_info .header_call');
        }
        else if (newWidth >= widthSm && (!oldWidth || oldWidth < widthSm)) {
            $('.footer_info .info_sub_lk').insertAfter('.footer_info_sub_box');

        }
        if (newWidth < widthXs && (!oldWidth || oldWidth >= widthXs)) {
            $('.footer_info .info_sub_lk').insertAfter('.footer_info_sub_box');
            $('.header_nav').insertAfter('.header');
        }
        else if (newWidth >= widthXs && (!oldWidth || oldWidth < widthXs)) {
            $('.footer_info_sub .info_sub_lk').insertAfter('.footer_info_sub_box');
            $('.header_nav').insertAfter('.header_top_inner .menu_resp');


        }

        $(window).data("oldwidth", newWidth);
    }
});

  function initialize_slider(activate=false) {

    if($(".inner_offers").length){
      if($(window).innerWidth() < 620){

        if(!$(".inner_offers").hasClass("slider-active")||activate===true) {
          var el =  $(".inner_offers table tbody tr").filter( ':first' );
          el.addClass("active");
        }

        var i = $( ".inner_offers table tbody tr" ).index( $( ".inner_offers table tbody tr.active" ) );

        $('.inner_offers_prev').on('click', function(){
            var carousel_item = $('.inner_offers').find('table tbody tr');
          $(carousel_item[i]).removeClass('active');
          i--;
          if(i < 0){
            i = carousel_item.length - 1;
          }
          $(carousel_item[i]).addClass('active');
        });

        $('.inner_offers_next').on('click', function(){
          var carousel_item = $('.inner_offers').find('table tbody tr');
          $(carousel_item[i]).removeClass('active');
          i++;
          if(i >= carousel_item.length){
            i = 0;
          }
          $(carousel_item[i]).addClass('active');
        });
        $(".inner_offers").addClass("slider-active");
      }
    }

  }

  $(document).ready(function() {

    $(window).on("load resize", function() {

      initialize_slider(false);

    });

  });
  if($('.inner_offers').length>0){
    $(document).on('pjax:success', function() {
    initialize_slider(true);
    });
  }
