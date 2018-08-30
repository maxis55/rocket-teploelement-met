<?php

use yii\helpers\Url;

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Характеристики
        <small>список характеристик товаров</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <form action="<?= Url::toRoute(['admin/characteristics']) ?>" method="post">
      <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">
                  <button type="submit" class="btn btn-block btn-success">Сохранить</button>
              </h3>

              <div class="box-tools">
                <div class="input-group input-group-sm">
                <button type="button" class="btn btn-block btn-primary">Добавить</button>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>Характеристика</th>
                  <th style="width: 5%"></th>
                </tr>
                <?php foreach ($characteristics as $order => $characteristic) { ?>
                <tr>
                  <td>
                    <input type="text" class="form-control" name="characteristic[<?= $characteristic['id'] ?>]" placeholder="Характеристика ..." value="<?= $characteristic['name'] ?>">
                  </td>
                  <th><button type="button" class="btn btn-block btn-danger btn-xs">Удалить</button></th>
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
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->