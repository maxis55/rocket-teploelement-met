<?php

/** @var \app\models\Products $product */

use app\models\Media;

/** @var array $characteristicsWvalues */
$this->title = $product->title;
?>

<!-- MAIN CONTENT Start-->
<?= $this->render('categories_breadcrumbs_template.php') ?>
<div id="content">
    <div class="container">
        <div class="container_inner">

            <div class="product_box">
                <div class="product_info">
                    <h2 class="title1"><?=
                        $product->title; ?></h2>
                    <div class="product_info_inner">
                        <div class="product_info_img">
                            <?php if(null!=$product->media):?>
                            <img src="<?= $product->media->getImageOfSize(); ?>">
                            <?php endif;?>
                        </div>

                        <?php if (!empty($characteristicsWvalues)): ?>
                            <div class="product_info_char">
                                <h4 class="title6">Характеристики</h4>
                                <dl class="product_char_list">
                                    <?php foreach ($characteristicsWvalues as $characteristic) { ?>
                                        <div class="product_char_item">
                                            <dt><?= $characteristic['title'] ?></dt>
                                            <dd><?= $characteristic['value'] ?></dd>
                                        </div>
                                    <?php } ?>
                                </dl>
                            </div>
                        <?php endif; ?>
                        <div class="product_counter_box">
                            <form class="add_to_cart_form">
                                <input type="hidden" name="product_id"
                                       value="<?= $product->id ?>" autocomplete="off"/>
                                <input type="hidden" name="product_name"
                                       value="<?= $product->title ?>" autocomplete="off"/>
                            <div class="product_counter_item">
                                <div class="counter_item_inner">
                                    <span>Марка стали</span>
                                    <label for="mark_" class="select">
                                        <select  name="steel_type" id="mark_">
                                            <?php
                                            $steel_types = json_decode($product->steel_type);
                                            if (!empty($steel_types)):
                                            foreach (json_decode($product->steel_type) as $order => $type) { ?>
                                                <option><?= $type ?></option>
                                            <?php }
                                            else: ?>
                                                <option>Нет указанных марок.</option>
                                            <?php
                                            endif;
                                            ?>
                                        </select>
                                    </label>
                                </div>
                            </div>
                            <div class="product_counter_item">
                                <div class="counter_item_inner">
                                    <span>Количество метров</span>
                                    <div class="counter-wrapper">
                                        <div class="counter-box">
                                            <button class="counter-minus" onclick="event.preventDefault();"></button>
                                            <input type="number" name="amount" class="counter-qt" value="1">
                                            <button class="counter-plus" onclick="event.preventDefault();"></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product_counter_item">
                                <div class="product_counter_mes">
                                    <?=$this->params['cross_pages_data']['products_right_text1'];?>
                                </div>
                            </div>
                            <div class="product_counter_item">
                                <div class="product_counter_order">
                                    <span class="product_order_left"></span>
                                    <span class="product_order_right"></span>
                                    <button class="blue_btn modal_btn" data-modal="basket" onclick="event.preventDefault();">Заказать</button>
                                </div>
                            </div>
                            <div class="product_counter_item">
                                <span class="product_counter_text"><?=$this->params['cross_pages_data']['products_right_text2'];?></span>
                            </div>
                            </form>
                        </div>
                    </div>
                    <div class="product_desc">
                        <h3 class="title4">Описание</h3>
                        <?= $product->content ?>
                    </div>
                    <div class="product_advantages">
                        <?= $product->content2 ?>
                    </div>
                </div>
                <div class="product_assets">
                    <form class="add_to_cart_form">

                        <input type="hidden" name="product_id"
                               value="<?= $product->id ?>" autocomplete="off"/>
                        <input type="hidden" name="product_name"
                               value="<?= $product->title ?>" autocomplete="off"/>
                        <div class="product_counter_box">
                            <div class="product_counter_item">
                                <div class="counter_item_inner">
                                    <span>Марка стали</span>
                                    <label for="mark_" class="select">
                                        <select name="steel_type" id="mark_">
                                            <?php

                                            if (!empty($steel_types)):
                                                foreach ($steel_types as $order => $type) { ?>
                                                    <option><?= $type ?></option>
                                                <?php }
                                                else: ?>
                                                    <option>Нет указанных марок.</option>
                                                    <?php
                                            endif;
                                            ?>
                                        </select>
                                    </label>
                                </div>
                            </div>
                            <div class="product_counter_item">
                                <div class="counter_item_inner">
                                    <span>Количество метров</span>
                                    <div class="counter-wrapper">
                                        <div class="counter-box">
                                            <button class="counter-minus" onclick="event.preventDefault();"></button>
                                            <input type="number" name="amount" class="counter-qt" value="1">
                                            <button class="counter-plus" onclick="event.preventDefault();"></button>
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
                                    <button class="blue_btn modal_btn" data-modal="basket"
                                            onclick="event.preventDefault();">Заказать
                                    </button>
                                </div>
                            </div>
                            <div class="product_counter_item">
                                <span class="product_counter_text">Цена за тонну: узнавайте у менеджера</span>
                            </div>
                        </div>
                        <div class="product_banner">
                            <?php if(!empty($this->params['cross_pages_data']['products_right_img'])):?>
                            <img src="<?=Media::findOne($this->params['cross_pages_data']['products_right_img'])->getImageOfSize();?>" alt="">
                            <?php endif;?>
                        </div>
                    </form>
                </div>
            </div>

            <div class="inner_offers">
                <?= $this->render('products_in_grid_template.php', [
                    'dataProvider' => $dataProvider
                ]) ?>
            </div>


        </div>
    </div>
    <?php include('contact_form.php'); ?>

