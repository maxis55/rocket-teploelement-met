<?php 

use yii\helpers\Url;

?>

	<!-- MAIN CONTENT Start-->

        <?= $this->render('@app/views/site/categories_template.php') ?>

	<div id="content">
		<div class="container">
			<div class="container_inner">
				<div class="catalog_inner_wrap">
					<div class="catalog_inner">
					    <h2 class="title8"><span><?= $category['name'] ?></span></h2>

					    <?php foreach ($subCategory as  $sub) { ?>
				  		<div class="catalog_inner_item">
				  			<span class="catalog_desc_pat"></span>
				  			<span class="catalog_inner_pattern"></span>
				  			<div class="catalog_item_img">
				  				<img src="<?= Yii::$app->request->baseUrl ?>/images/img1.jpg">
				  			</div>
				  			<div class="catalog_item_content">
				  				<h4 class="title9"><a href="<?= Url::toRoute(['site/catalog-subcategory', 'category' => $slug, 'subcategory' => $sub['slug']]) ?>"><?= $sub['name'] ?></a></h4>
				  				<p><?= $sub['shortdesc'] ?></p>
				  			</div>
				  		</div>
				  		<?php } ?>
				    </div>
				    <div class="catalog_description">
				  		<?= $category['content'] ?>
					</div>
				</div>
			</div>
		</div>
	</div>
    <?php include('contact_form.php'); ?>
