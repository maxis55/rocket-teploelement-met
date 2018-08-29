<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Url;
use app\assets\AdminAsset;

AdminAsset::register($this);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Панель Администратора</title>
  <?php $this->head() ?>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="<?= Url::toRoute(['admin/index']) ?>"><b>Панель</b> Администратора</a>
  </div>
  
  <?= $content ?>
</div>
<!-- /.login-box -->
</body>
<?php $this->endBody() ?>
</html>
<?php $this->endPage() ?>
