<?php use yii\grid\GridView;
use yii\helpers\Html;

?>
<button class="inner_offers_prev"></button>
<button class="inner_offers_next"></button>
<?php
\yii\widgets\Pjax::begin(); ?>
<?php try {
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'layout' => '{items}{pager}',
        'columns' => [

            [
                'format' => 'raw',
                'label' => 'Фото',
                'value' => function ($data) {
                    if ($data->media) {
                        $img = Html::img($data->media->getImageOfSize(66, 52));
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
                'value' => function ($data) {
                    return Html::a($data->title, [
                        'site/product',
                        'product_slug' => $data->slug
                    ], ['data-pjax' => 0]);
                }
            ],

            [
                'format' => 'raw',
                'label' => 'Выбор стали',
                'value' => function ($data) {
                    $result = '
                    <label for="mark" class="select"><select name="steel_type" id="mark">';
                    $steel_types = json_decode($data->steel_type);
                    if (!empty($steel_types))
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
                    return '
                                                <div class="counter-wrapper">
                                                    <div class="counter-box">
                                                        <button class="counter-minus"></button>
                                                        <input name="amount" type="number" class="counter-qt" value="1">
                                                        <button class="counter-plus"></button>
                                                    </div>
                                                </div>
                                                <span class="counter_unit">метров</span>';
                }
            ],
            [
                'format' => 'raw',
                'label' => '',
                'value' => function ($data) {
                    return '
                    <input name="product_id" value="' . $data->id . '" autocomplete="off" type="hidden">
                    <input name="product_name" value="' . $data->title . '" autocomplete="off" type="hidden">
                    <button class="add_btn modal_btn grid_basket_btn" onclick="event.preventDefault();" data-modal="basket">Добавить в заявку</button>
                ';
                }
            ],

        ],
    ]);
} catch (Exception $e) {

} ?>
<?php \yii\widgets\Pjax::end(); ?>
