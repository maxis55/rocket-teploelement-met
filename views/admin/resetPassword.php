<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ResetPasswordForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->title = 'Задать новый пароль';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="login-box">
    <div class="login-logo">
        <a href="<?= Url::base(true) ?>"><b>Teplo</b>Element</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg"><?= Html::encode($this->title) ?></p>

        <?php $form = ActiveForm::begin(['id' => 'reset-password-form']); ?>

        <p>Пожалуйста, введите новый пароль:</p>

        <?= $form->field($model, 'password')->passwordInput(['autofocus' => true]) ?>


        <div class="row">

            <!-- /.col -->
            <div class="col-md-2 col-md-offset-4">
                <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
            </div>
            <!-- /.col -->
        </div>


        <?php ActiveForm::end(); ?>

    </div>
    <!-- /.login-box-body -->
</div><!-- /.login-box -->


