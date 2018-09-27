<?php

use yii\helpers\Html;
use yii\web\View;use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Products */
/* @var $form yii\widgets\ActiveForm */
/** @var app\models\Category $parentCategories */
?>
<?php
$this->registerJs(<<<EOT

$(document).ready(function(){
    var csrfName=$('meta[name="csrf-param"]').attr('content');
    var csrfToken=$('meta[name="csrf-token"]').attr('content');
    $("#products-category_id").on("change",function(){

        $.ajax({
            url: '/ajax/get-characteristics',
            type: 'get',
            dataType: 'json',
            data: {
                [csrfName]:csrfToken,
                'prod_id':{$model->id},
                'cat_id':$('#products-category_id').val()
            },
            success: function (response) {
                $('#characteristics').html(response['html']);
            }
        });
    });
});
EOT
,View::POS_END); ?>
<div class="products-form tinymce_forms">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6,'class'=>'tinymce']) ?>

    <?= $form->field($model, 'content2')->textarea(['rows' => 6,'class'=>'tinymce']) ?>

    <?php $steel_types = array(); ?>
    <?php $steel_types = json_decode($model->steel_type); ?>

    <div class="box-header">
        <div class="box-title">
            <button type="button" class="btn btn-block btn-primary"
                    onclick="addRow(this,'steel_type[]','Тип стали')">Добавить строку в типы стали
            </button>
        </div>

    </div>
    <table class="table table-hover table-append">
        <tbody>
        <tr>
            <th>Тип стали</th>
            <th style="width: 5%"></th>
        </tr>

        <?php
        if(!empty($steel_types))
        foreach ($steel_types as $steel_type): ?>
            <tr>
                <td>
                    <input class="form-control" name="steel_type[]" placeholder="Тип стали"
                           value="<?=$steel_type;?>" type="text">
                </td>
                <th>
                    <button type="button" class="btn btn-block btn-danger btn-xs"
                            onclick="$(this).parents('tr').remove();">Удалить
                    </button>
                </th>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <div id="characteristics">
        <?= \app\components\OutputHelper::outputCharacteristicsFormProduct($model->category_id,$model->id);?>
    </div>


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
