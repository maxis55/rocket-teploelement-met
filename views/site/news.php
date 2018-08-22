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
				          <span class="breadcrumbs_current">Новости</span>
				        </li>
		      		</ul>
		    	</div>
	     	</div>
    	</div>
    </div>
	<div id="content" class="type">
		<div class="container">
			<div class="container_inner">
				<div class="news_bl">
					<div class="content_title">
						<h2 class="title4"><span>Наши новости</span></h2>
					</div>
					<div class="news_sort_box">
						<span>Сортировать:</span>
						<label class="select_type" for="mark">
							<select id="mark">
								<option>Новые</option>
								<option>Просмотренные</option>
								<option>Недавно просморенные</option>
							</select>
					  </label>
					</div>
					<div class="news_flex">
						<?php foreach ($news as $order => $single) { ?>
						  	<div class="main_news_item">
								<figure>
									<a href="<?= Url::toRoute(['site/news-page', 'slug' => $single['slug']]) ?>" class="news_img">
										<img src="images/news1.jpg" alt="News Image">
									</a>
									<figcaption>
										<time datetime="2012-12">
											<span><?= date('d', strtotime($single['date'])); ?></span>
											<?= date('m.y', strtotime($single['date'])); ?>
										</time>
										<a href="<?= Url::toRoute(['site/news-page', 'slug' => $single['slug']]) ?>" class="news_name"><?= $single['name'] ?></a>
									</figcaption>
									<span class="news_content">
										<?= $single['shortdesc'] ?>
										<a href="<?= Url::toRoute(['site/news-page', 'slug' => $single['slug']]) ?>" class="news_content_lk"></a>
									</span>
								</figure>
							</div>
						<?php } ?>
				      </div>
					<div class="news_more_box">
						<a href="#" class="more_white_btn"><span>Показать еще</span></a>
					</div>
				</div>
	

			</div>
		</div>
	</div>
	<?php include('contact_form.php'); ?>

