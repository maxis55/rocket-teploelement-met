<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Category */
/** @var app\models\Category $parentCategories */

$this->title = "Обновить категорию: {$model->name}";
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['categories']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['category-view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="category-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'parentCategories' => $parentCategories,
    ]) ?>

</div>
