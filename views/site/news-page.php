<?php

use app\models\Media;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;

/** @var array $news */
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
    </div>
    <div id="content" class="type">
        <div class="container">
            <div class="container_inner">
                <div class="single_new_bl">
                    <div class="content_title">
                        <h2 class="title4"><span><?=
                                $news['name'] ?></span></h2>
                    </div>
                    <?= $news['content'] ?>
                    <?php if (!empty($news['content_middle'])): ?>
                        <div class="single_new_content">
                            <div class="singl_new_message logo">
                                <a href="<?php echo Url::base(true); ?>" class="logo_lk">
								<span class="logo_top">
									<img src="/images/icons/logo.svg" alt="">
								</span>
                                </a>
                                <div class="singl_new_message_blue">
                                    <div class="singl_new_message_iiner">
                                        <?= $news['content_middle'] ?>
                                    </div>
                                </div>

                            </div>
                            <?php if (!empty($news['media_content'])): ?>
                                <img src="<?= Media::findOne($news['media_content'])->getImageOfSize(); ?>" alt=""
                                     class="singl_new_img">
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                    <?= $news['content2'] ?>
                </div>
            </div>
        </div>
    </div>
<?= $this->render('contact_form.php') ?>