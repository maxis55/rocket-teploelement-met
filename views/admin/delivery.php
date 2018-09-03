<?php

use yii\helpers\Url;

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Время доставки
            <small>список городов и сроки доставки</small>
        </h1>
        <ol class="breadcrumb">
            <li class="active">Расположение</li>
            <li><a href="/" target="_blank">На главной (блок с картой)</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <form action="<?= Url::toRoute(['admin/delivery']) ?>" method="post">
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
                                    <button type="button" class="btn btn-block btn-primary" onclick="addRow()">
                                        Добавить
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover table-append">
                                <tr>
                                    <th style="width: 20%">Город</th>
                                    <th>Сообщение</th>
                                    <th style="width: 5%"></th>
                                </tr>
                                <?php foreach ($delivery as $order => $city) { ?>
                                    <tr>
                                        <td><input type="text" class="form-control" name="city[]"
                                                   placeholder="Город ..." value="<?= $city['city'] ?>"></td>
                                        <td><textarea class="form-control" rows="2" name="text[]"
                                                      placeholder="Сообщение ..."><?= $city['text'] ?></textarea></td>
                                        <th>
                                            <button type="button" class="btn btn-block btn-danger btn-xs"
                                                    onclick="$(this).parent().parent().remove();">Удалить
                                            </button>
                                        </th>
                                    </tr>
                                <?php } ?>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                    <div class="box">

                        <div class="box-body table-responsive no-padding mm-mce">

                            <table class="table table-hover table-append">
                                <tr>

                                    <th>Картинка над контентом</th>

                                </tr>
                                <tr>

                                    <td><input type="file"></td>

                                </tr>
                                <?php for ($i = 0, $contentSize = sizeof($deliveryContent); $i < $contentSize; $i++) {
                                    ?>
                                    <tr>

                                        <th>Контент<?= $i + 1; ?></th>

                                    </tr>
                                    <tr>

                                        <td><textarea class="form-control" rows="2" name="content[]"
                                                      placeholder="Сообщение ..."><?= $deliveryContent[$i]['value'] ?></textarea>
                                        </td>

                                    </tr>
                                    <?php if ($i == 1) {
                                        ?>
                                        <tr>

                                            <th>Картинка рядом с контентом 2</th>

                                        </tr>
                                        <tr>

                                            <td><input type="file"></td>

                                        </tr>
                                        <?php
                                    } elseif ($i == 2) {
                                        ?>
                                        <tr>

                                            <th>Картинки рядом с контентом 3</th>

                                        </tr>
                                        <tr>

                                            <td><input type="file" multiple name="multiple_files"></td>

                                        </tr>
                                        <?php

                                    }

                                }
                                ?>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
            </div>
        </form>
    </section>
    <script>
        function addRow() {
            $(".table-append").append('<tr><td><input type="text" class="form-control" name="city[]" placeholder="Город ..."></td> <td><textarea class="form-control" rows="2" name="text[]" placeholder="Сообщение ..."></textarea></td> <th><button type="button" class="btn btn-block btn-danger btn-xs" onclick="$(this).parent().parent().remove();">Удалить</button></th> </tr>');
        }
    </script>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->