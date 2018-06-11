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


$(document).ready(function(){
 
  //---------------input type file-------------------
  if($('#file').length){
    var inp = $('#file');
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

//--------------modal window------
   $(".modal_btn").on("click", function(){
      var template = "<div class='modal_container'></div>";
      var height = $(window).height();
      var modal = $(this).data('modal');
      console.log(height);
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
   });
   $(".modal_close").on("click", function(){
        if($("body").hasClass("show_modal")){
          $("body").removeClass("show_modal");
          $("html").removeClass("show_modal");
          $('.modal').appendTo('body').removeClass('active');
          $('.modal_container').remove();
          $("#menu_overlay").fadeOut();

        }
      $("#menu_overlay").on("click", function(){
        if($("body").hasClass("show_modal")){
          $("body").removeClass("show_modal");
          $("html").removeClass("show_modal");
          $('.modal').removeClass('active');
          $(this).fadeOut();
        }
    })
    
   });
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
        email = currentForm.find('input[name="email"]');
        messadge = currentForm.find('textarea[name="message"]');
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
        //modal_open(btn, attr, attr1);

    }
  });
$(window).on('load resize', function() {
    
    var oldWidth = $(window).data("oldwidth");
    var newWidth = $(window).width();
    var widthSm  = 992;
      if (newWidth != oldWidth) {
        if (newWidth < widthSm && (!oldWidth || oldWidth >= widthSm)) {
            
          console.log(111);
              
          }
        else if (newWidth >= widthSm && (!oldWidth || oldWidth < widthSm)) {
            
          console.log(222);
        }
     
        $(window).data("oldwidth", newWidth);
      }
  });