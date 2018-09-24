<?php use yii\helpers\Url;
use yii\widgets\Breadcrumbs;

$all_categories = $this->params['categories']; ?>
<div class="catalog_bl">
    <?php if (isset($this->params['breadcrumbs'])): ?>
        <div class="breadcrumbs_box">
            <div class="container">
                <div class="container_inner">
                    <?=
                    Breadcrumbs::widget([
                        'options' => [
                            'class' => 'breadcrumbs'
                        ],
                        'itemTemplate' => "<li>{link} /</li>",
                        'homeLink' => [
                            'label' => Yii::t('yii', 'Главная'),
                            'url' => Yii::$app->homeUrl,
                            'class' => 'breadcrumbs_main'
                        ],
                        'activeItemTemplate' => "<li><span class='breadcrumbs_current'>{link}</span></li>\n",
                        'class' => 'somey',
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    ])
                    ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="container">
        <div class="container_inner">


            <h2 class="title1"><span><?= $this->params['cross_pages_data']['before_cats_title']; ?></span></h2>
            <div class="header_offers">
                <div class="header_supply_box">

                    <div class="header_offers_title">
                        <h3 class="title2">
                            <?= $this->params['cross_pages_data']['before_cats_left_1']; ?>
                            <span><?= $this->params['cross_pages_data']['before_cats_left_2']; ?></span></h3></div>
                    <span class="header_supply_open"></span>
                    <div class="header_supply">
                        <?php
                        //size of categories of highest hierarchy is predetermined
                        for ($i = 0; $i < 14; ++$i):
                            $category=$all_categories['none'][$i];
                            ?>
                            <div class="header_supply_item<?= $i + 1; ?>">
                                <div class="header_supply_img">
                                </div>

                                <?php if ( empty($all_categories[  $category['id']  ]) ): ?>
                                    <a href="<?= Url::toRoute(['site/catalog-category', 'category_slug' => $category['slug']]) ?>"
                                       class="categories_name"><?= $category['name']; ?></a>
                                <?php else: ?>
                                    <div class="categories_open">
                                        <a href="<?= Url::toRoute(['site/catalog-category', 'category_slug' => $category['slug']]) ?>"
                                           class="categories_name"><?= $category['name']; ?></a>
                                        <div class="categories">
                                            <ul class="submenu">
                                                <?php foreach ($all_categories[ $category['id'] ] as $subcategory): ?>
                                                    <li>
                                                        <a href="<?= Url::toRoute(['site/catalog-subcategory', 'category_slug' => $category['slug'], 'subcategory_slug' => $subcategory['slug']]) ?>"
                                                            <?= !empty($all_categories[$subcategory['id']])  ? 'class="submenu_lk"' : ''; ?> >
                                                            <?= $subcategory['name']; ?>
                                                        </a>
                                                        <?php if (!empty($all_categories[$subcategory['id']])): ?>
                                                            <ul class="submenu2">
                                                                <?php foreach ($all_categories[$subcategory['id']] as $subsubcategory): ?>
                                                                    <li>
                                                                        <a href="<?= Url::toRoute(['site/catalog-subcategory', 'category_slug' => $category['slug'], 'subcategory_slug' => $subcategory['slug'], 'subsubcategory_slug' => $subsubcategory['slug']]); ?>">
                                                                            <?= $subsubcategory['name'];?>
                                                                        </a>
                                                                    </li>
                                                                <?php endforeach; ?>
                                                            </ul>
                                                        <?php endif; ?>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php
                        endfor; ?>

                        <button class="header_supply_btn more_white_btn"><span>Показать еще</span></button>
                    </div>
                </div>
                <div class="header_details_box">
                    <div class="header_offers_title"><h3 class="title2">
                            <?= $this->params['cross_pages_data']['before_cats_right_1']; ?>
                            <span><?= $this->params['cross_pages_data']['before_cats_right_2']; ?></span></h3></div>
                    <span class="header_supply_open"></span>
                    <div class="header_details">
                        <?php for ($i = 14; $i <= 21; ++$i):
                            $category=$all_categories['none'][$i];
                            ?>
                            <div class="header_details_item<?= $i - 13; ?>">
                                <div class="header_details_img">
                                </div>
                                <?php if ( empty($all_categories[  $category['id']  ]) ): ?>
                                    <a href="<?= Url::toRoute(['site/catalog-category', 'category_slug' => $category['slug']]) ?>"
                                       class="categories_name"><?=  $category['name']; ?></a>
                                <?php else: ?>
                                    <div class="categories_open">
                                        <a href="<?= Url::toRoute(['site/catalog-category', 'category_slug' => $category['slug']]) ?>"
                                           class="categories_name"><?= $category['name']; ?></a>
                                        <div class="categories">
                                            <ul class="submenu">
                                                <?php foreach ($all_categories[ $category['id'] ] as $subcategory): ?>
                                                    <li>
                                                        <a href="<?= Url::toRoute(['site/catalog-subcategory', 'category_slug' => $category['slug'], 'subcategory_slug' => $subcategory['slug']]) ?>"
                                                            <?= !empty($all_categories[$subcategory['id']]) ? 'class="submenu_lk"' : ''; ?> >
                                                            <?= $subcategory['name']; ?>
                                                        </a>
                                                        <?php if (!empty($all_categories[$subcategory['id']])): ?>
                                                            <ul class="submenu2">
                                                                <?php foreach ($all_categories[$subcategory['id']] as $subsubcategory): ?>
                                                                    <li>
                                                                        <a href="<?= Url::toRoute(['site/catalog-subcategory', 'category_slug' => $category['slug'], 'subcategory_slug' => $subcategory['slug'], 'subsubcategory_slug' => $subsubcategory['slug']]); ?>">
                                                                            <?= $subsubcategory['name']; ?>
                                                                        </a>
                                                                    </li>
                                                                <?php endforeach; ?>
                                                            </ul>
                                                        <?php endif; ?>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php
                        endfor; ?>

                        <button class="header_supply_btn more_white_btn"><span>Показать еще</span></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>