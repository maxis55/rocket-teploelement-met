<?php 

use yii\helpers\Url;

?>

	<!-- MAIN CONTENT Start-->
	<div class="breadcrumbs_bl">
		<div class="breadcrumbs_box">
			<div class="container">
				<div class="container_inner">
					<ul class="breadcrumbs">
						<li>
		          			<a class="breadcrumbs_main" href="/">Главная</a>/
		        		</li>
				        <li>
				          <a class="breadcrumbs_main" href="<?= Url::toRoute(['site/news']) ?>">Каталог</a>/
				        </li>
				        <li>
				          <span class="breadcrumbs_current"><?= $news['name'] ?></span>
				        </li>
		      		</ul>
		    	</div>
	     	</div>
    	</div>
  	</div>
	<div id="content" class="type">
		<div class="container">
			<div class="container_inner">
				<div class="single_new_bl">
					<div class="content_title">
				  		<h2 class="title4"><span><?= $news['name'] ?></span></h2>
					</div>
	        		<?= $news['content'] ?>
				</div>
		    </div>
	    </div>
	</div>
    <?php include('contact_form.php'); ?>

