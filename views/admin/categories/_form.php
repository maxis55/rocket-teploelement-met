<?php

use app\models\Media;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Category */
/* @var $form yii\widgets\ActiveForm */
/** @var app\models\Category $parentCategories */
?>
<?php //var_dump($parentCategories);?>

<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>
    <?php //options for select ?>
    <?php $selectOptions = array(); ?>
    <?php foreach ($parentCategories as $category): ?>

        <?php $selectOptions[$category->id] = $category->name; ?>

        <?php foreach ($category->categories as $subcategory): ?>
            <?php $selectOptions[$subcategory->id] = '---' . $subcategory->name; ?>
        <?php endforeach; ?>

    <?php endforeach; ?>

    <?= $form->field($model, 'parent')->dropDownList($selectOptions) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'shortdesc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <div class="box-item-inner">
        <div class="box-img">
            <p>Изображение</p>
            <?php if(!empty($model->media)){?>
                <img class="image" src="<?php echo Media::findById($model->media)->getImageOfSize(450, 450); ?>" >
            <?php }else{?>
                <img class="image">
            <?php } ?>
            <div class="s-boxbtn">
                <input type="hidden"
                       name="Category[media]" value="<?= $model->media ?>" maxlength="50"
                       aria-required="true">
                <button type="button" class="btn btn-block btn-danger">Удалить</button>
                <button type="button" class="btn btn-block bg-purple media-open-button">Выбрать/Изменить</button>
            </div>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
