<?php 

use yii\helpers\Url;

?>

	<!-- MAIN CONTENT Start-->
	<div class="catalog_bl">
		<div class="breadcrumbs_box">
			<div class="container">
				<div class="container_inner">
					<ul class="breadcrumbs">
						<li>
		          <a class="breadcrumbs_main" href="/">Главная</a>/
		        </li>
							<li>
					          <a class="breadcrumbs_main" href="<?= Url::toRoute(['site/catalog-category', 'category' => $breadcrumbs[0][1]]) ?>"><?= $breadcrumbs[0][0] ?></a>/
					        </li>
				        <?php if (isset($breadcrumbs[1])) { ?>
							<li>
					          <a class="breadcrumbs_main" href="<?= Url::toRoute(['site/catalog-subcategory', 'category' => $breadcrumbs[0][1], 'subcategory' => $breadcrumbs[1][1]]) ?>"><?= $breadcrumbs[1][0] ?></a>/
					        </li>
				        <?php } ?>
		        <li>
		          <span class="breadcrumbs_current"><?= $category['name'] ?></span>
		        </li>
		      </ul>
		    </div>
	     </div>
    	</div>
		<?php include('catalog_bl.php'); ?>
	</div>
	<div id="content">

		<div class="container">
			<div class="container_inner">
        <div class="inner_description">
					<div class="inner_description_flex">
						<div class="inner_description_img">
							<div class="inner_description_img_box">
								<img src="<?= Yii::$app->request->baseUrl ?>/images/product.jpg" alt="">
							</div>
						</div>
						<div class="inner_description_text">
							<h2 class="title1"><span><?= $category['name'] ?></span></h2>
							<?= $category['content'] ?>
							<div class="inner_description_box">
								<a href="#" class="add_btn modal_btn" data-modal="request">Получить цены</a>
								<span class="inner_desc_text">Рассчитаем вашу заявку в течении часа</span>
							</div>
						</div>
					</div>
					<div class="inner_description_app">
						<h3 class="title4">Где применяются цельнотянутые отводы?</h3>
						<p>Конструкционные цельнотянутые отводы применяются в различных отраслях экономики - машиностроение, металлургия, нефтяная отрасль, газовая промышленность и т.д. В некоторых случаях допускается применение отводов в производстве технологического оборудования, если его конструкция не противоречит отклонениям государственного стандарта.</p>
						<p>Крутоизогнутые отводы изготавливаются различными способами, прежде всего, используют способы путём горячей протяжки по рогообразному сердечнику, а также методом холодной штамповки из трубных заготовок. Стальные отводы изготавливаются под различным углом, и основными параметрами является значения 30-45-60-90 градусов, а также развёрнутый - 180 градусов.</p>
						<p>Компания "ТеплоЭлемент" изготавливает отвод бесшовный, согласно техническому заданию, которое предоставляет Заказчик. При изготовлении учитываются критерии производства по ГОСТ 17375-2001.</p>
					</div>
				</div>
				<div class="inner_feature">
					<div class="inner_feature_flex">
							<div class="inner_feature1">
								<h3 class="title4">Обозначения, используемые <br> для отводов</h3>
								<p>Согласно требованиям ГОСТ, к продукции предъявляется особая маркировка, которая позволяет узнать основную и дополнительную информацию по изготовлению и применению отводов крутоизогнутых:</p>
								<div class="inner_feature_box">
									<span>Обозначение "П" - допустимое рабочее давление эксплуатации до 160 атмосфер, температурный режим эксплуатации -70С до +450С.</span>
									<span>Обозначение Ду - внутренний рабочий диаметр прохода отвода, измерение в мм.</span>
									<span>Обозначение Дн - наружные характеристики диаметра, величина измеряется в мм.</span>
									<span>Вариант исполнения 1- требования совпадают с регламентом DIN, рабочие диаметры от 21,3мм до 48,3мм.</span>
									<span>Вариант исполнения 2- отечественные стандарты, диаметры от 32мм до 426мм.</span>
								</div>
								<div class="inner_feature_img">
									<div class="inner_feature_img_item">
										<img src="<?= Yii::$app->request->baseUrl ?>/images/chart1.png" alt="">
									</div>
									<div class="inner_feature_img_item">
										<img src="<?= Yii::$app->request->baseUrl ?>/images/chart2.png" alt="">
									</div>
									<div class="inner_feature_img_item">
										<img src="<?= Yii::$app->request->baseUrl ?>/images/chart3.png" alt="">
									</div>
								</div>
							</div>
							<div class="inner_feature2">
								<h3 class="title4">Виды изделия отводов бесшовных</h3>
								<p>Согласно стандартным регламентам производства применяются некоторые требования по видам изделия.</p>
								<div class="inner_feature_box">
									<span>ГОСТ 17375, для этой категории отводов приемлемы следующие условия: радиус изгиба R=1,5 Dn</span>
									<span>ГОСТ 30753 2001, для этого регламента, радиус изгиба R=1 Dn.</span>
							  </div>
							  <p>Отводы ГОСТ 17375-2001 крутоизогнутые типа 3dТехнические условия для изготовления обеих групп отводов должны соответствовать регламенту 17380-2001.</p>
							  <p>Как видно, ряд технических регламентов предъявляет особые условия для изготовления отводов, в то же время материал для различных групп отводов может иметь одинаковые характеристики. Обратитесь за помощью к нашему менеджеру, и получите профессиональную помощь в вопросах поставки отводов бесшовных для вашего производственного цикла работ. Большие возможности нашей компании помогут решить сложные технические и организационные работы обеспечения необходимыми деталями для трубопроводной системы.</p>
							  <div class="inner_description_box">
									<a href="#" class="add_btn modal_btn" data-modal="request">Получить цены</a>
									<span class="inner_desc_text">Рассчитаем вашу заявку в течении часа</span>
								</div>
							</div>
							
					</div>
				</div>
				<div class="inner_offers">
					<div class="inner_offers_carousel">
						<button class="product_prev_btn"></button>
						<table class="offers_table">
								<tbody>
								  <tr>
								  	<td class="forpad">
								  		<table class="suboffers_table">
												<tbody>
								  			<tr>	
													<th class="cell1">Фото</th>
													<th class="cell2">Наименование</th>
													<th class="cell3">Выбор стали</th>
													<th class="cell4">Количество</th>
													<th class="cell5"></th>
												</tr>
											</tbody>
										</table>
										</td>
									</tr>
									<tr class="active offers_lk">	
										<td class="forpad">
								  		<table class="suboffers_table">
												<tbody>
								  			<tr>
								  				<td class="cell1">	
														<a href="#" class="offers_img">
															<img src="<?= Yii::$app->request->baseUrl ?>/images/offers.jpg" alt="">
													 </a>
									 			 	</td>
													<td class="cell2"><div class="offers_name"><a href="#">Труба бесшовная 7X1 x/д</a></div></td>
													<td class="cell3">
														<label for="mark" class="select">
															<select id="mark">
																<option>Выбрать марку</option>
																<option>марка2</option>
																<option>марка3</option>
																<option>марка4</option>
															</select>
														</label>
													</td>
													<td class="cell4">
														<div class="counter-wrapper">
															<div class="counter-box">
																<button class="counter-minus"></button>
																<input class="counter-qt" value="1">
																<button class="counter-plus"></button>
															</div>
													  </div>
														<span class="counter_unit">метров</span>
													</td>
													<td class="cell5"><button class="add_btn modal_btn"  data-modal="basket">Добавить в заявку</button></td>
												</tr>
													</tbody>
											</table>
										</td>
									</tr>
									<tr class="offers_lk">
		                <td class="forpad">
								  		<table class="suboffers_table">
												<tbody>
								  			<tr>	
												 <td class="cell1">
													<a href="#" class="offers_img">
														<img src="<?= Yii::$app->request->baseUrl ?>/images/offers.jpg" alt="">
													</a>
												  </td>
													<td class="cell2"><div class="offers_name"><a href="#">Швеллер бесшовный</a></div></td>
													<td class="cell3">
														<label for="mark1" class="select">
															<select id="mark1">
																<option>Выбрать марку</option>
																<option>марка2</option>
																<option>марка3</option>
																<option>марка4</option>
															</select>
														</label>
													</td>
													<td class="cell4">
														<div class="counter-wrapper">
															<div class="counter-box">
																<button class="counter-minus"></button>
																<input class="counter-qt" value="1">
																<button class="counter-plus"></button>
															</div>
													  </div>
														<span class="counter_unit">метров</span>
													</td>
													<td class="cell5"><button class="add_btn modal_btn"  data-modal="basket">Добавить в заявку</button></td>
												</tr>
												</tbody>
											</table>
										</td>
									</tr>
									<tr class="offers_lk">
		                <td class="forpad">
								  		<table class="suboffers_table">
												<tbody>
								  			<tr>	
												 <td class="cell1">
													<a href="#" class="offers_img">
														<img src="<?= Yii::$app->request->baseUrl ?>/images/offers.jpg" alt="">
													</a>
												  </td>
													<td class="cell2"><div class="offers_name"><a href="#">Труба бесшовная 7X1 x/д</a></div></td>
													<td class="cell3">
														<label for="mark2" class="select">
															<select id="mark2">
																<option>Выбрать марку</option>
																<option>марка2</option>
																<option>марка3</option>
																<option>марка4</option>
															</select>
														</label>
													</td>
													<td class="cell4">
														<div class="counter-wrapper">
															<div class="counter-box">
																<button class="counter-minus"></button>
																<input class="counter-qt" value="1">
																<button class="counter-plus"></button>
															</div>
													  </div>
														<span class="counter_unit">метров</span>
													</td>
													<td class="cell5"><button class="add_btn modal_btn"  data-modal="basket">Добавить в заявку</button></td>
												</tr>
												</tbody>
											</table>
										</td>
									</tr>
									<tr class="offers_lk">
		              	<td class="forpad">
								  		<table class="suboffers_table">
												<tbody>
								  			<tr>	
												 <td class="cell1">
														<a href="#" class="offers_img">
															<img src="<?= Yii::$app->request->baseUrl ?>/images/offers.jpg" alt="">
														</a>
												  </td>
													<td class="cell2"><div class="offers_name"><a href="#">Труба бесшовная 7X1 x/д</a></div></td>
													<td class="cell3">
														<label for="mark3" class="select">
															<select id="mark3">
																<option>Выбрать марку</option>
																<option>марка2</option>
																<option>марка3</option>
																<option>марка4</option>
															</select>
														</label>
													</td>
													<td class="cell4">
														<div class="counter-wrapper">
															<div class="counter-box">
																<button class="counter-minus"></button>
																<input class="counter-qt" value="1">
																<button class="counter-plus"></button>
															</div>
													  </div>
														<span class="counter_unit">метров</span>
													</td>
													<td class="cell5"><button class="add_btn modal_btn"  data-modal="basket">Добавить в заявку</button></td>
												</tr>
												</tbody>
											</table>
										</td>
									</tr>
									<tr class="offers_lk">
		                <td class="forpad">
								  		<table class="suboffers_table">
												<tbody>
								  			<tr>	
												 <td class="cell1">
														<a href="#" class="offers_img">
															<img src="<?= Yii::$app->request->baseUrl ?>/images/offers.jpg" alt="">
														</a>
												  </td>
													<td class="cell2"><div class="offers_name"><a href="#">Труба бесшовная 7X1 x/д</a></div></td>
													<td class="cell3">
														<label for="mark4" class="select">
															<select id="mark4">
																<option>Выбрать марку</option>
																<option>марка2</option>
																<option>марка3</option>
																<option>марка4</option>
															</select>
														</label>
													</td>
													<td class="cell4">
														<div class="counter-wrapper">
															<div class="counter-box">
																<button class="counter-minus"></button>
																<input class="counter-qt" value="1">
																<button class="counter-plus"></button>
															</div>
													  </div>
														<span class="counter_unit">метров</span>
													</td>
													<td class="cell5"><button class="add_btn modal_btn"  data-modal="basket">Добавить в заявку</button></td>
												</tr>
												</tbody>
											</table>
										</td>
									</tr>
									<tr class="offers_lk">
		                <td class="forpad">
								  		<table class="suboffers_table">
												<tbody>
								  			<tr>	
												 <td class="cell1">
														<a href="#" class="offers_img">
															<img src="<?= Yii::$app->request->baseUrl ?>/images/offers.jpg" alt="">
														</a>
												  </td>
													<td class="cell2"><div class="offers_name"><a href="#">Труба бесшовная 7X1 x/д</a></div></td>
													<td class="cell3">
														<label for="mark5" class="select">
															<select id="mark5">
																<option>Выбрать марку</option>
																<option>марка2</option>
																<option>марка3</option>
																<option>марка4</option>
															</select>
														</label>
													</td>
													<td class="cell4">
														<div class="counter-wrapper">
															<div class="counter-box">
																<button class="counter-minus"></button>
																<input class="counter-qt" value="1">
																<button class="counter-plus"></button>
															</div>
													  </div>
														<span class="counter_unit">метров</span>
													</td>
													<td class="cell5"><button class="add_btn modal_btn"  data-modal="basket">Добавить в заявку</button></td>
												</tr>
												</tbody>
											</table>
										</td>
									</tr>
							    <tr class="offers_lk">
		                <td class="forpad">
								  		<table class="suboffers_table">
												<tbody>
								  			<tr>	
												 <td class="cell1">
														<a href="#" class="offers_img">
															<img src="<?= Yii::$app->request->baseUrl ?>/images/offers.jpg" alt="">
														</a>
												  </td>
													<td class="cell2"><div class="offers_name"><a href="#">Труба бесшовная 7X1 x/д</a></div></td>
													<td class="cell3">
														<label for="mark6" class="select">
															<select id="mark6">
																<option>Выбрать марку</option>
																<option>марка2</option>
																<option>марка3</option>
																<option>марка4</option>
															</select>
														</label>
													</td>
													<td class="cell4">
														<div class="counter-wrapper">
															<div class="counter-box">
																<button class="counter-minus"></button>
																<input class="counter-qt" value="1">
																<button class="counter-plus"></button>
															</div>
													  </div>
														<span class="counter_unit">метров</span>
													</td>
													<td class="cell5"><button class="add_btn modal_btn"  data-modal="basket">Добавить в заявку</button></td>
												</tr>
												</tbody>
											</table>
										</td>
									</tr>
								</tbody>
						</table>
						<button class="product_next_btn"></button>
					</div>
          <div class="pag_box">
            <button class="pag_prev_btn"></button>
						<ul class="pag-list">
							<li><a href="">1</a></li>
							<li><a href="">2</a></li>
							<li><a href="">3</a></li>
							<li><a href="">4</a></li>
							<li><a href="">5</a></li>
							<li><a href="">6</a></li>
							<li><a href="">7</a></li>
							<li><a href="">8</a></li>
							<li><a href="">9</a></li>
						</ul>
						<button class="pag_next_btn"></button>
				    </div>
		        </div>
			</div>
		</div>
	</div>

	<?php include('contact_form.php'); ?>

