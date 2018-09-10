<?php

use app\models\Media;
use app\models\Pagesmeta;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Settings */
/* @var $form yii\widgets\ActiveForm */
/* @var $pagesSlugs app\models\Pages */
?>

<div class="settings-form">


    <form method="post">
        <?php


        if (!empty($meta)) {
            foreach ($meta as $item) { ?>

                <?php if ($item['type'] == 'input') { ?>
                    <div class="form-group field-settings-<?= $item['key'] ?> required">
                        <label class="control-label" for="settings-<?= $item['key'] ?>"><?= $item['title'] ?></label>
                        <input type="text" id="settings-<?= $item['key'] ?>" class="form-control"
                               name="<?= $item['key'] ?>" value="<?= $item['value'] ?>" maxlength="50"
                               aria-required="true">
                    </div>
                <?php } ?>

                <?php if ($item['type'] == 'tinyarea') { ?>
                    <div class="form-group field-settings-<?= $item['key'] ?> field-settings-description">
                        <label class="control-label" for="settings-<?= $item['key'] ?>">Описание</label>
                        <textarea id="settings-<?= $item['key'] ?>" class="form-control tinymce"
                                  name="<?= $item['key'] ?>"
                                  rows="6"><?= $item['title'] ?></textarea>
                    </div>
                <?php } ?>

                <?php if ($item['type'] == 'image') { ?>

                    <div class="box-item-inner">
                        <div class="box-img">
                            <p><?= $item['title'] ?></p>
                            <?php try {
                                ?>
                                <img class="image"
                                     src="<?php echo Media::findById($item['value'])->getImageOfSize(450, 450); ?>"> <?php
                            } catch (\yii\web\NotFoundHttpException $e) {
                                echo 'Не может загрузить картинку';
                            } ?>
                            <div class="s-boxbtn">
                                <input type="hidden" id="settings-<?= $item['key'] ?>" class="form-control"
                                       name="<?= $item['key'] ?>" value="<?= $item['value'] ?>" maxlength="50"
                                       aria-required="true">
                                <button type="button" class="btn btn-block btn-danger">Удалить</button>
                                <button type="button" class="btn btn-block bg-purple media-open-button" data-media-type="<?=$item['type'];?>">
                                    Выбрать/Изменить
                                </button>
                            </div>
                        </div>
                    </div>

                <?php } ?>

                <?php if ($item['type'] == 'input_email') { ?>

                    <div class="form-group field-settings-<?= $item['key'] ?> required">
                        <label class="control-label" for="settings-<?= $item['key'] ?>"><?= $item['title'] ?></label>
                        <input type="email" id="settings-<?= $item['key'] ?>" class="form-control"
                               name="<?= $item['key'] ?>" value="<?= $item['value'] ?>" maxlength="50"
                               aria-required="true">
                    </div>

                <?php } ?>

                <?php if ($item['type'] == 'menu') { ?>

                    <p><b><?= $item['title'] ?></b></p>
                    <?php for ($i = 0, $sizeofValues = sizeof($item['value']); $i < $sizeofValues; $i++): ?>
                        <div class="input-group" style="width: 100%">


                            <input name="<?= $item['key'] . "[$i]['label']" ?>" required type="text"
                                   class="form-control input-sm" value="<?= $item['value'][$i]['label']; ?>"/>

                            <span class="input-group-btn" style="width:0px;"></span>


                            <select name="<?= $item['key'] . "[$i]['url'][0]" ?>" class="form-control input-sm">
                                <?php foreach ($pagesSlugs as $pagesSlug): ?>
                                    <option <?= $pagesSlug['slug'] == $item['value'][$i]['url'][0] ? 'selected' : ''; ?>>
                                        <?= $pagesSlug['title']; ?>
                                        </option>
                                <?php endforeach; ?>
                            </select>

                        </div>

                    <?php endfor; ?>

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
                            }?>
                            <div class="s-boxbtn">
                                <input type="hidden" id="settings-<?= $item['key'] ?>" class="form-control"
                                       name="<?= $item['key'] ?>" value="<?= $item['value'] ?>" maxlength="50"
                                       aria-required="true">
                                <button type="button" class="btn btn-block btn-danger">Удалить</button>
                                <button type="button" class="btn btn-block bg-purple media-open-button" data-media-type="<?=$item['type'];?>">
                                    Выбрать/Изменить
                                </button>
                            </div>
                        </div>
                    </div>

                <?php } ?>
            <?php }
        }
        ?>


        <div class="form-group">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        </div>

    </form>

</div>
