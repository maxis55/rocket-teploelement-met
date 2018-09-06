<?php

use app\models\Pagesmeta;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Pages */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Страницы', 'url' => ['admin/pages']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pages-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['admin/pages-update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['admin/pages-delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверенны что хотите удалить запись?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'description:ntext',
            'keywords',
            'slug',
        ],
    ]) ?>

    <table id="w0" class="table table-striped table-bordered detail-view">
        <tbody>
        <tr>
            <th>ID</th>
            <td>1</td>
        </tr>
        <tr><th>Название</th><td>Главная страница</td></tr>
        <tr><th>Описание</th><td>описание главной страницы</td></tr>
        <tr><th>Ключевые слова</th><td><span class="not-set">(not set)</span></td></tr>
        <tr><th>Слаг</th><td>index</td></tr>
        </tbody>
    </table>

    <?php
    if($model->id <= 5) {

        $data = Pagesmeta::getFrontPageMeta($model->slug, true);

        if (!empty($data)) { ?>
            <table id="w0" class="table table-striped table-bordered detail-view">
                <tbody>
                    <?php foreach ($data as $item) { ?>
                        <tr>
                            <th><?= $item['title'] ?></th>
                            <td><?= $item['value'] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php }
    } ?>

</div>
