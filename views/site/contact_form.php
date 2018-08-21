<?php 

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>

    <section>
        <div class="main_contacts_bl">
            <div class="container">
                <div class="main_contacts_box">
                    <div class="main_contacts_info">
                        <div class="main_contacts_img">
                            <img src="<?= Yii::$app->request->baseUrl ?>/images/main_contats_pattern.png" alt="">
                        </div>
                        <div class="price_list_box">
                            <span>Полный прайс-лист на товары и услуги</span>
                            <a href="price-list.txt" target="_blank">Скачать прайс-лист</a>
                        </div>
                    </div>
                    <div class="main_contacts_form">
                        <div class="contacts_form_inner">
                            <span class="contacts_form_title"><span>Оставить</span>заявку</span>
                            <span class="contacts_form_message">Заполните заявку и в ближайшее время мы с вами свяжемся</span>
                            <?php $form = ActiveForm::begin(['options' => ['class' => 'formSend', 'enctype' => 'multipart/form-data']]); ?>
                                <?= $form->field($this->params['contact_form'], 'name', ['options' => ['class' => 'form_item']])->textInput()->label(false) ?>
                                <?= $form->field($this->params['contact_form'], 'phone', ['options' => ['class' => 'form_item']])->textInput()->label(false) ?>
                                <?= $form->field($this->params['contact_form'], 'message', ['options' => ['class' => 'form_item']])->textarea()->label(false) ?>
                                <?= $form->field($this->params['contact_form'], 'file')->fileInput()->label(false) ?>
                                <?= Html::submitButton('Отправить', ['class' => 'send_btn']) ?>
                            <?php ActiveForm::end(); ?>
                     </div>
                    </div>
                </div>
            </div>
        </div>
    </section>