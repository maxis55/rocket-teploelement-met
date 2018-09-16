<?php

 use yii\web\View;
use yii\widgets\Breadcrumbs;
$this->title='Контакты';
$this->params['breadcrumbs'][]=$this->title;
/** @var array $page_content */
?>

    <!-- MAIN CONTENT Start-->
    <div class="breadcrumbs_bl">
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
                            'class'=>'breadcrumbs_main'
                        ],
                        'activeItemTemplate' => "<li><span class='breadcrumbs_current'>{link}</span></li>\n",
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    ])
                    ?>

                </div>
            </div>
        </div>
    </div>
    <div id="content" class="type">
        <div class="container">
            <div class="container_inner">
                <div class="contacts_bl">
                    <div class="content_title">
                    <h2 class="title4"><span>Контакты</span></h2>
                  </div>
                  <div class="contacts_box">
                        <div class="contacts_info">
                            <div class="contacts_info_call">

                                <div class="contacts_call_item">
                                    <span>По всем вопросам</span>
                                    <a href="tel:<?=
                                    preg_replace("/[^0-9]/", "", $page_content['phone1']); ?>" class="header_info_lk"><?= $page_content['phone1']?></a>
                                </div>
                                <div class="contacts_call_item">
                                    <span>Звонок по России</span>
                                    <a href="tel:<?= preg_replace("/[^0-9]/", "", $page_content['phone2']); ?>" class="header_info_lk"><?= $page_content['phone2']?></a>
                                </div>
                                <div class="contacts_call_item">
                                    <button class="blue_btn modal_btn" data-modal="call">Заказать звонок</button>
                                </div>
                            </div>
                            <div class="contacts_info_email">
                                <a href="mailto:<?= $page_content['email']?>" class="info_sub_lk"><?= $page_content['email']?></a>
                            </div>
                            <div class="contacts_info_data">
                                <div class="contacts_data_list">
                                    <?= $page_content['content']?>
                                </div>
                                <a href="<?= $page_content['link']?>" target="_blank" class="red_btn">Карта предприятия</a>
                            </div>
                        </div>
                        <div class="contacts_map">
                            <div id="ya_map" style="width: 100%; height: 444px"></div>
                        </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        $page_content['map']=explode(',',$page_content['map']);

        $this->registerJs(
            'ymaps.ready(initYaMap);
                        function initYaMap() {
                            var myMap = new ymaps.Map("ya_map", {
                            center: [' . $page_content['map'][0] . ', ' . $page_content['map'][1] . '],
                            zoom: 5
                        }, {
                            searchControlProvider: \'yandex#search\'
                        }),
                            myPlacemark = new ymaps.Placemark([' . $page_content['map'][0] . ', ' . $page_content['map'][1] . '], {
                            }, {
                                iconLayout: \'default#image\',
                                iconImageHref: "' . Yii::$app->request->baseUrl . './images/icons/marker.png",
                                iconImageSize: [40, 60],
                                iconImageOffset: [-5, -38]
                            });
                    
                        myMap.geoObjects.add(myPlacemark);
                        }',
            View::POS_END);

    ?>
    <?= $this->render('contact_form.php') ?>