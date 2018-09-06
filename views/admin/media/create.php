<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Media */

$this->title = 'Добавить изображение';
$this->params['breadcrumbs'][] = ['label' => 'Медиа', 'url' => ['admin/media']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="media-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
