<?php

use app\models\Pagesmeta;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Pages */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pages-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

    <?php 
    if($model->id <= 5) {

        $data = Pagesmeta::getFrontPageMeta($model->slug, true);

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
                    <div class="form-group field-pages-<?= $item['key'] ?>">
                        <label class="control-label" for="pages-<?= $item['key'] ?>">Описание</label>
                        <textarea id="pages-<?= $item['key'] ?>" class="form-control" name="Pages[<?= $item['key'] ?>]"
                                  rows="6"><?= $item['title'] ?></textarea>
                    </div>
                <?php } ?>

                <?php if ($item['type'] == 'media') { ?>
                    <div class="form-group field-pages-<?= $item['key'] ?> required">
                        <label class="control-label" for="pages-<?= $item['key'] ?>"><?= $item['title'] ?></label>
                        <input type="text" id="pages-<?= $item['key'] ?>" class="form-control"
                               name="Pages[<?= $item['key'] ?>]" value="<?= $item['value'] ?>" maxlength="50"
                               aria-required="true">
                    </div>
                <?php } ?>

            <?php }
        }
    } ?>



    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
