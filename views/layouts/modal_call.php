<?php 

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>

  <div class="modal" id="call" style="background:url(<?= Yii::$app->request->baseUrl ?>/images/bg_modal_call.jpg) 0 0 no-repeat;background-size: cover;">
    <div class="modal_content">
        <div class="modal_content_inner">
        <div class="modal_close" onclick=""></div>
        <div class="modal_box_call">
            <div class="modal_call_logo"></div>
            <h2 class="title3">Обратный звонок</h2>
                <?php $form = ActiveForm::begin(['options' => ['class' => 'formSend form_call']]); ?>
                    <?= $form->field($this->params['modal_call'], 'name', ['options' => ['class' => 'form_item']])->textInput()->label(false) ?>
                    <?= $form->field($this->params['modal_call'], 'phone', ['options' => ['class' => 'form_item']])->textInput()->label(false) ?>
                    <?= $form->field($this->params['modal_call'], 'permission', ['options' => ['class' => 'form_item']])->checkboxList(['permission'=>'Нажимая на кнопку, Вы даете свое согласие на обработку персональных данных'])->label(false) ?>
                    <?= Html::submitButton('Заказать звонок', ['class' => 'blue_btn sendBtn']) ?>
                <?php ActiveForm::end(); ?>
        </div>
            </div>
    </div>
  </div>