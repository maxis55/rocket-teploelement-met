<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\web\View;
use app\assets\AppAsset;

AppAsset::register($this);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
	<meta charset="<?= Yii::$app->charset ?>">
	<title><?= Html::encode($this->title) ?></title>
  	<meta name = "format-detection" content = "telephone=no" />
	<meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0">
	<link rel="shortcut icon" href="<?= Yii::$app->request->baseUrl ?>/images/favicon/logo.ico" type="image/x-icon">
	<?= Html::csrfMetaTags() ?>
	<?php
	$this->registerJs(
	    '!function(){function e(e,t,n){e.addEventListener?e.addEventListener(t,n,!1):e.attachEvent&&e.attachEvent("on"+t,n)}function t(e){return window.localStorage&&localStorage.font_css_cache&&localStorage.font_css_cache_file===e}function n(){if(window.localStorage&&window.XMLHttpRequest)if(t(o))a(localStorage.font_css_cache);else{var n=new XMLHttpRequest;n.open("GET",o,!0),e(n,"load",function(){4===n.readyState&&(a(n.responseText),localStorage.font_css_cache=n.responseText,localStorage.font_css_cache_file=o)}),n.send()}else{var c=document.createElement("link");c.href=o,c.rel="stylesheet",c.type="text/css",document.getElementsByTagName("head")[0].appendChild(c),document.cookie="font_css_cache"}}function a(e){var t=document.createElement("style");t.innerHTML=e,document.getElementsByTagName("head")[0].appendChild(t)}var o="fonts.css";window.localStorage&&localStorage.font_css_cache||document.cookie.indexOf("font_css_cache")>-1?n():e(window,"load",n)}();',
	View::POS_HEAD );
	?>
	<?php $this->head() ?>
</head>
<body>
	<?php $this->beginBody() ?>
