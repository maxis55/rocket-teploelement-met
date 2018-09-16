<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\MediaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Медиа';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="media-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Загрузить изображения', ['#'], ['class' => 'btn btn-success', 'id' => 'ajaxImageUploadBlock']) ?>
    </p>
    <form id="uploadImages" action="/admin/media" method="POST" enctype="multipart/form-data" class="image-upload-form">

        <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>">
        <label for="images_input">Выбрать изображения</label>
        <input id="images_input" type="file" name="Media[images][]" multiple="multiple" accept="image" style="display: none">
        <div id="img_list"><ul></ul></div>
        <input type="submit" value="Загрузить">
    </form>

    <?php try {
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                //'id',
                [
                    'attribute' => 'id',
                    'label' => 'Изображение',
                    'format' => 'raw',

                    'value' => function ($data) {
                        if('image'==$data->type){
                            return '<img style="width:150px" src="' . $data->getImageOfSize(250, 250) . '">';
                        }else{
                            return '<a target="_blank" href="'. $data->getImageOfSize() . '">'.$data->name.'</a>';
                        }

                    }],
                'name',
                'title',
                'alt',

                ['class' => 'yii\grid\ActionColumn',
                    'template' => '{view}{update}{delete}',
                    'buttons' => [
                        'view' => function ($url, $model) {
                            return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                                'title' => 'Просмотреть',
                            ]);
                        },
                        'update' => function ($url, $model) {
                            return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                                'title' =>  'Редактировать',
                            ]);
                        },
                        'delete' => function ($url, $model) {
                            return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                                'title' =>  'Удалить',
                                'data' => [
                                    'confirm' => 'Уверенны что хотите удалить медиафайл?',
                                    'method' => 'post',
                                ],
                            ]);
                        }
                    ],
                    'urlCreator' => function ($action, $model, $key, $index) {
                        return '/admin/media-' . $action . '?id=' . $key;
                    }
                ],
            ],
        ]);
    } catch (Exception $e) {
        echo 'Ошибка при загрузке медиа';
    } ?>

</div>
