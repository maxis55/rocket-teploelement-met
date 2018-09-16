<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Products */
/** @var app\models\Category $parentCategories */

$this->title = "Обновить продукт: {$model->title}";
$this->params['breadcrumbs'][] = ['label' => 'Продукты', 'url' => ['products']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['products-view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="products-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'parentCategories' => $parentCategories,
    ]) ?>

</div>
