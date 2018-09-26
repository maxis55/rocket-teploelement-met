<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user app\models\User */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['admin/reset-password', 'token' => $user->password_reset_token]);
?>
<div class="password-reset">
    <p>Здравствуйте <?= Html::encode($user->username) ?>,</p>

    <p>Перейдите по ссылке чтобы задать новый пароль, или игнорируйте это сообщение, если вы его не запрашивали:</p>

    <p><?= Html::a(Html::encode($resetLink), $resetLink) ?></p>
</div>
