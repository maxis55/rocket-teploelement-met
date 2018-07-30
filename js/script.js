$(function(){
// IPad/IPhone
	var viewportmeta = document.querySelector && document.querySelector('meta[name="viewport"]'),
	ua = navigator.userAgent,

	gestureStart = function () {viewportmeta.content = "width=device-width, minimum-scale=0.25, maximum-scale=1.6";},

	scaleFix = function () {
		if (viewportmeta && /iPhone|iPad/.test(ua) && !/Opera Mini/.test(ua)) {
			viewportmeta.content = "width=device-width, minimum-scale=1.0, maximum-scale=1.0";
			document.addEventListener("gesturestart", gestureStart, false);
		}
	};
	scaleFix();
	// Menu Android
	if(window.orientation!=undefined){
    var regM = /ipod|ipad|iphone/gi,
     result = ua.match(regM)
    if(!result) {
     $('.menu li').each(function(){
      if($(">ul", this)[0]){
       $(">a", this).toggle(
        function(){
         return false;
        },
        function(){
         window.location.href = $(this).attr("href");
        }
       );
      } 
     })
    }
   } 
});

var ua=navigator.userAgent.toLocaleLowerCase(),
 regV = /ipod|ipad|iphone/gi,
 result = ua.match(regV),
 userScale="";
if(!result){
 userScale=",user-scalable=0"
}
document.write('<meta name="viewport" content="width=device-width,initial-scale=1.0'+userScale+'">')

//----Include-Function----
function include(url){ 
  document.write('<script src="'+ url + '"></script>'); 
}
if($(".owl-carousel").length){
   include("js/owl.carousel.min.js");
 }

