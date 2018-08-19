<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\web\View;
use yii\widgets\Menu;
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
<body class="home">
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
											<img src="images/icons/logo.svg" alt="">
										</span>
									</a>
								</div>
								<button class="menu_resp"></button>
						  		<div class="header_nav">
						  			<nav><?php echo $this->params['header_nav']; ?></nav>
									<div class="header_info_sub">
										<div class="header_info_sub_box">
											<span>Минимальные сроки</span>
											<span>Отличные цены</span>
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
	<div class="catalog_bl">
			<div class="container">
				<div class="container_inner">
					<h2 class="title1"><span>Мы предлагаем</span></h2>
					<div class="header_offers">
						<div class="header_supply_box">

							<div class="header_offers_title"><h3 class="title2">Поставки<span>металлопроката</span></h3></div>
							<span class="header_supply_open"></span>
							<div class="header_supply"> 
							  <div class="header_supply_item1">
									<div class="header_supply_img">
									</div>
									<a href="#" class="categories_name">Трубы</a>
								</div>
								<div class="header_supply_item2">
									<div class="header_supply_img">
									</div>
									<a href="#" class="categories_name">Листы</a>
								</div>
								<div class="header_supply_item3">
									<div class="header_supply_img">
										
									</div>
									<a href="#" class="categories_name">Швеллера</a>
								</div>
								<div class="header_supply_item4">
									<div class="header_supply_img">
									</div>
									<a href="#" class="categories_name">Уголок</a>
								</div>
								<div class="header_supply_item5">
									<div class="header_supply_img">
									</div>
									<a href="#" class="categories_name">Балка</a>
								</div>
								<div class="header_supply_item6">
									<div class="header_supply_img">
									</div>
									<a href="#" class="categories_name">Арматура</a>
								</div>
								<div class="header_supply_item7">
									<div class="header_supply_img">
									</div>
									<a href="#" class="categories_name">Проволока</a>
								</div>
								<div class="header_supply_item8">
									<div class="header_supply_img">
									</div>
									<a href="#" class="categories_name">Круг</a>
								</div>
								<div class="header_supply_item9">
									<div class="header_supply_img">
									</div>
									<a href="#" class="categories_name">Шестигранник</a>
								</div>
								<div class="header_supply_item10">
									<div class="header_supply_img">
									</div>
									<a href="#" class="categories_name">Квадрат</a>
								</div>
								<div class="header_supply_item11">
									<div class="header_supply_img">
									</div>
									<a href="#" class="categories_name">Полоса</a>
								</div>
								<div class="header_supply_item12">
									<div class="header_supply_img">
									</div>
									<a href="#" class="categories_name">Рельсы</a>
								</div>
								<div class="header_supply_item13">
									<div class="header_supply_img">
									</div>
									<a href="#" class="categories_name">Поковка</a>
								</div>
								<div class="header_supply_item14">
									<div class="header_supply_img">
									</div>
									<div class="categories_open">
											<a href="#" class="categories_name">Сетка</a>
											<div class="categories">
													<ul class="submenu">
														<li><a href="">сетка сварная</a></li>
														<li><a href="#" class="submenu_lk">сетка тканая</a>
												      <ul class="submenu2">
																<li><a href="">сетка сварная</a></li>
																<li><a href="">сетка тканая</a>
																<li><a href="">сетка нержавеющая</a></li>
														    <li><a href="">сетка плетенная рабица</a></li>
														    <li><a href="">сетка тканая</a>
															</ul>
												
														</li>
														<li><a href="#" class="submenu_lk">сетка нержавеющая</a>
															<ul class="submenu2">
																<li><a href="">сетка сварная</a></li>
																<li><a href="">сетка тканая</a>
																<li><a href="">сетка нержавеющая</a></li>
														  </ul>
														</li>
														<li><a href="">сетка плетенная рабица</a></li>
												 </ul>
											</div>
									</div>
								</div>
								<button class="header_supply_btn more_white_btn"><span>Показать еще</span></button>
							</div>
						</div>
						<div class="header_details_box">
							<div class="header_offers_title"><h3 class="title2">Детали <span>трубопровода</span></h3></div>
							<span class="header_supply_open"></span>
							<div class="header_details">
								<div class="header_details_item1">
									<div class="header_details_img">
									</div>
									<a href="#" class="categories_name">Отводы</a>
								</div>
								<div class="header_details_item2">
									<div class="header_details_img">
									</div>
									<a href="#" class="categories_name">Переходы</a>
								</div>
								<div class="header_details_item3">
									<div class="header_details_img">
										
									</div>
									<a href="#" class="categories_name">Тройники</a>
								</div>
								<div class="header_details_item4">
									<div class="header_details_img">
									</div>
									<a href="#" class="categories_name">Заглушки</a>
								</div>
								<div class="header_details_item5">
									<div class="header_details_img">
									</div>
									<a href="#" class="categories_name">Фланцы</a>
								</div>
								<div class="header_details_item6">
									<div class="header_details_img">
									</div>
									<a href="#" class="categories_name">Опоры</a>
								</div>
								<div class="header_details_item7">
									<div class="header_details_img">
									</div>
									<a href="#" class="categories_name">Сгоны</a>
								</div>
								<div class="header_details_item8">
									<div class="header_details_img">
									</div>
									<a href="#" class="categories_name">Муфты</a>
								</div>
							  <button class="header_supply_btn more_white_btn"><span>Показать еще</span></button>
							</div>
						</div>
					</div>
				</div>
			</div>
	</div>

	<?= $content ?>

 <!--FOOTER  -->
	<footer class="footer">
		<div class="container">
		
			<div class="footer_inner">
				<div class="arrow_up_box">
			    <div>
			        <a href="#up" data-action="scroll-up" class="arrow_up active"></a>
			    </div>
	 	  	</div>
				<div class="footer_nav">
					<nav><?php echo $this->params['footer_nav']; ?></nav>
					<div class="footer_info_sub">
						<div class="footer_info_sub_box">
							<span>Минимальные сроки</span>
							<span>Отличные цены</span>
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
									<a href="index.html" class="logo_lk">
										<span class="logo_top">
											<img src="images/icons/logo.svg" alt="">
										</span>
									</a>
								</div>
						<div class="copyright">
							<span>Copyright 2018</span>
							<span>Все права защищены</span>
						</div>
					
					</div>
				</div>
			</div>
    </div>
	</footer>
	<!--FOOTER END-->
	<!--modal popup  -->
	<div class="modal" id="city" style="background:url(images/bg_modal_thanks.jpg) 0 0 no-repeat;background-size: cover;">
		 <div class="modal_content">
		 	 <div class="modal_close" onclick="modal_close(this)"></div>
		 	  <div class="modal_box_city">
		 	  	<span>Доставка в ваш город осуществляется <span class="delivery_time">7</span> рабочих дней.</span>
		 	  </div>
		 </div>
	</div>
  <div class="modal" id="request" style="background:url(images/bg_modal_thanks.jpg) 0 0 no-repeat;background-size: cover;">
    <div class="modal_content">
    	<div class="modal_content_inner">
        <div class="modal_close" onclick="modal_close(this)"></div>
        <div class="modal_box_request">
        	<h2 class="title3">Оставить заявку</h2>
        	<span class="modal_request_mess">Заполните заявку, и в ближайшее время мы с вами свяжемся</span>
        	<form class="formSend form_call">
        		<div class="form_item user">
							<input type="text" placeholder="ФИО" name="name"  onblur="if(this.placeholder==''){this.placeholder='ФИО';this.classList.remove('hide');}" onfocus="if(this.placeholder =='ФИО'){this.placeholder='';this.classList.add('hide');}">
						</div>
						<div class="form_item phone">
							<input type="tel" placeholder="Телефон" name="phone" onblur="if(this.placeholder==''){this.placeholder='Телефон';this.classList.remove('hide');}" onfocus="if(this.placeholder =='Телефон' ){this.placeholder='';this.classList.add('hide');}">
						</div>
						<div class="form_item mes">
							<textarea placeholder="Сообщение" name="message" onblur="if(this.placeholder==''){this.placeholder='Сообщение';this.classList.remove('hide');}" onfocus="if(this.placeholder =='Сообщение' ){this.placeholder='';this.classList.add('hide');}"></textarea>
						</div>
						<div class="form_item modal_file">
							<label for="file1" class="label_select_file">
								<span class="file_btn">Прикрепить файл</span>
								<span class="file_select"></span>
								<input type="file" name="file" id="file1" class="file">
							</label>
							<button class="blue_btn sendBtn">Отправить</button>
						</div>
        	</form>
				</div>
			</div>
    </div>
  </div>
  <div class="modal" id="thanks" style="background:url(images/bg_modal_thanks.jpg) 0 0 no-repeat;background-size: cover;">
    <div class="modal_content">
    	<div class="modal_content_inner">
        <div class="modal_close"></div>
        <div class="modal_box_thanks">
        	<div class="box_thanks_title">Спасибо</div>
        	<span>за ваше сообщение, мы ответим Вам в ближайшее время!</span>
				</div>
			</div>
    </div>
  </div>
  <div class="modal" id="call" style="background:url(images/bg_modal_call.jpg) 0 0 no-repeat;background-size: cover;">
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
					  	<input type="checkbox" id="agree" name="agree">
							<label for="agree" class="data_mes_label">Нажимая на кнопку, Вы даете свое согласие на обработку<a href="#" class="data_mes_lk">персональных данных</a></label>
						</div>
						<div class="form_item al_center">
							<button class="blue_btn sendBtn" type="submit">Заказать звонок</button>
						</div>
					</form>
        </div>
			</div>
    </div>
  </div>
 	<div class="modal" id="order" style="background:url(images/bg_modal_order.jpg) 0 0 no-repeat;background-size: cover;">
		<div class="modal_content">
			<div class="modal_content_inner">
				<div class="modal_close"></div>
				<div class="modal_box_order">
					<h2 class="title3">Оформить заказ</h2>
			    <div class="order_item_box">
						<span class="order_mes">готово к показу</span>
						<span class="order_count"><span>2</span> позиции</span>
					</div>
					<div class="order_item_trip">
						<span>* - поля обязательные для заполнения</span>
					</div>
					<form class="formSend form_order">
							<div class="form_item user">
								<input type="text" placeholder="ФИО" name="name"  onblur="if(this.placeholder=='') this.placeholder='ФИО'" onfocus="if(this.placeholder =='ФИО'){this.placeholder='';this.classList.add('hide');}">
							</div>
							<div class="form_item flex">
								<div class="form_item_type phone">
								  <input type="tel" placeholder="Телефон" name="phone" onblur="if(this.placeholder==''){this.placeholder='Телефон';this.classList.remove('hide');}" onfocus="if(this.placeholder =='Телефон' ){this.placeholder='';this.classList.add('hide');}">
						    </div>
						    <div class="form_item_type email">
								  <input type="email" placeholder="E-mail" name="email" onblur="if(this.placeholder==''){this.placeholder='E-mail';this.classList.remove('hide');}" onfocus="if(this.placeholder =='E-mail' ){this.placeholder='';this.classList.add('hide');}">
						    </div>
							</div>
							<div class="form_item mes">
							<textarea placeholder="Сообщение" name="message" onblur="if(this.placeholder==''){this.placeholder='Сообщение';this.classList.remove('hide');}" onfocus="if(this.placeholder =='Сообщение' ){this.placeholder='';this.classList.add('hide');}"></textarea>
						  </div>
							<div class="form_item">
						  	<input type="checkbox" name="agree" id="agree1">
								<label for="agree1" class="data_mes_label">Нажимая на кнопку, Вы даете свое согласие на обработку <a href="#" class="data_mes_lk"> персональных данных</a></label>
							</div>
						  <div class="form_item al_center">
						  	<a href="index.html" class="white_btn">Вернуться</a>
						  	<button class="blue_btn sendBtn">Оформить заказ</button>
						  </div>

					</form>
				</div>
			</div>
		</div>
	</div>
	<!--TMP END  -->
	<?php $this->endBody() ?>
	</body>

</html>
<?php $this->endPage() ?>