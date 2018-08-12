    <!-- MAIN CONTENT Start-->

    <div id="content" class="type">
        <div class="container">
            <div class="container_inner">
                <div class="errors_bl">
                    <span>Страница не найдена</span>
        
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
                                    <button class="blue_btn sendBtn">Отправить</button>
                                </div>
                            </form>
                     </div>
                    </div>
                </div>
            </div>
        </div>
    </section>