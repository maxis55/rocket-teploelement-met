<?php

use app\models\Media;
use app\models\Pagesmeta;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $type string */
/* @var $model app\models\Pages */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pages-form tinymce_forms">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>



    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

    <?php
    if ($model->id <= 5) {

        $data = Pagesmeta::getPageMeta($model->slug, true);
        $array_of_favors = ['block_1_content', 'block_2_content', 'block_3_content', 'block_4_content', 'block_5_content'];
        if (!empty($data)) {
            foreach ($data as $item) { ?>

                <?php if ($item['type'] == 'input') { ?>
                <div class="form-group field-pages-<?= $item['key'] ?> required">
                    <label class="control-label" for="pages-<?= $item['key'] ?>"><?= $item['title'] ?></label>
                    <input type="text" id="pages-<?= $item['key'] ?>" class="form-control"
                           name="Pages[<?= $item['key'] ?>]" value="<?= $item['value'] ?>" maxlength="50"
                           aria-required="true">
                </div>
            <?php } ?>

            <?php if ($item['type'] == 'tinyarea') { ?>
                <?php if (in_array($item['key'], $array_of_favors)): ?>
                <div class="form-group field-pages-<?= $item['key'] ?> field-pages-description">
                    <label class="control-label" for="pages-<?= $item['key'] ?>">Описание</label>
                    <textarea
                            id="pages-<?= $item['key'] ?>"
                            class="form-control"
                            name="Pages[<?= $item['key'] ?>]"
                            rows="6"
                            maxlength="192">
                        <?= $item['value'] ?>
                    </textarea>
                </div>
                <?php else: ?>
                <div class="form-group field-pages-<?= $item['key'] ?> field-pages-description">
                    <label class="control-label" for="pages-<?= $item['key'] ?>">Описание</label>
                    <textarea
                            id="pages-<?= $item['key'] ?>"
                            class="form-control tinymce"
                            name="Pages[<?= $item['key'] ?>]"
                            rows="6"><?= $item['value'] ?></textarea>
                </div>
                <?php endif; ?>
            <?php } ?>


            <?php if ($item['type'] == 'image') { ?>

                <div class="box-item-inner">
                    <div class="box-img">
                        <p><?= $item['title'] ?></p>
                        <?php if (!empty($item['value'])) { ?>
                            <img class="image"
                                 src="<?php echo Media::findById($item['value'])->getImageOfSize(450, 450); ?>">
                        <?php } else { ?>
                            <img class="image">
                        <?php } ?>
                        <div class="s-boxbtn">
                            <input type="hidden" id="pages-<?= $item['key'] ?>" class="form-control"
                                   name="Pages[<?= $item['key'] ?>]" value="<?= $item['value'] ?>" maxlength="50"
                                   aria-required="true">
                            <button type="button" class="btn btn-block btn-danger">Удалить</button>
                            <button type="button" class="btn btn-block bg-purple media-open-button"
                                    data-media-type="image">Выбрать/Изменить
                            </button>
                        </div>
                    </div>
                </div>

            <?php } ?>

            <?php if ($item['type'] == 'map') { ?>
                <div style="display: none">
                    <input type="hidden" id="maps_cords" class="form-control"
                           name="Pages[<?= $item['key'] ?>]" value="<?= $item['value'] ?>" maxlength="50"
                           aria-required="true">
                </div>

                <div id="map" style="width: 100%; height: 450px; margin-bottom: 25px;"></div>

                <script type="text/javascript">
                    window.onload = function () {
                        ymaps.ready(init);

                        function init() {
                            var mainMapPlacemark,
                                <?php if( $item['value']){ ?>
                                mainMapCoords = '<?= $item['value']?>',
                                <?php } else { ?>
                                mainMapCoords = '0, 0';
                            <?php } ?>
                            mainMap = new ymaps.Map('map', {
                                center: mainMapCoords.split(","),
                                zoom: 5
                            }, {
                                searchControlProvider: 'yandex#search'
                            });
                            mainMapPlacemark = createPlacemark(mainMapCoords.split(","));
                            mainMap.geoObjects.add(mainMapPlacemark);
                            getAddress(mainMapCoords, mainMapPlacemark);
                            mainMap.events.add('click', function (e) {
                                var coords = e.get('coords');
                                if (mainMapPlacemark) {
                                    mainMapPlacemark.geometry.setCoordinates(coords);
                                }
                                else {
                                    mainMapPlacemark = createPlacemark(coords);
                                    myMap.geoObjects.add(mainMapPlacemark);

                                }
                                getAddress(coords, mainMapPlacemark);
                            });
                            mainMapPlacemark.events.add('dragend', function () {
                                getAddress(mainMapPlacemark.geometry.getCoordinates(), mainMapPlacemark);
                            });

                        }

                    }
                </script>
            <?php } ?>
            <?php if ($item['type'] == 'map_cities') { ?>

                <div class="box">
                    <div class="box-header">
                        <div class="box-title">
                            <button type="button" class="btn btn-block btn-primary" onclick="addCity(this)">
                                Добавить
                            </button>
                        </div>


                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover table-append">
                            <tr>
                                <th style="width: 20%">Город</th>
                                <th>Сообщение</th>
                                <th style="width: 5%"></th>
                            </tr>

                            <?php foreach ($item['value'] as $city => $message) { ?>
                                <tr>
                                    <td><input type="text" class="form-control" name="cities_names[]"
                                               placeholder="Город ..." value="<?= $city ?>"></td>
                                    <td><input class="form-control" name="cities_messages[]"
                                               placeholder="Сообщение ..." value="<?= $message ?>"></td>
                                    <th>
                                        <button type="button" class="btn btn-block btn-danger btn-xs"
                                                onclick="$(this).parent().parent().remove();">Удалить
                                        </button>
                                    </th>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>

            <?php } ?>
            <?php if ($item['type'] == 'file') { ?>
                <div class="box-item-inner">
                    <div class="box-img">
                        <p><?= $item['title'] ?></p>
                        <?php try {
                            echo Html::a(
                                Media::findById($item['value'])->name,
                                Media::findById($item['value'])->getImageOfSize(),
                                ['target' => '_blank']);
                        } catch (\yii\web\NotFoundHttpException $e) {
                            echo 'Ошибка при загрузке файла';
                        } ?>
                        <div class="s-boxbtn">
                            <input type="hidden" id="settings-<?= $item['key'] ?>" class="form-control"
                                   name="Pages[<?= $item['key'] ?>]" value="<?= $item['value'] ?>" maxlength="50"
                                   aria-required="true">
                            <button type="button" class="btn btn-block btn-danger">Удалить</button>
                            <button type="button" class="btn btn-block bg-purple media-open-button"
                                    data-media-type="<?= $item['type']; ?>">
                                Выбрать/Изменить
                            </button>
                        </div>
                    </div>
                </div>

            <?php } ?>
            <?php }
        }
    } else {

        echo $form->field($model, 'content')->textarea(['rows' => 6,'class'=>'tinymce']);

        echo $form->field($model, 'slug')->textInput(['maxlength' => true]);

    } ?>

    <?php if ($type === 'create') {
        echo $form->field($model, 'content')->textarea(['rows' => 6,'class'=>'tinymce']);

        echo $form->field($model, 'slug')->textInput(['maxlength' => true]);

    } ?>
    <div style="height: 50px;"></div>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
