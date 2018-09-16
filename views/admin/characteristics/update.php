<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Characteristics */

$this->title = "Отредактировать характеристику: {$model->title}";
$this->params['breadcrumbs'][] = ['label' => 'Характеристики', 'url' => ['characteristics']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['characteristics-view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="characteristics-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
