<?php
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;

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
                        'class'=>'somey',
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
                <div class="single_new_bl">
                    <div class="content_title">
                        <h2 class="title4"><span><?= $news['name'] ?></span></h2>
                    </div>
                    <?= $news['content'] ?>
                </div>
            </div>
        </div>
    </div>
<?= $this->render('contact_form.php') ?>