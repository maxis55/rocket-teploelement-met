<?php 

use yii\helpers\Url;
use app\models\ImageHandler;

?>

	<!-- MAIN CONTENT Start-->
	<div class="catalog_bl">
		<div class="breadcrumbs_box">
			<div class="container">
				<div class="container_inner">
					<ul class="breadcrumbs">
						<li>
				          <a class="breadcrumbs_main" href="/">Главная</a>/
				        </li>
				        <li>
				          <span class="breadcrumbs_current"><?= $category['name'] ?></span>
				        </li>
		      </ul>
		    </div>
	     </div>
    	</div>
		<?php include('catalog_bl.php'); ?>
	</div>
	<div id="content">
		<div class="container">
			<div class="container_inner">
				<div class="catalog_inner_wrap">
					<div class="catalog_inner">
					    <h2 class="title8"><span><?= $category['name'] ?></span></h2>
					    <?php $subCategory_image = new ImageHandler ([ "width" => 168, "height" => 136 ]); ?>
					    <?php foreach ($subCategory as $order => $sub) { ?>
				  		<div class="catalog_inner_item">
				  			<span class="catalog_desc_pat"></span>
				  			<span class="catalog_inner_pattern"></span>
				  			<div class="catalog_item_img">
				  				<img src="<?= Yii::$app->request->baseUrl ?>/<?= $subCategory_image -> showLink ($sub['image']); ?>">
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
