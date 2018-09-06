<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pages */

$this->title = 'Редактирование страницы: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Страницы', 'url' => ['admin/pages']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['admin/pages-view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="pages-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
