<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\News */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Новости', 'url' => ['admin/news']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['news-update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['news-delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить эту новость?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('На страницу новости', Url::toRoute(['site/news-page','slug'=>$model->slug]),['class' => 'btn btn-success']);?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'content:html',
            'date',
            'shortdesc',
            'slug',
            [
                'attribute' => 'media_id',
                'format' => 'html',
                'label' => 'Фото',
                'value' => function ($data) {
                    if ($data->media) {
                        return Html::img($data->media->getImageOfSize(), ['width' => '60px']);
                    } else{
                        return "Нет картинки";
                    }

                },
            ],
        ],
    ]) ?>

</div>
