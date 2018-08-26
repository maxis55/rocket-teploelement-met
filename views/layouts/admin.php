<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\AdminAsset;

AdminAsset::register($this);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
  <meta charset="<?= Yii::$app->charset ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Панель Администратора</title>
  <?php $this->head() ?>
</head>
<body class="hold-transition skin-blue fixed sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?= Yii::$app->request->baseUrl ?>/admin/" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>П</b>У</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Панель</b> Управления</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Сообщения</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-envelope text-aqua"></i> Форма контактов
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-phone text-yellow"></i> Заказ звонка
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">Открыть все</a></li>
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-shopping-cart"></i>
              <span class="label label-danger">3</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Заказы товаров</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-shopping-cart text-green"></i> Заказ
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-shopping-cart text-green"></i> Заказ
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">Открыть все</a></li>
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?= Yii::$app->request->baseUrl ?>/admin_assets/dist/img/avatar5.png" class="user-image" alt="User Image">
              <span class="hidden-xs">выход</span>
            </a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?= Yii::$app->request->baseUrl ?>/admin_assets/dist/img/avatar5.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Администратор</p>
          <a href="<?= Yii::$app->request->baseUrl ?>/admin/"><i class="fa fa-circle text-success"></i> онлайн</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">КОНТЕНТ</li>
        <li>
          <a href="<?= Yii::$app->request->baseUrl ?>/admin/delivery">
            <i class="fa fa-location-arrow"></i> <span>Доставка</span>
          </a>
        </li>
        <li class="header">ТОВАРЫ</li>
        <li>
          <a href="<?= Yii::$app->request->baseUrl ?>/admin/characteristics">
            <i class="fa fa-th"></i> <span>Характеристики</span>
          </a>
        </li>




      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

<?= $content ?>

</div>
<!-- ./wrapper -->
</body>
<?php $this->endBody() ?>
</html>
<?php $this->endPage() ?>