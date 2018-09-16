<?php use yii\grid\GridView;
use yii\helpers\Html;

\yii\widgets\Pjax::begin(); ?>
<?php try {
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'layout' => '{items}{pager}',
        'columns' => [

            [
                'format' => 'raw',
                'label' => 'Фото',
                'value' => function ($data)  {
                    if ($data->media) {
                        $img=Html::img($data->media->getImageOfSize(66,52));
                        return Html::a($img, [
                            'site/product',
                            'product_slug' => $data->slug
                        ], ['data-pjax' => 0]);
                    } else {
                        return "Нет картинки";
                    }

                },
            ],

            [
                'attribute' => 'title',
                'format' => 'raw',
                'value' => function ($data)  {
                    return Html::a($data->title, [
                        'site/product',
                        'product_slug' => $data->slug
                    ], [ 'data-pjax' => 0]);
                }
            ],

            [
                'format' => 'raw',
                'label' => 'Выбор стали',
                'value' => function ($data) {
                    $result = '<label for="mark" class="select">
                                                    <select id="mark">
                                                        <option>Выбрать марку</option>';
                    $steel_types = json_decode($data->steel_type);
                    foreach ($steel_types as $steel_type) {
                        $result .= '<option>' . $steel_type . '</option>';
                    }
                    $result .= '</select>
                                           </label>';
                    return $result;
                }
            ],
            [
                'format' => 'raw',
                'label' => 'Количество',
                'value' => function ($data) {
                    return '<div class="counter-wrapper">
                                                    <div class="counter-box">
                                                        <button class="counter-minus"></button>
                                                        <input class="counter-qt" value="1">
                                                        <button class="counter-plus"></button>
                                                    </div>
                                                </div>
                                                <span class="counter_unit">метров</span>';
                }
            ],
            [
                'format' => 'raw',
                'label' => '',
                'value' => function () {
                    return '<button class="add_btn modal_btn" data-modal="basket">Добавить в заявку</button>';
                }
            ],

        ],
    ]);
} catch (Exception $e) {

} ?>
<?php \yii\widgets\Pjax::end(); ?>