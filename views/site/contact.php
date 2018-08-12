    <!-- MAIN CONTENT Start-->
    <div class="breadcrumbs_bl">
        <div class="breadcrumbs_box">
            <div class="container">
                <div class="container_inner">
                    <ul class="breadcrumbs">
                        <li>
                          <a class="breadcrumbs_main" href="#">Главная</a>/
                        </li>
                        <li>
                          <span class="breadcrumbs_current">Контакты</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div id="content" class="type">
        <div class="container">
            <div class="container_inner">
                <div class="contacts_bl">
                    <div class="content_title">
                    <h2 class="title4"><span>Контакты</span></h2>
                  </div>
                  <div class="contacts_box">
                        <div class="contacts_info">
                            <div class="contacts_info_call">
                                <div class="contacts_call_item">
                                    <span>По всем вопросам</span>
                                    <a href="tel:+7(351)2239392" class="header_info_lk"><span>+7(351)</span>223-93-92</a>
                                </div>
                                <div class="contacts_call_item">
                                    <span>Звонок по России</span>
                                    <a href="tel:+7(351)2239392" class="header_info_lk"><span>+7(351)</span>223-93-92</a>
                                </div>
                                <div class="contacts_call_item">
                                    <button class="blue_btn modal_btn" data-modal="call">Заказать звонок</button>
                                </div>
                            </div>
                            <div class="contacts_info_email">
                                <a href="mailto:zakaz@teploment.ru" class="info_sub_lk">zakaz@teploment.ru</a>
                            </div>
                            <div class="contacts_info_data">
                                <dl class="contacts_data_list">
                                    <div>
                                        <dt>Наименование</dt>
                                        <dd>ООО «ТеплоЭлемент»</dd>
                                    </div>
                                    <div>
                                        <dt>Юридический/фактический адрес: </dt>
                                        <dd>Челябинск, Цинковая 2а/2, офис 10</dd>
                                    </div>
                                    <div>
                                        <dt>Почтовый адрес:</dt>
                                        <dd>454008, г. Челябинск, ул. Сетевая 11</dd>
                                    </div>
                                    <div>
                                        <dt>ИНН:</dt>
                                        <dd>7404061700</dd>
                                    </div>
                                    <div>
                                        <dt>КПП:</dt>
                                        <dd>7404061700</dd>
                                    </div>
                                    <div>
                                        <dt>ОГРН:</dt>
                                        <dd>1137404001008</dd>
                                    </div>
                  </dl>
                  <a href="#" target="_blank" class="red_btn">Карта предприятия</a>
                            </div>
                        </div>
                        <div class="contacts_map">
                            <div id="map_box" class="map"></div>
                        </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
    <section>
        <div class="main_contacts_bl">
            <div class="container">
                <div class="main_contacts_box">
                    <div class="main_contacts_info">
                        <div class="main_contacts_img">
                            <img src="images/main_contats_pattern.png" alt="">
                        </div>
                        <div class="price_list_box">
                            <span>Полный прайс-лист на товары и услуги</span>
                            <a href="price-list.txt" target="_blank">Скачать прайс-лист</a>
                        </div>
                    </div>
                    <div class="main_contacts_form">
                        <div class="contacts_form_inner">
                            <span class="contacts_form_title"><span>Оставить</span>заявку</span>
                            <span class="contacts_form_message">Заполните заявку и в ближайшее время мы с вами свяжемся</span>
                            <form class="formSend">
                                <div class="form_item user">
                                    <input type="text" placeholder="ФИО" name="name"  onblur="if(this.placeholder==''){this.placeholder='ФИО';this.classList.remove('hide');}" onfocus="if(this.placeholder =='ФИО'){this.placeholder='';this.classList.add('hide');}">
                                </div>
                                <div class="form_item phone">
                                    <input type="tel" placeholder="Телефон" name="phone" onblur="if(this.placeholder==''){this.placeholder='Телефон';this.classList.remove('hide');}" onfocus="if(this.placeholder =='Телефон' ){this.placeholder='';this.classList.add('hide');}">
                                </div>
                                <div class="form_item mes">
                                    <textarea placeholder="Сообщение" name="message" onblur="if(this.placeholder==''){this.placeholder='Сообщение';this.classList.remove('hide');}" onfocus="if(this.placeholder =='Сообщение' ){this.placeholder='';this.classList.add('hide');}"></textarea>
                                </div>
                                <div class="form_item flex">
                                    <label for="file" class="label_select_file">
                                        <span class="file_btn">Прикрепить файл</span>
                                        <span class="file_select"></span>
                                        <input type="file" name="file" id="file" class="file">
                                    </label>
                                    <button class="send_btn sendBtn">Отправить</button>
                                </div>
                            </form>
                     </div>
                    </div>
                </div>
            </div>
        </div>
    </section>