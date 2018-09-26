<?php

use app\models\Messages;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Messages */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Сообщения', 'url' => ['messages']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="messages-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Удалить', ['messages-delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить это сообщение?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
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
        ],
    ]) ?>

</div>
