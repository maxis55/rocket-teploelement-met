<?php

use app\models\Media;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
$this->title='Новости';
$this->params['breadcrumbs'][] = $this->title;
/** @var array $page_content */
/** @var int $maxNews */
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
                    <form method="get">
                    <div class="news_sort_box">
                        <span>Сортировать:</span>
                        <label class="select_type" for="mark">
                            <select name="sortBy" id="mark" onchange="this.form.submit()">
                                <option value="new" >Новые</option>
                                <option value="viewed" <?= $_GET['sortBy'] == 'viewed' ? 'selected':''?>>Просмотренные</option>
                            </select>
                        </label>
                    </div>
                    </form>
                    <div class="news_flex">

                        <?php /** @var array $news */

                        foreach ($news as $single) {
                            echo \app\components\OutputHelper::drawOneNewsElement($single);
                            } ?>
                    </div>
                    <div class="news_more_box">
                        <a href="javascript:void(0)" data-max="<?=$maxNews;?>" data-page="1" data-sort="<?=$_GET['sortBy'];?>" data-per_page="<?=$page_content['posts_per_page'];?>" class="more_white_btn mm_ajax_more_news"><span>Показать еще</span></a>
                    </div>
                </div>


            </div>
        </div>
    </div>
<?= $this->render('contact_form.php') ?>