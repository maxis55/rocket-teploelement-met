<?php

use app\models\Media;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
$this->title='Новости';
$this->params['breadcrumbs'][] = $this->title;
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
                <div class="news_bl">
                    <div class="content_title">
                        <h2 class="title4"><span>Наши новости</span></h2>
                    </div>
                    <div class="news_sort_box">
                        <span>Сортировать:</span>
                        <label class="select_type" for="mark">
                            <select id="mark">
                                <option>Новые</option>
                                <option>Просмотренные</option>
                                <option>Недавно просморенные</option>
                            </select>
                        </label>
                    </div>
                    <div class="news_flex">

                        <?php /** @var array $news */

                        foreach ($news as $single) { ?>
                            <div class="main_news_item">
                                <figure>
                                    <a href="<?= Url::toRoute(['site/news-page', 'slug' => $single['slug']]) ?>" class="news_img">
                                        <img src="<?= Media::getImageOfSizeStatic($single['media_name'],'image');?>">
                                    </a>
                                    <figcaption>
                                        <time datetime="2012-12">
                                            <span><?= date('d', strtotime($single['date'])); ?></span>
                                            <?= date('m.y', strtotime($single['date'])); ?>
                                        </time>
                                        <a href="<?= Url::toRoute(['site/news-page', 'slug' => $single['slug']]) ?>" class="news_name"><?= $single['name'] ?></a>
                                    </figcaption>
                                    <span class="news_content">
										<?= $single['shortdesc'] ?>
                                        <a href="<?= Url::toRoute(['site/news-page', 'slug' => $single['slug']]) ?>" class="news_content_lk"></a>
									</span>
                                </figure>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="news_more_box">
                        <a href="#" class="more_white_btn"><span>Показать еще</span></a>
                    </div>
                </div>


            </div>
        </div>
    </div>
<?= $this->render('contact_form.php') ?>