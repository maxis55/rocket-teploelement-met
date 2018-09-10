<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $meta app\models\Settings */
/* @var $pagesSlugs app\models\Pages */
$this->title = 'Редактирование настроек' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Настройки', 'url' => ['admin/settings']];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="settings-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'meta' => $meta,
        'pagesSlugs'=>$pagesSlugs
    ]) ?>

</div>
