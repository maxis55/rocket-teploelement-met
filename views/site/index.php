<?php use yii\helpers\Url; ?>
<!-- MAIN CONTENT Start-->
    <div id="content">
        <div class="container">
            <section>
                <div class="container_inner">
                  <div class="main_about_box">
                    <h2 class="title1"><span><?= $page_content['about_title'];?></span></h2>
                    <?= $page_content['about_content'];?>
                    <div class="main_about_info">
                        <a href="<?= $page_content['about_link'];?>" class="more_white_btn"><span>Подробнее</span></a>
                        <a href="#" class="add_btn modal_btn" data-modal="request">Получить цены</a>
                    </div>
                    <div class="main_about_img"></div>
                </div>
             </div>
            </section>
      <section>
        <div class="main_services_box">

            <?php for ($i = 1; $i <= 5; $i++) { ?>
                <div class="main_services_item">
                    <?php if ($i % 2 != 0) { ?>
                        <div class="main_services_info_left">
                            <?php if ($i == 1) { ?>
                                <div class="main_services_title">
                                    <h2 class="title1"><span><?= $page_content['before_5_blocks']?></span></h2>
                                </div>
                            <?php } ?>
                            <h3 class="title2"><?=$page_content['block_'.$i.'_title_1']; ?><span><?=$page_content['block_'.$i.'_title_2']; ?></span></h3>
                            <?= $page_content['block_' . $i . '_content']; ?>
                            <div class="main_services_forbtn">
                                <a href="<?= $page_content['block_' . $i . '_link']; ?>" class="add_btn">Подробнее</a>
                            </div>
                        </div>
                        <div class="main_services_img">
                            <img src="images/services_img<?= $page_content['block_' . $i . '_image']; ?>.png" alt="">
                        </div>
                    <?php } else { ?>
                        <div class="main_services_img">
                            <img src="images/services_img<?= $page_content['block_' . $i . '_image']; ?>.png" alt="">
                        </div>
                        <div class="main_services_info_right">
                            <h3 class="title2"><?= $page_content['block_' . $i . '_title_1']; ?><span><?= $page_content['block_' . $i . '_title_2']; ?></span></h3>
                            <?= $page_content['block_' . $i . '_content']; ?>
                            <div class="main_services_forbtn">
                                <a href="<?= $page_content['block_' . $i . '_link']; ?>" class="add_btn">Подробнее</a>
                            </div>
                        </div>

                    <?php } ?>

                </div>
            <?php } ?>
            </div>
            </section>
        
        </div>
    </div>
    <?php include('contact_form.php'); ?>
    <section>
        <div class="main_news_bl">
            <div class="container">
                <div class="container_inner">
                        <div class="main_news_box">
                            <div class="main_news_title">
                                <h2 class="title1"><span>Наши новости</span></h2>
                            </div>
                                <a href="<?= Url::toRoute(['site/news']) ?>" class="more_white_btn"><span>Смотреть все новости</span></a>
                                <div class="main_news_box_inner">
                                    <div class="owl-carousel-resp"></div>
                                    <div class="owl-carousel">
                                        <?php
                                        /** @var array $news_slider from controller*/

                                        foreach ($news_slider as $single) { ?>
                                            <div>
                                                <div class="main_news_item">
                                                    <figure>
                                                        <figcaption>
                                                            <time datetime="<?= date('Y-m', strtotime($single['date'])); ?>">
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
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                        </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="main_map_bl">
                <div class="container">
                    <div class="main_map_block">
                            <div class="main_map_info">
                        
                                    <label>Узнайте, есть ли поставки в ваш город:</label>
                                    <div class="form_item search">
                                            <input type="search" name="search" placeholder="Ваш город"  autocomplete="off" list="town">
                                            <datalist id="town">
                                              <option value="Москва">
                                              <option value="Казань">
                                              <option value="Петербург">
                                              <option value="Воронеж">
                                              <option value="Хабаровск">
                                            </datalist>
                                    </div>

                                    <button class="blue_btn modal_btn" data-modal="city">Узнать</button>
                            
                            </div>
                            <h2 class="title1">Карта поставок</h2>
                    </div>
                </div>
        </div>
    </section>