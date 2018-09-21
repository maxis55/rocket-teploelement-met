<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Продукты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать продукты', ['products-create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php \yii\widgets\Pjax::begin();?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'slug',
            'title',
            'content:ntext',
            [
                'attribute' => 'steel_type',
                'format' => 'html',
                'value' => function ($data) {
                    $decidedSteelType=json_decode($data->steel_type);
                    if (!empty($decidedSteelType)) {

                        return Html::ul($decidedSteelType);
                    } else{
                        return "Не марок стали";
                    }
                },
            ],
            [
                'attribute' => 'category_id',
                'format' => 'text',
                'label' => 'Категория',
                'value' => function ($data) {
                    return $data->category->name;

                },
            ],

            [
                'attribute' => 'media_id',
                'format' => 'html',
                'label' => 'Фото',
                'value' => function ($data) {
                    if ($data->media) {
                        return Html::img($data->media->getImageOfSize(), ['width' => '60px']);
                    } else {
                        return "Нет картинки";
                    }

                },
            ],
            ['class' => 'yii\grid\ActionColumn',
                'template' => '{view}{update}{delete}',
                'buttons' => [
                    'view' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                            'data-pjax' => 0,
                            'title' => 'Просмотреть',
                        ]);
                    },
                    'update' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                            'title' => 'Редактировать',
                        ]);
                    },
                    'delete' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [

                            'title' => 'Удалить',
                            'data' => [
                                'confirm' => 'Вы уверены, что хотите удалить этот продукт?',
                                'method' => 'post',
                            ],
                        ]);
                    }
                ],
                'urlCreator' => function ($action, $model, $key, $index) {
                    return '/admin/products-' . $action . '?id=' . $key;
                }
            ],
        ],
    ]); ?>
    <?php \yii\widgets\Pjax::end();?>
</div>
