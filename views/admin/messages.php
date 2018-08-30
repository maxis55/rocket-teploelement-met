<?php

use yii\helpers\Url;
use yii\widgets\LinkPager;

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Сообщения
        <small>список сообщений пришедших с форм на сайте</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
    <?=LinkPager::widget([ 'pagination' => $pages, ])?>
      <form action="<?= Url::toRoute(['admin/delivery']) ?>" method="post">
      <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover table-append">
                <tr>
                  <th style="width: 10px"></th>
                  <th>Имя</th>
                  <th>Телефон</th>
                  <th>Файл</th>
                  <th>Сообщение</th>
                  <th>Дата</th>
                </tr>
                <?php foreach ($messages as $message) { ?>
                <tr>
                  <td>
                      <?php $fa = 'envelope';
                      if($message['form']==2) $fa = 'phone'; ?>
                      <i class="fa fa-<?=$fa?> text-aqua"></i>
                  </td>
                  <td><?=$message['name']?></td>
                  <td>
                    <a href="tel:<?=$message['phone']?>"><?=$message['phone']?></a>
                  </td>
                  <td>
                    <?php if($message['file']){ ?>
                      <a href="<?= Yii::$app->request->baseUrl ?>/uploads/<?=$message['id']?>.<?=$message['file']?>" target="_blank">Файл</a>
                    <?php } ?>
                    </td>
                  <td><?=$message['message']?></td>
                  <td><?=$message['date']?></td>
                </tr>
              <?php } ?>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
      </form>
    <?=LinkPager::widget([ 'pagination' => $pages ])?>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->