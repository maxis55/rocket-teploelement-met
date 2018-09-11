<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Products */
/* @var $form yii\widgets\ActiveForm */
/** @var app\models\Category $parentCategories */
?>

<div class="products-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'steel_type')->textarea(['rows' => 6]) ?>

    <?php $selectOptions = array(); ?>
    <?php foreach ($parentCategories as $category): ?>

        <?php //$selectOptions[$category->id] = $category->name; ?>

        <?php foreach ($category->categories as $subcategory): ?>
            <?php $selectOptions[$subcategory->id] = $subcategory->name; ?>
            <?php foreach ($subcategory->categories as $subsubcategory): ?>
                <?php $selectOptions[$subsubcategory->id] = '---' . $subsubcategory->name; ?>
            <?php endforeach; ?>
        <?php endforeach; ?>

    <?php endforeach; ?>

    <?= $form->field($model, 'category_id')->dropDownList($selectOptions) ?>
    <div class="form-group">
        <div class="s-boxbtn">
            <?php if (!empty($model->media_id)) { ?>
                <img class="image" src="<?php echo $model->media->getImageOfSize(450, 450); ?>">
            <?php } else { ?>
                <img class="image">
            <?php } ?>
            <?= $form->field($model, 'media_id', ['options' => ['tag' => false], 'errorOptions' => ['tag' => null]])->hiddenInput()->label(false) ?>
            <button type="button" class="btn btn-block btn-danger">Удалить</button>
            <button type="button" class="btn btn-block bg-purple media-open-button" data-media-type="image">
                Выбрать/Изменить
            </button>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