$(document).ready(function(){
//-------Arrow up-------
    function goUp(){
      var windowHeight = $(window).height(),
        windowScroll = $(window).scrollTop();
        if(windowScroll>windowHeight/2){
          $('.arrow_up').addClass('active');
        }
        else{
          $('.arrow_up').removeClass('active');
        }
    }
    goUp();
    $(window).on('scroll',goUp);
    $('.arrow_up').on('click',function () {
      $('html,body').animate( { scrollTop: 0}, 1100 );
        return false;
    });
 //--owl-carousel--------------------  
  if($('.owl-carousel').length){
     $(".owl-carousel").owlCarousel({
       nav:true,
          items:5,
          responsiveClass:true,
          responsive : {
          
            0 : {
                  items :1, 
                  nav:true
             },
            320 : {
                  items:1,
                  nav:true
              },
          
            480 : {
                  items:2,
                  nav:true
              },
          
            992 : {
                items : 3,
                nav:true
              },
       
            1000 : {
                items : 4,
                nav:true
              }
          }
     });
  }
//---------------input type file-------------------
  if($('.file').length){
    var inp = $('.file');
    inp.on('change', function(){
       $('.file_btn').removeClass('active');
      var file_name = inp.val().replace( "C:\\fakepath\\", '' );
      $('.file_select').text( file_name);
      }).change(function(){
        $('.file_btn').text('Заменить файл').addClass('active');
      });
  }
 $(".submenu_lk").on("mouseenter", function(e){
    e.preventDefault();
    if(!$(this).next('.submenu2').hasClass('active')){

     $(this).parent('li').siblings().find('.submenu2').removeClass('active');
      $(this).next('.submenu2').addClass('active');
    }
    else{
      $(this).next('.submenu2').removeClass('active');
    
    }
  });

/*------modal window------*/
var modalOpen = function( self ){
    var template = "<div class='modal_container'></div>";
    var height = $(window).height();
    if (!self) {
      var modal = 'thanks';
    } else {
      var modal = self.data('modal');
    }
    console.log(modal);
  modalClose();
  $(template).prependTo('body');
  $('#' + modal).prependTo('.modal_container').addClass('active');
  $('.modal_container').css('height', height);
  $("body").addClass("show_modal");
  $("html").addClass("show_modal");
  
  document.addEventListener('touchmove', function(e) {
      if($("body").hasClass("show_modal")){
        e.preventDefault();
        return true;
      }
    });
}
 $(".modal_btn").on("click", function(){
    modalOpen($(this));
 });

 

function modalClose() {
  if($("body").hasClass("show_modal")){
    $("body").removeClass("show_modal");
    $("html").removeClass("show_modal");
    $('.modal').appendTo('body').removeClass('active');
    $('.modal_container').remove();
    $("#menu_overlay").fadeOut();
  }
}
$(".modal_close, .modal_close_type").on("click", function(){
  modalClose();
}); 

$(window).on('click', function(e){
  var modal = [].slice.call(document.body.getElementsByClassName('modal_container'));
  if ( e.target == modal[0] ) modalClose();
});

//----for style select--------------
  $(".select select").on("click", function(){
    if(!$(this).parent().hasClass('active')){
      $(this).parent().addClass('active');
    }
    else{
      $(this).parent().removeClass('active');
    }
  });

//----for open news content--------------
$(".news_content").on("click", function(){
  $(this).parents('.main_news_item').siblings().find('.news_content_inner').removeClass('active');
  $(this).parents('.main_news_item').find('.news_content_inner').toggleClass('active');
  $(this).toggleClass('open');
});

$(document).on("click ontouchstart", function(event){
    if($(event.target).closest('.news_flex').length)return;
    $(".news_content_inner").removeClass("active");
    event.stopPropagation()
})
/*-------------open sub_menu responsive-----*/
if($(window).width() < 768){
  $('.sub_menu_lk').on('click', function(e){
    e.preventDefault();
    if(!$(this).hasClass('active')){
      $(this).next().slideDown();
      $(this).addClass('active');
    }
    else{
      $(this).next().slideUp();
      $(this).removeClass('active');
    }

  });
}
/*---for responsive header nav movie---*/
if($(window).width() < 760){
  $('.header_nav').insertAfter('.header');
  console.log(111);
}
if($(window).width() < 760){
  $('.inner_description_img').insertAfter('.inner_description_text p');
}
/*------open menu gamber-------*/
   $('.menu_resp').on('click', function(){
    $("body").toggleClass("show_menu");
  });
  $('.menu_resp_close').on('click', function(){
    $("body").removeClass("show_menu");
  });

//------validation form------
  function checkEmail(currInput){
    var pattern=/^([a-zA-Z0-9_-]+\.)*[a-zA-Z0-9_-]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)*\.[a-zA-Z]{2,4}$/;
      if(!pattern.exec(currInput.val())){
          return false;
        }
        else{
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



  $('.sendBtn').click(function(e){
    e.preventDefault();

    var btn = this;
    var attr = $(this).data('modal');
    var attr1 = $(this).data('close');
    var errors = false;
        var currentForm = $(this).closest("form.formSend"),
        name = currentForm.find('input[name="name"]'),
        phone = currentForm.find('input[name="phone"]'),
        email = currentForm.find('input[name="email"]'),
       messadge = currentForm.find('textarea[name="message"]');

    if($("input[name='agree']").prop('checked')==false){
        $("#agree").parent().addClass("invalid");
        errors = true;
    }
    else{
      $("#agree").parent().removeClass("invalid");
    }
    if(email.length){
      if(!email.val().length){
        email.parent().addClass("invalid");
        errors = true;
      }
      else{
        email.parent().removeClass("invalid");
      }
      if(email.val().length && !checkEmail(email)){
        email.parent().addClass("invalid1");
        errors = true;
      }
      else{
        email.parent().removeClass("invalid1");
      }
    }
    if(phone.length){
      if(!phone.val().length || !checkPhone(phone)){
        phone.parent().addClass("invalid");
        errors = true;
      }
      else{
        phone.parent().removeClass("invalid");
      }
    }
    if(name.length){
      if(!name.val().length || name.val() =="ФИО"){
        name.parent().addClass("invalid");
        errors = true;
    }
      else{
        name.parent().removeClass("invalid");
      }
    }
   if(messadge.length){
      if(!messadge.val().length || messadge.val() ==" "){
        messadge.parent().addClass("invalid");
        errors = true;
    }
      else{
        messadge.parent().removeClass("invalid");
      }
    }
    console.log(errors);
    if(!errors){
       console.log('333');
        modalOpen();

    }
  });
    /*-------------main_news_box for 480------*/
    if($('.main_news_box_inner').length){
      var news = $('.owl-carousel').find('.main_news_item').eq(0).clone();
      var news2 = $('.owl-carousel').find('.main_news_item').eq(1).clone();
      news.appendTo('.owl-carousel-resp');
      news2.appendTo('.owl-carousel-resp');
    }
    if($(window).width() < 1200){
        $('.breadcrumbs_box').prependTo('#content');
    }
    /*------Crop text for catalog_item_content---*/
    function ContentItemCrop(){
      $('.catalog_item_content p').text(function(index, text){
      var content = text.substr(0,350);
      if($(window).width() < 992){
        content= text.substr(0,159);
      }
        $('.catalog_item_content p').text(content);
      });
    }
    ContentItemCrop();
/*-------open categories responsive---*/
  $(".header_supply_open").on("click", function(){
    $(this).toggleClass('active').next().slideToggle();
  });
/*-----------for responsive page product----*/
  if($(window).width() < 760){
      $('.product_counter_box').appendTo('.product_info_inner');
   
  }
  //--------------carousel for responsive table .offers_table------------------------------
    if($(".inner_offers_carousel").length){

    
      if($(window).innerWidth() < 620){
          
        var i = 0;
        $('.product_prev_btn').on('click', function(){
            var carousel_item = $(this).parent('.inner_offers_carousel').find('table.offers_table .offers_lk');
          console.log(carousel_item);
          $(carousel_item[i]).removeClass('active');
          i--;
          if(i < 0){
            i = carousel_item.length - 1;
          }
          $(carousel_item[i]).addClass('active');
        });

        $('.product_next_btn').on('click', function(){
          var carousel_item = $(this).parent('.inner_offers_carousel').find('table.offers_table .offers_lk');
             console.log(carousel_item);
          $(carousel_item[i]).removeClass('active');
          i++;
          if(i >= carousel_item.length){
            i = 0;
          }
          $(carousel_item[i]).addClass('active');
        });
      }
    }
});



function categoriesOpen(){
  var item = $("[class*=header_supply_item]");
  item.removeClass('hidden');
  item.slice(8).addClass('hidden');
  $('.header_supply_btn').text('Показать еще').removeClass('active');

}
function categoriesOpenSx(){
      var item = $("[class*=header_supply_item]");
      var details = $("[class*=header_details_item]");
       $('.header_supply_btn').text('Показать еще').removeClass('active');
      item.removeClass('hidden');
      details.removeClass('hidden');
      item.slice(6).addClass('hidden');
      details.slice(6).addClass('hidden');
}
function categoriesOpenButton( self ){
  var item = $("[class*=header_supply_item]");
  if(!self.hasClass('active')){
      self.text('Скрыть').addClass('active');
      item.removeClass('hidden');
      console.log(11111);
    }
    else{
      self.text('Показать еще').removeClass('active');
       item.slice(8).addClass('hidden');
       console.log(22222);
  }
}
function categoriesOpenSxButton( self ){
  var item = $("[class*=header_supply_item]");
  var details = $("[class*=header_details_item]");
    if(!(self.hasClass('active'))){
    console.log(44444);
      self.text('Скрыть').addClass('active');
      self.parents('.header_supply').find(item).removeClass('hidden');
      self.parent('.header_details').find(details).removeClass('hidden');
    } else{
      console.log(55555);
      self.text('Показать еще').removeClass('active');
       item.slice(6).addClass('hidden');
      details.slice(6).addClass('hidden');
     }
    
}

$('.header_supply_btn').on('click', function(e){
  if($(window).width() < 768 && $(window).width() >= 480){
    categoriesOpenButton( $(this) );
  } else if($(window).width() < 480){
    categoriesOpenSxButton( $(this) );
  }
});
  $(window).on('load resize', function() {
    if($(window).width() < 768 || $(window).width() >= 480){
      categoriesOpen();
    }
  });
  $(window).on('load resize', function() {
    if($(window).width() < 480){
      categoriesOpenSx();
    }
  });
$(window).on('load resize', function() {
    var oldWidth = $(window).data("oldwidth");
    var newWidth = $(window).width();
    var widthSm  = 992;
    var widthXs  = 760;
    if (newWidth != oldWidth) {
      if (newWidth < widthSm && (!oldWidth || oldWidth >= widthSm)) {
        $('.footer_info_sub .info_sub_lk').insertAfter('.footer_info .header_call');
      }
      else if (newWidth >= widthSm && (!oldWidth || oldWidth < widthSm)) {
         $('.footer_info .info_sub_lk').insertAfter('.footer_info_sub_box');
     
      }
      if (newWidth < widthXs && (!oldWidth || oldWidth >= widthXs)) {
        $('.footer_info .info_sub_lk').insertAfter('.footer_info_sub_box');
     
            
        }
      else if (newWidth >= widthXs && (!oldWidth || oldWidth < widthXs)) {
         $('.footer_info_sub .info_sub_lk').insertAfter('.footer_info_sub_box');
      
      }
   
      $(window).data("oldwidth", newWidth);
    }
  });



