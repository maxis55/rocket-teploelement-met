<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\News */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-form tinymce_forms">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6,'class'=>'tinymce']) ?>

    <?= $form->field($model, 'content_middle')->textarea(['rows' => 6,'class'=>'tinymce']) ?>

    <?= $form->field($model, 'content2')->textarea(['rows' => 6,'class'=>'tinymce']) ?>

<!--    --><?//= $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'shortdesc')->textInput(['maxlength' => true]) ?>


    <div class="box-item-inner">
        <div class="box-img">

            <?php if (!empty($model->media)) { ?>
                <img class="image" src="<?php echo $model->media->getImageOfSize(450, 450); ?>">
            <?php } else { ?>
                <img class="image">
            <?php } ?>
            <div class="s-boxbtn">
                <?= $form->field($model, 'media_id')->hiddenInput() ?>
                <button type="button" class="btn btn-block btn-danger">Удалить</button>
                <button type="button" class="btn btn-block bg-purple media-open-button">Выбрать/Изменить</button>
            </div>
        </div>
    </div>
    <div style="height: 50px;"></div>
    <div class="box-item-inner">
        <div class="box-img">

            <?php if (!empty($model->media_content)) { ?>
                <img class="image" src="<?php echo $model->mediaContent->getImageOfSize(450, 450); ?>">
            <?php } else { ?>
                <img class="image">
            <?php } ?>
            <div class="s-boxbtn">
                <?= $form->field($model, 'media_content')->hiddenInput() ?>
                <button type="button" class="btn btn-block btn-danger">Удалить</button>
                <button type="button" class="btn btn-block bg-purple media-open-button">Выбрать/Изменить</button>
            </div>
        </div>
    </div>

    <div style="height: 50px;"></div>
    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
