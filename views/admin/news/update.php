<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\News */

$this->title = "Обновить новости: {$model->name}";
$this->params['breadcrumbs'][] = ['label' => 'Новости', 'url' => ['admin/news']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['admin/news-view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="news-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