<!--=============modal window overlay===============-->
<div id="menu_overlay"></div>
<!--HEADER START-->
	<header>
	    <div class="header">
	    	<div class="header_top">
					<div class="container">
						<div class="container_inner">
							<div class="header_top_inner">
								<div class="logo">
									<a href="/" class="logo_lk">
										<span class="logo_top">
											<img src="<?= Yii::$app->request->baseUrl ?>/images/icons/logo.svg" alt="">
										</span>
									</a>
								</div>
								<button class="menu_resp"></button>
						  	<div class="header_nav">
									<nav><?php echo $this->params['header_nav']; ?></nav>
									<div class="header_info_sub">
										<div class="header_info_sub_box">
											<span><?php echo $this->params['cross_pages_data']['header_text_1']; ?></span>
											<span><?php echo $this->params['cross_pages_data']['header_text_2']; ?></span>
										</div>
										<a href="mailto:<?php echo $this->params['cross_pages_data']['email']; ?>" class="info_sub_lk"><?php echo $this->params['cross_pages_data']['email']; ?></a>
									</div>
								</div>
								<div class="header_info">
									<a href="tel:+7(351)2239392" class="header_info_lk"><?php echo $this->params['cross_pages_data']['phone1']; ?></a>
									<a href="tel:+7(951)2239392" class="header_info_lk"><?php echo $this->params['cross_pages_data']['phone2']; ?></a>
									<div class="header_call">
										<button class="blue_btn modal_btn" data-modal="call">Заказать звонок</button>
										<button class="orange_btn modal_btn" data-modal="call"></button>
									</div>
									<button class="menu_resp_close"></button>
								</div>
							</div>
						</div>
	        </div>
	      </div>
				<div class="header_middle">
					<div class="container">
						<div class="container_inner">
							<div class="header_messadge">Комплексные поставки<br><span>металлопроката</span><span> и деталей трубопровода</span></div>
						</div>
					</div>
				</div>
	
			</div>
	</header>
	<!--HEADER END-->

	<?= $content ?>

 <!--FOOTER  -->
	<footer class="footer">
		<div class="container">
			<div class="footer_inner">
				<div class="footer_nav">
					<nav><?php echo $this->params['footer_nav']; ?></nav>

					<div class="footer_info_sub">
						<div class="footer_info_sub_box">
							<span><?php echo $this->params['cross_pages_data']['header_text_1']; ?></span>
							<span><?php echo $this->params['cross_pages_data']['header_text_2']; ?></span>
						</div>
						<a href="mailto:<?php echo $this->params['cross_pages_data']['email']; ?>" class="info_sub_lk"><?php echo $this->params['cross_pages_data']['email']; ?></a>
					</div>
				</div>
				<div class="footer_info">
					<div class="footer_info_title">Наш телефон:</div>
					<a href="tel:+7(351)2239392" class="header_info_lk"><?php echo $this->params['cross_pages_data']['phone1']; ?></a>
					<a href="tel:+7(951)2239392" class="header_info_lk"><?php echo $this->params['cross_pages_data']['phone2']; ?></a>
					<div class="header_call">
						<button class="blue_btn modal_btn" data-modal="call">Заказать звонок</button>
					</div>
				</div>
				<div class="footer_info_logo">
					<div class="footer_logo_box">
						<div class="logo">
							<a href="/" class="logo_lk">
								<span class="logo_top">
									<img src="<?= Yii::$app->request->baseUrl ?>/images/icons/logo.svg" alt="">
								</span>
							</a>
						</div>
						<div class="copyright">
							<span><?php echo $this->params['cross_pages_data']['copyright']; ?></span>
						</div>
					
					</div>
				</div>
			</div>
    	</div>
	</footer>
	<!--FOOTER END-->
	<?php include('modal_call.php') ?>
  <div class="modal" id="basket" style="background:url(<?= Yii::$app->request->baseUrl ?>/images/bg_modal_basket.png) 0 0 no-repeat;background-size: cover;">
    <div class="modal_content_basket">
       <div class="modal_box_basket">
        	<div class="box_basket_top">
        		<span class="basket_top_title">Корзина
        			<span></span>
        		</span>
        		<button class="basket_btn modal_btn" data-modal="order"></button>
        	</div>
        	<div class="box_basket">
        		<table class="basket_tb">
        			<tbody>
        				<tr>
        					<th class="cell1">Наименование</th>
        					<th class="cell2">Количество</th>
        					<th class="cell3"></th>
        				</tr>
        				<tr>
        					<td class="cell1">Труба 15х15х1.5 ГОСТ 13663-86 cnfkm 2сп</td>
        					<td class="cell2">
        						<div class="counter-wrapper">
											<div class="counter-box">
												<button class="counter-minus"></button>
												<input class="counter-qt" value="1">
												<button class="counter-plus"></button>
											</div>
										</div>
									</td>
        					<td class="cell3"><span class="basket_close"></span></td>
        				</tr>
        				<tr>
        					<td class="cell1">Труба 15х15х1.5 ГОСТ 13663-86 cnfkm 2сп</td>
        					<td class="cell2">
        						<div class="counter-wrapper">
											<div class="counter-box">
												<button class="counter-minus"></button>
												<input class="counter-qt" value="1">
												<button class="counter-plus"></button>
											</div>
										</div>
									</td>
        					<td class="cell3"><span class="basket_close"></span></td>
        				</tr>
        				<tr >
        					<td colspan="3" class="basket_total">
        						<table class="basket_inner_tb">
        							<tbody>
        								<tr>
			        					<td class="cell1 basket_mes_td">
			        						<span class="basket_count_mes">готово к показу</span>
			        						<span class="basket_count">2</span> позиции
			        					</td>
			        					<td class="al_right">
        									<button class="white_btn">Очистить все</button>
        								</td>
			        				 </tr>
			        				</tbody>
			        			</table>
        				 </td>
        					
        				</tr>
        			</tbody>
        		</table>
        	</div>
        	<div class="box_basket_bottom">
        		<button class="white_btn modal_close_type">Продолжить покупки</button>
        	  <button class="blue_btn modal_btn" data-modal="order">Оформить заказ</button>
					</div>
			</div>
		</div>
  </div>
  <div class="modal" id="thanks" style="background:url(<?= Yii::$app->request->baseUrl ?>/images/bg_modal_thanks.jpg) 0 0 no-repeat;background-size: cover;">
    <div class="modal_content">
    	<div class="modal_content_inner">
        <div class="modal_close" onclick=""></div>
        <div class="modal_box_thanks">
        	<div class="box_thanks_title">Спасибо</div>
        	<span>за ваше сообщение, мы ответим Вам в ближайшее время!</span>
				</div>
			</div>
    </div>
  </div>
  <div class="modal" id="call" style="background:url(<?= Yii::$app->request->baseUrl ?>/images/bg_modal_call.jpg) 0 0 no-repeat;background-size: cover;">
    <div class="modal_content">
    	<div class="modal_content_inner">
        <div class="modal_close" onclick=""></div>
        <div class="modal_box_call">
        	<div class="modal_call_logo"></div>
        	<h2 class="title3">Обратный звонок</h2>
    			<form class="formSend form_call">
						<div class="form_item user">
							<input type="text" placeholder="ФИО" name="name"  onblur="if(this.placeholder==''){this.placeholder='ФИО';this.classList.remove('hide');}" onfocus="if(this.placeholder =='ФИО'){this.placeholder='';this.classList.add('hide');}">
						</div>
						<div class="form_item phone">
							<input type="tel" placeholder="Телефон" name="phone" onblur="if(this.placeholder==''){this.placeholder='Телефон';this.classList.remove('hide');}" onfocus="if(this.placeholder =='Телефон' ){this.placeholder='';this.classList.add('hide');}">
							</div>
					  <div class="form_item">
					  	<input type="checkbox" id="agree1" name="agree">
							<label for="agree1" class="data_mes_label">Нажимая на кнопку, Вы даете свое согласие на обработку<a href="#" class="data_mes_lk">персональных данных</a></label>
						</div>
						<div class="form_item al_center">
							<button class="blue_btn sendBtn" type="submit">Заказать звонок</button>
						</div>
					</form>
        </div>
			</div>
    </div>
  </div>
	<!--TMP END  -->
	<?php $this->endBody() ?>
	<?php
	if ( Yii::$app->controller->action->id=='contact' ){
		$this->registerJs(
		    '//--------------googlemaps---------
			  if ($(".map").length){

			  	function initMap(){

			 		var element = document.getElementById("map_box");
			 		console.log(element);
			 		var options ={
			 			zoom:5,
			 			center:{lat:55.7558, lng:37.6173},
			 			panControl: false,
	      		zoomControl: true,
	      		mapTypeControl: false,
	      		scrollwheel: false
					};
			 		var mapMockow = new google.maps.Map(element, options);
			 		addMarker({lat:55.7558, lng:37.6173});

				 		function addMarker(coordinates){
					 		var marker = new google.maps.Marker({
					 			position:coordinates,
					 			map:mapMockow,
					 			icon:"'.Yii::$app->request->baseUrl.'./images/icons/marker.png"
				 			});
				 		}
			  	}
			  }',
		View::POS_END );
		?><script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB53L7PG3UE9qtFIcdoXay7OFo1vXmX9aU&callback=initMap"></script><?php
	}
	?>
	</body>

</html>
<?php $this->endPage() ?>