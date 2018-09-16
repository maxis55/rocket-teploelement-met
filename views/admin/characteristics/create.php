<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Characteristics */

$this->title = 'Создать характеристику';
$this->params['breadcrumbs'][] = ['label' => 'Характеристики', 'url' => ['characteristics']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="characteristics-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
