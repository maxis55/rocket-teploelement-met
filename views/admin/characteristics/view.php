<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Characteristics */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Характеристики', 'url' => ['characteristics']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="characteristics-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать ещё', ['characteristics-create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Редактировать', ['characteristics-update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['characteristics-delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить эту характеристику?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
        ],
    ]) ?>

</div>
