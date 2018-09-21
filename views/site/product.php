<?php

/** @var \app\models\Products $product */
/** @var array $characteristicsWvalues */
$this->title=$product->title;
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

                            <img src="<?= Yii::$app->request->baseUrl ?><?= $product->media->getImageOfSize(); ?>">
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
                            <div class="product_counter_item">
                                <div class="counter_item_inner">
                                    <span>Марка стали</span>
                                    <label for="mark_" class="select">
                                        <select id="mark_">
                                            <?php foreach (json_decode($product->steel_type) as $order => $type) { ?>
                                                <option><?= $type ?></option>
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
                                            <input type="number" class="counter-qt" value="1">
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
                    </div>
                    <div class="product_desc">
                        <h3 class="title4">Описание</h3>
                        <?= $product->content ?>
                    </div>

                </div>
                <div class="product_assets">
                    <form class="add_to_cart_form">

                        <input type="hidden" name="product_id"
                               value="<?=$product->id?>" autocomplete="off"/>
                        <input type="hidden" name="product_name"
                               value="<?=$product->title?>" autocomplete="off"/>
                        <div class="product_counter_box">
                            <div class="product_counter_item">
                                <div class="counter_item_inner">
                                    <span>Марка стали</span>
                                    <label for="mark_" class="select">
                                        <select name="steel_type" id="mark_">
                                            <?php foreach (json_decode($product->steel_type) as $order => $type) { ?>
                                                <option><?= $type ?></option>
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
                                    <button class="blue_btn modal_btn" data-modal="basket" onclick="event.preventDefault();">Заказать</button>
                                </div>
                            </div>
                            <div class="product_counter_item">
                                <span class="product_counter_text">Цена за тонну: узнавайте у менеджера</span>
                            </div>
                        </div>
                        <div class="product_banner">
                            <img src="<?= Yii::$app->request->baseUrl ?>/images/banner.jpg" alt="">
                        </div>
                    </form>
                </div>
            </div>

            <div class="inner_offers">
                <?= $this->render('products_in_grid_template.php',[
                    'dataProvider'=>$dataProvider
                ]) ?>
            </div>






    </div>
</div>
<?php include('contact_form.php'); ?>

