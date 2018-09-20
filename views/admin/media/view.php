<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Media */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Медиа', 'url' => ['admin/media']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="media-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['admin/media-update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['admin/media-delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Уверенны что хотите удалить запись?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            [
                'attribute' => 'name',
                'label' => 'Изображение',
                'format' => 'raw',
                'value' => function ($data) {
                    if ($data->type === 'image')
                        return '<img src="' . $data->getImageOfSize(450, 450) . '">';
                    else
                        return Html::a(
                            $data->title,
                            $data->getImageOfSize(),
                            ['target' => '_blank']);
                }],
            'name',
            'title',
            'alt',
        ],
    ]) ?>

</div>
