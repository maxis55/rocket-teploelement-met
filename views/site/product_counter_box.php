
								<div class="product_counter_box">
									<div class="product_counter_item">
										<div class="counter_item_inner">
											<span>Марка стали</span>
											<label for="mark_" class="select">
												<select id="mark_">
													<option>Выбрать марку</option>
													<?php foreach ($steel as $order => $type) { ?>
													<option><?= $type['name'] ?></option>
													<?php } ?>
												</select>
											</label>
										</div>
									</div>
									<div class="product_counter_item">
											<div class="counter_item_inner">
											<span>Количество метров</span>
											<div class="counter-wrapper">
												<div class="counter-box">
													<button class="counter-minus"></button>
													<input class="counter-qt" value="1">
													<button class="counter-plus"></button>
												</div>
											</div>
										</div>
									</div>
									<div class="product_counter_item">
										<div class="product_counter_mes">
											Чем больше покупка - тем выгоднее цена!
										</div>
									</div>
									<div class="product_counter_item">
										<div class="product_counter_order">
											<span class="product_order_left"></span>
											<span class="product_order_right"></span>
											<button class="blue_btn modal_btn" data-modal="basket">Заказать</button>
										</div>
									</div>
									<div class="product_counter_item">
										<span class="product_counter_text">Цена за тонну: узнавайте у менеджера</span>
									</div>
								</div>