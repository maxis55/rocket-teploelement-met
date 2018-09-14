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
            <?= $this->render('products_in_grid_template.php',[
                    'dataProvider'=>$dataProvider
            ]) ?>
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
                                                <img src="images/offers.jpg" alt="">
                                            </a>
                                        </td>
                                        <td class="cell2">
                                            <div class="offers_name"><a href="#">Труба бесшовная 7X1 x/д</a></div>
                                        </td>
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
                                        <td class="cell5">
                                            <button class="add_btn modal_btn" data-modal="basket">Добавить в заявку
                                            </button>
                                        </td>
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
                                                <img src="images/offers.jpg" alt="">
                                            </a>
                                        </td>
                                        <td class="cell2">
                                            <div class="offers_name"><a href="#">Швеллер бесшовный</a></div>
                                        </td>
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
                                        <td class="cell5">
                                            <button class="add_btn modal_btn" data-modal="basket">Добавить в заявку
                                            </button>
                                        </td>
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
                                                <img src="images/offers.jpg" alt="">
                                            </a>
                                        </td>
                                        <td class="cell2">
                                            <div class="offers_name"><a href="#">Труба бесшовная 7X1 x/д</a></div>
                                        </td>
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
                                        <td class="cell5">
                                            <button class="add_btn modal_btn" data-modal="basket">Добавить в заявку
                                            </button>
                                        </td>
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
                                                <img src="images/offers.jpg" alt="">
                                            </a>
                                        </td>
                                        <td class="cell2">
                                            <div class="offers_name"><a href="#">Труба бесшовная 7X1 x/д</a></div>
                                        </td>
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
                                        <td class="cell5">
                                            <button class="add_btn modal_btn" data-modal="basket">Добавить в заявку
                                            </button>
                                        </td>
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
                                                <img src="images/offers.jpg" alt="">
                                            </a>
                                        </td>
                                        <td class="cell2">
                                            <div class="offers_name"><a href="#">Труба бесшовная 7X1 x/д</a></div>
                                        </td>
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
                                        <td class="cell5">
                                            <button class="add_btn modal_btn" data-modal="basket">Добавить в заявку
                                            </button>
                                        </td>
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
                                                <img src="images/offers.jpg" alt="">
                                            </a>
                                        </td>
                                        <td class="cell2">
                                            <div class="offers_name"><a href="#">Труба бесшовная 7X1 x/д</a></div>
                                        </td>
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
                                        <td class="cell5">
                                            <button class="add_btn modal_btn" data-modal="basket">Добавить в заявку
                                            </button>
                                        </td>
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
                                                <img src="images/offers.jpg" alt="">
                                            </a>
                                        </td>
                                        <td class="cell2">
                                            <div class="offers_name"><a href="#">Труба бесшовная 7X1 x/д</a></div>
                                        </td>
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
                                        <td class="cell5">
                                            <button class="add_btn modal_btn" data-modal="basket">Добавить в заявку
                                            </button>
                                        </td>
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
<?= $this->render('contact_form.php') ?>

