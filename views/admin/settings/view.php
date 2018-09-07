<?php

use app\models\Media;
use app\models\Pagesmeta;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Pages */

$this->title = 'Глобальные настройки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pages-view">


    <p>
        <?php // Html::a('Обновить', ['admin/settings-update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

    </p>

    <?php

    if (!empty($meta)) { ?>
        <table id="w0" class="table table-striped table-bordered detail-view">
            <tbody>
            <?php

            foreach ($meta as $meta_item) { ?>
                <tr>
                    <th><?= $meta_item['title'] ?></th>
                    <td><?php if (($meta_item['type'] == 'media') && ($meta_item['value'] != '')) {
                            try {
                                echo Html::img(Media::findById($meta_item['value'])->getImageOfSize(450, 450), ['alt' => 'img']);
                            } catch (\yii\web\NotFoundHttpException $e) {
                                echo 'Ошибка при загрузке картинки';
                            }
                        } else {
                            if (($meta_item['type'] == 'menu')) {
                                echo '<ul>';
                                foreach ($meta_item['value'] as $meta_value_item) {
                                    echo "<li><a href='" . Url::base(true) . "/{$meta_value_item['url'][0]}'>{$meta_value_item['label']}</a></li>";
                                }
                                echo '</ul>';

                            } else {
                                echo $meta_item['value'];
                            }
                        } ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    <?php }
    ?>
</div>
