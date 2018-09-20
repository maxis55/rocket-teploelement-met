<?php

use app\models\Media;
use app\models\Pagesmeta;
use yii\helpers\Html;
use yii\helpers\Url;
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
            'description:html',
            'keywords',
            'slug',
        ],
    ]) ?>

    <?php
    if ($model->id <= 5) {

        $data = Pagesmeta::getPageMeta($model->slug, true);

        if (!empty($data)) { ?>
            <table id="w1" class="table table-striped table-bordered detail-view">
                <tbody>
                <?php foreach ($data as $item) { ?>
                    <tr>
                        <th><?= $item['title'] ?></th>
                        <td><?php
                            if (($item['type'] == 'image') && ($item['value'] != '')) {
                                echo Html::img(Media::findById($item['value'])->getImageOfSize(450, 450), ['alt' => 'img']);
                            } else {
                                if($item['type']==='map_cities'){

                                    echo '<ul>';
                                    foreach ($item['value'] as $city=>$message){
                                        echo '<li>'.$city.'=>'.$message.'</li>';
                                    }
                                    echo '</ul>';
                                }else{
                                    if($item['type']==='file'){
                                        echo Html::a(
                                            Media::findById($item['value'])->name,
                                            Media::findById($item['value'])->getImageOfSize(),
                                            ['target' => '_blank']);
                                    }else{
                                        echo $item['value'];
                                    }

                                }

                            } ?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        <?php }
    } ?>

</div>
