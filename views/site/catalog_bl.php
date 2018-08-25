<?php 

use yii\helpers\Url;

?>

    
            <div class="container">
                <div class="container_inner">
                    <h2 class="title1"><span>Мы предлагаем</span></h2>
                    <div class="header_offers">
                        <div class="header_supply_box">
                            <div class="header_offers_title"><h3 class="title2">Поставки<span>металлопроката</span></h3></div>
                            <span class="header_supply_open"></span>
                            <div class="header_supply">
                                <?php $slugs =['','truby','listy','shvellera','ugolok','balka','armatura','provoloka','krug','shestigrannik','kvadrat','polosa','relsy','pokovka','setka','otvody','perexody','trojniki','zaglushki','flancy','opory','sgony','mufty']; ?>
                                <?php $names =['','Трубы','Листы','Швеллера','Уголок','Балка','Арматура','Проволока','Круг','Шестигранник','Квадрат','Полоса','Рельсы','Поковка','Сетка','Отводы','Переходы','Тройники','Заглушки','Фланцы','Опоры','Сгоны','Муфты']; ?>
                                <?php for ($i = 1; $i <=14; $i++) { ?>
                                    <div class="header_supply_item<?=$i?>">
                                        <div class="header_supply_img"></div>
                                        <div class="categories_open">
                                                <?php
                                                    foreach ($this->params['navCategories'] as $ncategory) if ($ncategory['slug']==$slugs[$i]) {
                                                        $parent = $ncategory['id'];
                                                        break;
                                                    }
                                                ?>
                                                <a href="<?= Url::toRoute(['site/catalog-category', 'category' => $slugs[$i]]) ?>" class="categories_name"><?=$names[$i]?></a>
                                                <div class="categories">
                                                        <ul class="submenu">
                                                            <?php
                                                                $substoper = false;
                                                                foreach ($this->params['navCategories'] as $subcategory)
                                                                    if ($subcategory['parent'] == $parent) {
                                                                        $substoper = true;
                                                                        ?>
                                                                        <li><a href="<?= Url::toRoute(['site/catalog-subcategory', 'category' => $slugs[$i], 'subcategory' => $subcategory['slug']]) ?>" class="submenu_lk"><?= $subcategory['name'] ?></a>
                                                                            <ul class="submenu2">
                                                                                <?php
                                                                                    $subsubstoper = false;
                                                                                    foreach ($this->params['navCategories'] as $subsubcategory)
                                                                                        if ($subsubcategory['parent'] == $subcategory['id']) {
                                                                                            $subsubstoper = true;
                                                                                ?>
                                                                                    <li><a href="<?= Url::toRoute(['site/catalog-subcategory', 'category' => $slugs[$i], 'subcategory' => $subcategory['slug'], 'subsubcategory' => $subsubcategory['slug']]) ?>"><?= $subsubcategory['name'] ?></a></li>
                                                                                <?php } elseif ($subsubstoper) break; ?>
                                                                            </ul>
                                                                        </li>
                                                            <?php } elseif ($substoper) break; ?>
                                                     </ul>
                                                </div>
                                        </div>
                                    </div>
                                <?php } ?>
                                <button class="header_supply_btn more_white_btn"><span>Показать еще</span></button>
                            </div>
                        </div>
                        <div class="header_details_box">
                            <div class="header_offers_title"><h3 class="title2">Детали <span>трубопровода</span></h3></div>
                            <span class="header_supply_open"></span>
                            <div class="header_details">
                                <?php $d = 1; ?>
                                <?php for ($i = 15; $i <=22; $i++) { ?>
                                    <div class="header_details_item<?=$d?>">
                                        <div class="header_details_img"></div>
                                        <div class="categories_open">
                                                <?php
                                                    foreach ($this->params['navCategories'] as $ncategory) if ($ncategory['slug']==$slugs[$i]) {
                                                        $parent = $ncategory['id'];
                                                        break;
                                                    }
                                                ?>
                                                <a href="<?= Url::toRoute(['site/catalog-category', 'category' => $slugs[$i]]) ?>" class="categories_name"><?=$names[$i]?></a>
                                                <div class="categories">
                                                        <ul class="submenu">
                                                            <?php
                                                                $substoper = false;
                                                                foreach ($this->params['navCategories'] as $subcategory)
                                                                    if ($subcategory['parent'] == $parent) {
                                                                        $substoper = true;
                                                                        ?>
                                                                        <li><a href="<?= Url::toRoute(['site/catalog-subcategory', 'category' => $slugs[$i], 'subcategory' => $subcategory['slug']]) ?>" class="submenu_lk"><?= $subcategory['name'] ?></a>
                                                                            <ul class="submenu2">
                                                                                <?php
                                                                                    $subsubstoper = false;
                                                                                    foreach ($this->params['navCategories'] as $subsubcategory)
                                                                                        if ($subsubcategory['parent'] == $subcategory['id']) {
                                                                                            $subsubstoper = true;
                                                                                ?>
                                                                                    <li><a href="<?= Url::toRoute(['site/catalog-subcategory', 'category' => $slugs[$i], 'subcategory' => $subcategory['slug'], 'subsubcategory' => $subsubcategory['slug']]) ?>"><?= $subsubcategory['name'] ?></a></li>
                                                                                <?php } elseif ($subsubstoper) break; ?>
                                                                            </ul>
                                                                        </li>
                                                            <?php } elseif ($substoper) break; ?>
                                                     </ul>
                                                </div>
                                        </div>
                                    </div>
                                    <?php $d++; ?>
                                <?php } ?>
                              <button class="header_supply_btn more_white_btn"><span>Показать еще</span></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>