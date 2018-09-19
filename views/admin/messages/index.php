<?php

use app\models\Messages;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\MessagesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Сообщения';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="messages-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            'date',
            'phone',
            [
                'attribute' => 'type',
                'format' => 'text',
                'value' => function ($data) {
                    if (!empty($data->type)) {
                        switch ($data->type){
                            case 'info_request':
                                return 'Запрос цен';
                                break;
                            case 'phone_request':
                                return 'Запрос звонка';
                                break;
                            default:
                                return "(не задано)";
                                break;
                        }
                    } else {
                        return "(не задано)";
                    }

                },
            ],
            'content:ntext',
            [
                'attribute' => 'file',
                'format' => 'raw',
                'value' => function ($data) {
                    if (!empty($data->file)) {
                        return Html::a($data->file,Messages::getFilePathStatic($data->file),['data-pjax' => 0,'title' => 'Просмотреть','target'=>'_blank']);
                    } else {
                        return "(не задано)";
                    }

                },
            ],
            ['class' => 'yii\grid\ActionColumn',
                'template' => '{view}{delete}',
                'buttons' => [
                    'view' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                            'data-pjax' => 0,
                            'title' => 'Просмотреть',
                        ]);
                    },
                    'delete' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [

                            'title' => 'Удалить',
                            'data' => [
                                'confirm' => 'Вы уверены, что хотите удалить это сообщение?',
                                'method' => 'post',
                            ],
                        ]);
                    }
                ],
                'urlCreator' => function ($action, $model, $key, $index) {
                    return '/admin/messages-' . $action . '?id=' . $key;
                }
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
