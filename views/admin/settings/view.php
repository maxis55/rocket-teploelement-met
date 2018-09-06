<?php

use app\models\Media;
use app\models\Pagesmeta;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Pages */

$this->title='Глобальные настройки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pages-view">



    <p>
        <?php// Html::a('Обновить', ['admin/settings-update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

    </p>

    <?php

	    if ( ! empty( $meta ) ) { ?>
            <table id="w0" class="table table-striped table-bordered detail-view">
                <tbody>
			    <?php foreach ( $meta as $item ) { ?>
                    <tr>
                        <th><?= $item['title'] ?></th>
                        <td><?php if ( ( $item['type'] == 'media' ) && ( $item['value'] != '' ) ) {
		                        try {
			                        echo Html::img( Media::findById( $item['value'] )->getImageOfSize( 450, 450 ), [ 'alt' => 'img' ] );
		                        } catch ( \yii\web\NotFoundHttpException $e ) {
		                            echo 'Ошибка при загрузке картинки';
		                        }
	                        } else {
							    echo $item['value'];
						    } ?></td>
                    </tr>
			    <?php } ?>
                </tbody>
            </table>
	    <?php }
   ?>
</div>
