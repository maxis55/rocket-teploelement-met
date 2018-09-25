<?php

/* @var $this yii\web\View */
/* @var $user app\models\User */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['admin/reset-password', 'token' => $user->password_reset_token]);
?>
Здравствуйте <?= $user->username ?>,

Перейдите по ссылке чтобы задать новый пароль, или игнорируйте это сообщение, если вы его не запрашивали:

<?= $resetLink ?>
