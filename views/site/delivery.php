<?php

use app\models\Media;

$this->title='Доставка';
$this->params['breadcrumbs'][] = $this->title;
/** @var array $page_content */
/** @var array $media_arr */
?>
	<!-- MAIN CONTENT Start-->

        <?= $this->render('categories_breadcrumbs_template.php') ?>

	<div id="content">
		<div class="container">
			<div class="container_inner">
				<div class="delivery_bl">
                <div class="content_title">
                    <h2 class="title4"><span>Доставка</span></h2>
                </div>

                <div class="delivery_block">
                    <div class="delivery_block_img">
                        <img src="<?= Media::getImageOfSizeStatic($media_arr[ $page_content['image_1'] ] ['name'],'image') ?>" alt="" class="lg">
                    </div>
                    <?= $page_content['text_block_1']?>
                </div>
                <div class="delivery_content">
                    <div class="delivery_content_inner">
                        <?= $page_content['text_block_2']; ?>
                    </div>
                    <div class="delivery_content_img">
                        <img src="<?= Media::getImageOfSizeStatic($media_arr[ $page_content['image_2'] ] ['name'],'image') ?>" alt="">
                    </div>
                </div>
                <div class="delivery_partners">
                    <div class="delivery_partners_mes">
                        <?= $page_content['text_block_3']; ?>
                    </div>
                    <?= $page_content['text_block_4']; ?>

                </div>
            </div>
			</div>
		</div>
	</div>
    <?= $this->render('contact_form.php') ?>