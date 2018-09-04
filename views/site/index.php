<?php
use yii\helpers\Url;
?>
<!-- MAIN CONTENT Start-->
    <div id="content">
        <div class="container">
            <section>
                <div class="container_inner">
                    <div class="main_about_box">
                        <h2 class="title1"><span>О компании</span></h2>
                        <p>Компания ООО «ТеплоЭлемент» - соединительные детали трубопровода и арматура, мехобработка изделий по чертежам</p>
                        <p>Компания ООО «ТеплоЭлемент» занимается поставками трубопроводной арматуры и соединительных деталей трубопровода для промышленных, химических и нефтегазоперерабатывающих предприятий, теплосетей, водоканалов и тепловых электростанций.</p>
                        <p>Полный ассортимент компании ООО «ТеплоЭлемент» насчитывает более 3000 наименований, что позволяет нашим заказчикам закрывать любые потребности в кратчайшие сроки. </p>
                        <div class="main_about_info">
                            <a href="#" class="more_white_btn"><span>Подробнее</span></a>
                            <a href="#" class="add_btn modal_btn" data-modal="request">Получить цены</a>
                        </div>
                        <div class="main_about_img"></div>
                  </div>
             </div>
            </section>
      <section>
                <div class="main_services_box">
                  
                  <div class="main_services_item">
                    <div class="main_services_info_left">
                        <div class="main_services_title">
                            <h2 class="title1"><span>Наши услуги</span></h2>
                        </div>
                        <h3 class="title2">Резка<span>металла</span></h3>
                        <p>Это пример текста, создан для того, чтобы было понятно, где будет текст. Это пример текста, создан для того, чтобы было понятно, где будет текст. </p>
                        <div class="main_services_forbtn">
                            <button class="add_btn">Подробнее</button>
                        </div>
                    </div>
                    <div class="main_services_img">
                        <img src="images/services_img1.png" alt="">
                    </div>
                  </div>
                  <div class="main_services_item">
                    <div class="main_services_img">
                        <img src="images/services_img2.png" alt="">
                    </div>
                    <div class="main_services_info_right">
                        <h3 class="title2">Сварка<span>металла</span></h3>
                        <p>Это пример текста, создан для того, чтобы было понятно, где будет текст. Это пример текста, создан для того, чтобы было понятно, где будет текст. </p>
                        <div class="main_services_forbtn">
                            <button class="add_btn">Подробнее</button>
                        </div>
                    </div>
                   </div>
                   <div class="main_services_item">
                    <div class="main_services_info_left">
                        <h3 class="title2">Изоляция<span>металла</span></h3>
                        <p>Это пример текста, создан для того, чтобы было понятно, где будет текст. Это пример текста, создан для того, чтобы было понятно, где будет текст. </p>
                        <div class="main_services_forbtn">
                            <button class="add_btn">Подробнее</button>
                        </div>
                    </div>
                    <div class="main_services_img">
                        <img src="images/services_img3.png" alt="">
                    </div>
                  </div>
                  <div class="main_services_item">
                    <div class="main_services_img">
                        <img src="images/services_img4.png" alt="">
                    </div>
                    <div class="main_services_info_right">
                        <h3 class="title2">Гибка<span>металла</span></h3>
                        <p>Это пример текста, создан для того, чтобы было понятно, где будет текст. Это пример текста, создан для того, чтобы было понятно, где будет текст. </p>
                        <div class="main_services_forbtn">
                            <button class="add_btn">Подробнее</button>
                        </div>
                    </div>
                  </div>
                  <div class="main_services_item">
                    <div class="main_services_info_left">
                        <h3 class="title2">Вальцовка<span>металла</span></h3>
                        <p>Это пример текста, создан для того, чтобы было понятно, где будет текст. Это пример текста, создан для того, чтобы было понятно, где будет текст. </p>
                        <div class="main_services_forbtn">
                            <button class="add_btn">Подробнее</button>
                        </div>
                    </div>
                    <div class="main_services_img">
                        <img src="images/services_img5.png" alt="">
                    </div>
                  </div>
                  
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
                                <a href="#" class="more_white_btn"><span>Смотреть все новости</span></a>
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