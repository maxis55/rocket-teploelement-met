<?php

use app\models\Media;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Category */
/* @var $form yii\widgets\ActiveForm */
/** @var app\models\Category $parentCategories */
/** @var array $allCharacteristics */
/** @var string $type */
?>
<?php //var_dump($parentCategories);?>

<div class="category-form tinymce_forms">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>
    <?php //options for select ?>
    <?php $selectOptions = array(); ?>




    <?php
    //characteristics are transfered only on update, characteristics exist only if there is no parent(category is highest in category)
    if ($model->parent == null && $type=='update') {

        //only need characteristics for categories without parent
        echo $form->field($model, 'characteristics')->checkboxList(
            array_column($allCharacteristics, 'title', 'id'),
            ['separator' => '<br>']
        )->label('Какие характеристики принадлежат данной категории?');


    }else{
        foreach ($parentCategories as $category):
            $selectOptions[$category->id] = $category->name;

            foreach ($category->categories as $subcategory):
                $selectOptions[$subcategory->id] = '---' . $subcategory->name;
            endforeach;

        endforeach;

        //
        echo $form->field($model, 'parent')->dropDownList($selectOptions);
    }
    ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'shortdesc')->textInput(['maxlength' => true]) ?>


    <?php if('create'==$type||$model->parent!=null):?>
        <?= $form->field($model, 'content_arr1')->textarea(['rows' => 6,'class'=>'tinymce']) ?>
        <?= $form->field($model, 'content_arr2')->textarea(['rows' => 6,'class'=>'tinymce']) ?>
        <?= $form->field($model, 'content_arr3')->textarea(['rows' => 6,'class'=>'tinymce']) ?>
    <?php else:?>
        <?= $form->field($model, 'content')->textarea(['rows' => 6,'class'=>'tinymce']) ?>
    <?php endif;?>



    <div class="box-item-inner">
        <div class="box-img">
            <p>Изображение</p>
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

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
