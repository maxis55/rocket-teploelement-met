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
		          <a class="breadcrumbs_main" href="#">Каталог</a>/
		        </li>
		        <li>
		          <a class="breadcrumbs_main" href="#">Отводы</a>/
		        </li>
		        <li>
		          <span class="breadcrumbs_current"><?= $product['name'] ?></span>
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
			
				<div class="product_box">
						<div class="product_info">
							<h2 class="title1"><?= $product['name'] ?></h2>
							<div class="product_info_inner">
								<div class="product_info_img">
									<img src="<?= Yii::$app->request->baseUrl ?>/images/product.jpg" alt="">
								</div>
								<div class="product_info_char">
									<h4 class="title6">Характеристики</h4>
									<dl class="product_char_list">
										<?php foreach ($characteristics as $order => $characteristic) { ?>
											<div class="product_char_item">
												<dt><?= $characteristic['name'] ?></dt>
												<dd><?= $characteristic['value'] ?></dd>
											</div>
										<?php } ?>
									</dl>
								</div>
								<?php include('product_counter_box.php'); ?>
							</div>
							<div class="product_desc">
								<h3 class="title4">Описание</h3>
								<?= $product['text'] ?>
							</div>
						
						</div>
						<div class="product_assets">
								<?php include('product_counter_box.php'); ?>
							<div class="product_banner">
								<img src="<?= Yii::$app->request->baseUrl ?>/images/banner.jpg" alt="">
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

