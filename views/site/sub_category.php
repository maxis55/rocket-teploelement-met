<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

/** @var \app\models\Category $current_category */
/** @var string $category_slug */
/** @var string $subcategory_slug */
/** @var string $subsubcategory_slug */
$content=json_decode($current_category->content);
?>


<?= $this->render('categories_breadcrumbs_template.php') ?>

<div id="content">

    <div class="container">
        <div class="container_inner">
            <div class="inner_description">
                <div class="inner_description_flex">
                    <div class="inner_description_img">
                        <div class="inner_description_img_box">

                            <img src="<?= $current_category->media->getImageOfSize(); ?>" alt="">
                        </div>
                    </div>
                    <div class="inner_description_text">
                        <h2 class="title1"><span><?= $current_category->name; ?></span></h2>
                        <p><?=$current_category->shortdesc;?></p>
                        <div class="inner_description_box">
                            <a href="#" class="add_btn modal_btn" data-modal="request">Получить цены</a>
                            <span class="inner_desc_text">Рассчитаем вашу заявку в течении часа</span>
                        </div>
                    </div>
                </div>
                <div class="inner_description_app">
                    <?=$content[0];?>
                </div>
            </div>
            <div class="inner_feature">
                <div class="inner_feature_flex">
                    <div class="inner_feature1">
                        <?=$content[1];?>
                    </div>
                    <div class="inner_feature2">
                        <?=$content[2];?>
                        <div class="inner_description_box">
                            <a href="#" class="add_btn modal_btn" data-modal="request">Получить цены</a>
                            <span class="inner_desc_text">Рассчитаем вашу заявку в течении часа</span>
                        </div>
                    </div>

                </div>
            </div>
            <div class="inner_offers">
                <?= $this->render('products_in_grid_template.php',[
                        'dataProvider'=>$dataProvider
                ]) ?>
            </div>

            
        </div>
    </div>
</div>
<?= $this->render('contact_form.php') ?>

