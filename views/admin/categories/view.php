<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Category */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Категории', 'url' => ['categories']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['category-update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php if(null!=$model->parent):?>
        <?= Html::a('Удалить', ['category-delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить эту категорию?',
                'method' => 'post',
            ],
        ]) ?>
        <?php endif; ?>
    </p>

    <?php try {
        echo DetailView::widget([
            'model' => $model,
            'attributes' => [
//                'id',
                'slug',
                'parent',
                'name',
                'shortdesc',
              //  'content:ntext',
                [
                    'attribute' => 'media_id',
                    'format' => 'html',
                    'label' => 'Фото',
                    'value' => function ($data) {
                        if ($data->media) {
                            return Html::img($data->media->getImageOfSize(), ['width' => '60px']);
                        } else{
                            return "Нет картинки";
                        }

                    },
                ],
            ],
        ]);
    } catch (Exception $e) {
        var_dump($e);
    } ?>

</div>
