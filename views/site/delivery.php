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
                        <span class="breadcrumbs_current">Доставка</span>
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
            <div class="delivery_bl">
                <div class="content_title">
                    <h2 class="title4"><span>Доставка</span></h2>
                </div>

                <div class="delivery_block">
                    <div class="delivery_block_img">
                        <img src="images/delivery1.jpg" alt="" class="lg">
                        <img src="images/delivery3.jpg" alt="" class="md">
                        <img src="images/delivery4.jpg" alt="" class="xs">
                    </div>
                    <?=$deliveryContent["delivery_content0"]['value'];?>

                </div>
                <div class="delivery_content">
                    <div class="delivery_content_inner">
                        <?=$deliveryContent["delivery_content1"]['value'];?>

                    </div>
                    <div class="delivery_content_img">
                        <img src="images/delivery2.jpg" alt="">
                    </div>
                </div>
                <div class="delivery_partners">
                    <div class="delivery_partners_mes">
                        <?=$deliveryContent["delivery_content2"]['value'];?>

                        <div class="delivery_partners_img">
                            <div>
                                <img src="images/partners1.png" alt="">
                            </div>
                            <div>
                                <img src="images/partners2.png" alt="">
                            </div>
                            <div>
                                <img src="images/partners3.png" alt="">
                            </div>
                            <div>
                                <img src="images/partners4.png" alt="">
                            </div>
                        </div>
                    </div>
                    <?=$deliveryContent["delivery_content3"]['value'];?>


                </div>
            </div>
        </div>
    </div>
</div>
<?php include('contact_form.php'); ?>