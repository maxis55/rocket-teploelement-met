<?php

use yii\helpers\Url;
use yii\widgets\LinkPager;
use app\models\ImageHandler;

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Изображения
        <small>список всех загруженных изображений на сайте</small>
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
              <div class="timeline-item">
                <div class="timeline-body" style="text-align: center;">
                  <?php $simage = new ImageHandler ([ "width" => 150, "height" => 100 ]); ?>
                  <?php foreach ($media as $image) { ?>
                  <div style="display: inline-block">
                    <a href="<?= Yii::$app->request->baseUrl ?>/media/<?= $image['image']; ?>" target="_blank">
                      <img src="<?= Yii::$app->request->baseUrl ?>/<?= $simage -> showLink ($image['image']); ?>" class="margin" style="margin-bottom:3px">
                    </a>
                    <a href="<?= Url::toRoute(['admin/mdelete', 'id' => $image['id'], 'name' => $image['image']]) ?>" type="button" class="btn btn-block btn-danger margin" style="width: auto; margin-top:3px">Удалить</a>
                  </div>
                  <?php } ?>
                </div>
              </div>
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