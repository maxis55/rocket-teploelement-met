<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Products */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Продукты', 'url' => ['products']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['products-update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['products-delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить этот продукт?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'slug',
            'title',
            'content:ntext',
            [
                'attribute' => 'steel_type',
                'format' => 'html',
                'value' => function ($data) {
                    $decidedSteelType=json_decode($data->steel_type);
                    $result='';
                    if (!empty($decidedSteelType)) {

                        return Html::ul($decidedSteelType);
                    } else{
                        return "Не марок стали";
                    }
                },
            ],
            [
                'attribute' => 'category_id',
                'value' => function ($data) {
                    if ($data->category) {
                        return $data->category->name;
                    } else{
                        return "Нет категории";
                    }
                },
            ],
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
