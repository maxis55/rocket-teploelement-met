<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OrdersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Заказы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'date',
            [
                'attribute' => 'products_information',
                'format' => 'raw',
                'value' => function ($data) {
                    $productsInformation = json_decode($data->products_information, true);

                    if (!empty($productsInformation)) {
                        $result = '';
                        foreach ($productsInformation as $information):
                            $result .= '<ul>';
                            $result .= "<li>Название товара: ".\app\models\Products::findOne($information['id'])->title."</li>";
                            $result .= "<li>Выбранный тип стали: {$information['type']}</li>";
                            $result .= "<li>Количество: {$information['amount']}</li>";
                            $result .= "<li>Ссылка на товар: " . Html::a('<span class="glyphicon glyphicon-eye-open"></span>',
                                    '/admin/products-view?id=' . $information['id'], [
                                        'data-pjax' => 0,
                                        'title' => 'Просмотреть',
                                    ]) . "</li>";
                            $result .= '</ul><br>';
                        endforeach;
                        return $result;
                    } else {
                        return "Не марок стали";
                    }
                },
            ],
            ['class' => 'yii\grid\ActionColumn',
                'template' => '{view}{delete}',
                'urlCreator' => function ($action, $model, $key, $index) {
                    return '/admin/orders-' . $action . '?id=' . $key;
                }
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
