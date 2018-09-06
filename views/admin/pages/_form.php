<?php

use app\models\Media;
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

    <?//= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

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
                    <div class="form-group field-pages-<?= $item['key'] ?> field-pages-description">
                        <label class="control-label" for="pages-<?= $item['key'] ?>">Описание</label>
                        <textarea id="pages-<?= $item['key'] ?>" class="form-control tinymce" name="Pages[<?= $item['key'] ?>]"
                                  rows="6"><?= $item['title'] ?></textarea>
                    </div>
                <?php } ?>

                <?php if ($item['type'] == 'media') { ?>

                    <div class="box-item-inner">
                        <div class="box-img">
                            <p><?=$item['title']?></p>
                            <?php if(!empty($item['value'])){?>
                                <img class="image" src="<?php echo Media::findById($item['value'])->getImageOfSize(450, 450); ?>" >
                            <?php }else{?>
                                <img class="image">
                            <?php } ?>
                            <div class="s-boxbtn">
                                <input type="hidden" id="pages-<?= $item['key'] ?>" class="form-control"
                                       name="Pages[<?= $item['key'] ?>]" value="<?= $item['value'] ?>" maxlength="50"
                                       aria-required="true">
                                <button type="button" class="btn btn-block btn-danger">Удалить</button>
                                <button type="button" class="btn btn-block bg-purple media-open-button">Выбрать/Изменить</button>
                            </div>
                        </div>
                    </div>

                <?php } ?>

            <?php }
        }
    } ?>



    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
