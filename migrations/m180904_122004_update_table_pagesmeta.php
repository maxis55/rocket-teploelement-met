<?php

use yii\db\Migration;

/**
 * Class m180904_122004_update_table_pagesmeta
 */
class m180904_122004_update_table_pagesmeta extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180904_122004_update_table_pagesmeta cannot be reverted.\n";

        return false;
    }

    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

        $i=0;

        $this->insert('pagesmeta', [
            'id' => ++$i,
            'page_id' => 1,
            'key' => 'about_title',
            'title' => 'Название блока',
            'value' => 'О компании',
            'type' => 'input'
        ]);
        $this->insert('pagesmeta', [
            'id' => ++$i,
            'page_id' => 1,
            'key' => 'about_content',
            'title' => 'Блок о компании',
            'value' => '<p>Компания ООО «ТеплоЭлемент» - соединительные детали трубопровода и арматура, мехобработка изделий по чертежам</p>
						<p>Компания ООО «ТеплоЭлемент» занимается поставками трубопроводной арматуры и соединительных деталей трубопровода для промышленных, химических и нефтегазоперерабатывающих предприятий, теплосетей, водоканалов и тепловых электростанций.</p>
						<p>Полный ассортимент компании ООО «ТеплоЭлемент» насчитывает более 3000 наименований, что позволяет нашим заказчикам закрывать любые потребности в кратчайшие сроки. </p>',
            'type' => 'tinyarea'
        ]);
        $this->insert('pagesmeta', [
            'id' => ++$i,
            'page_id' => 1,
            'key' => 'about_link',
            'title' => 'ссылка в Подробнее',
            'value' => '#link',
            'type' => 'input'
        ]);

        $this->insert('pagesmeta', [
            'id' => ++$i,
            'page_id' => 1,
            'key' => 'before_5_blocks',
            'title' => 'Текст перед 5 блоками',
            'value' => 'Наши услуги',
            'type' => 'input'
        ]);

        for ($r=1;$r<=5;$r++){
            $this->insert('pagesmeta', [
                'id' => ++$i,
                'page_id' => 1,
                'key' => 'block_'.$r.'_title_1',
                'title' => 'Заголовок черного цвета',
                'value' => 'Текст 1',
                'type' => 'input'
            ]);
            $this->insert('pagesmeta', [
                'id' => ++$i,
                'page_id' => 1,
                'key' => 'block_'.$r.'_title_2',
                'title' => 'Заголовок синего цвета',
                'value' => 'текст 2',
                'type' => 'input'
            ]);
            $this->insert('pagesmeta', [
                'id' => ++$i,
                'page_id' => 1,
                'key' => 'block_'.$r.'_content',
                'title' => 'Контент',
                'value' => '
                    <p>текстовый блок '.$r.' контентная часть</p>
                ',
                'type' => 'tinyarea'
            ]);
            $this->insert('pagesmeta', [
                'id' => ++$i,
                'page_id' => 1,
                'key' => 'block_'.$r.'_link',
                'title' => 'Ссылка блока '.$r,
                'value' => '#link'.$r,
                'type' => 'input'
            ]);
            $this->insert('pagesmeta', [
                'id' => ++$i,
                'page_id' => 1,
                'key' => 'block_'.$r.'_image',
                'title' => 'Изображение блока '.$r,
                'value' => $r,
                'type' => 'media'
            ]);
        }

        $this->insert('pagesmeta', [
            'id' => ++$i,
            'page_id' => 1,
            'key' => 'main_image',
            'title' => 'Изображение в начале страницы',
            'value' => 1,
            'type' => 'media'
        ]);

        $this->insert('pagesmeta', [
            'id' => ++$i,
            'page_id' => 1,
            'key' => 'posts_per_page',
            'title' => 'Количество новостей в слайдере',
            'value' => 5,
            'type' => 'input'
        ]);

        $this->insert('pagesmeta', [
            'id' => ++$i,
            'page_id' => 2,
            'key' => 'phone1',
            'title' => 'Телефон для вопросов',
            'value' => '+7(351)223-92-92',
            'type' => 'input'
        ]);

        $this->insert('pagesmeta', [
            'id' => ++$i,
            'page_id' => 2,
            'key' => 'phone2',
            'title' => 'Телефон для звонков по России',
            'value' => '+7(351)223-92-93',
            'type' => 'input'
        ]);

        $this->insert('pagesmeta', [
            'id' => ++$i,
            'page_id' => 2,
            'key' => 'email',
            'title' => 'Email',
            'value' => 'ZAKAZ@TEPLOMENT.RU',
            'type' => 'input'
        ]);

        $this->insert('pagesmeta', [
            'id' => ++$i,
            'page_id' => 2,
            'key' => 'content',
            'title' => 'Контент',
            'value' => '<p>Наименование ООО «ТеплоЭлемент»</p>
                        <p>Юридический/фактический адрес:  Челябинск, Цинковая 2а/2, офис 10</p>
                        <p>Почтовый адрес: 454008, г. Челябинск, ул. Сетевая 11</p>
                        <p>ИНН: 7404061700</p>
                        <p>КПП: 7404061700</p>
                        <p>ОГРН: 1137404001008</p>',
            'type' => 'tinyarea'
        ]);

        $this->insert('pagesmeta', [
            'id' => ++$i,
            'page_id' => 2,
            'key' => 'link',
            'title' => 'Ссылка на карту предприятия',
            'value' => '#link',
            'type' => 'input'
        ]);

        $this->insert('pagesmeta', [
            'id' => ++$i,
            'page_id' => 2,
            'key' => 'map',
            'title' => 'Метка на карте',
            'value' => '55, 55',
            'type' => 'input'
        ]);

        $this->insert('pagesmeta', [
            'id' => ++$i,
            'page_id' => 3,
            'key' => 'text_block_1',
            'title' => 'Текстовый блок 1',
            'value' => '<p>Сотрудничая с транспортными компаниями-партнёрами, наша организация осуществляет доставку соединительных деталей трубопроводов, таких как отводы, тройники, днища, заглушки, фланцевые элементы, по всей России и странам СНГ. Мы заключаем договор с надёжными транспортными компаниями, в числе которых есть такие известные наименования, как «Деловые линии», КИТ, ПЭК, РАТЭК.</p>
						<p>Условия доставки включают в себя бесплатную транспортировку продукции до терминала транспортной компании(ТК), который расположен в нашем городе. Далее, стоимость доставки от ТК до вашего города рассчитывается исходя из тарификации услуги грузоперевозки до вашего пункта назначения.</p>
						<p>Дополнительно Вы можете воспользоваться услугой самовывоза, которая позволяет нашему складу подготовить Ваш заказ, и в удобное для Вас время, Вы можете забрать продукцию прямо со склада на своём автотранспорте.</p>
						<p>Для крупных покупателей мы имеем возможность заказать отдельный вид транспорта, который предусматривает погрузку соединительных деталей трубопроводов и других элементов. Для этого Вам необходимо связаться с нашим менеджером в процессе формирования заказа и уточнить способ транспортировки при помощи отдельного вида транспорта. В данном случае заказ будет укомплектован соответствующим образом и закреплён в кузове транспортного средства для безопасной транспортировки к пункту назначения.</p>
						<p>Трубопроводная арматура упаковывается в специальную тару, которая предотвращает повреждение и выход из строя в процессе транспортировки до пункта назначения.</p>',
            'type' => 'tinyarea'
        ]);

        $this->insert('pagesmeta', [
            'id' => ++$i,
            'page_id' => 3,
            'key' => 'text_block_2',
            'title' => 'Текстовый блок 2',
            'value' => '<p>Чтобы уточнить стоимость доставки до Вашего города при помощи компаний, предоставляющих транспортные услуги, Вы можете воспользоваться сайтом одной из выбранной компании, где указана стоимость доставки от нашего региона в ваш пункт назначения.</p>
							<p>Для получения груза на складе нашей компании, а также через транспортные компании, необходимо выполнение следующих условий</p>
							<ul>
								<li>Наличие доверенности от компании, производившей оплату товара.</li>
								<li>В процессе погрузки проверяем соответствие груза с накладными.</li>
								<li>Получая товар, клиенту выдаётся - накладная установленной формы, счёт-фактура, оригинал счета на оплату, паспорта на изделия, сертификаты соответствия, для транспорта - товарно-транспортная накладная.</li>
								<li>Получатель должен расписаться в документах отгрузки и проверить количество получаемого товара.</li>
								<li>В товарно-транспортных накладных ставятся соответствующие отметки, необходимые для отчёта транспортным компаниям.</li>
							</ul>',
            'type' => 'tinyarea'
        ]);

        $this->insert('pagesmeta', [
            'id' => ++$i,
            'page_id' => 3,
            'key' => 'image_1',
            'title' => 'Изображение',
            'value' => 2,
            'type' => 'media'
        ]);

        $this->insert('pagesmeta', [
            'id' => ++$i,
            'page_id' => 3,
            'key' => 'text_block_3',
            'title' => 'Текстовый блок 3',
            'value' => '<p><span style="color: #00bdff">Условия доставки</span>является дополнительной частью нашего сотрудничества, и данный вопрос регулируется вспомогательными документами и регламентными положениями, которые заключаются между покупателем и производителем металлоконструкций. </p>
							<p>Ответственность нашей компании за товар сохраняется до момента погрузки на транспортное средство, дополнительную ответственность перевозки груза возлагают на себя транспортные компании, о чем указывается в договоре на доставку продукции.</p>
							<img src="images/partners1.png" alt="">
							<img src="images/partners2.png" alt="">
							<img src="images/partners3.png" alt="">
							<img src="images/partners4.png" alt="">',
            'type' => 'tinyarea'
        ]);

        $this->insert('pagesmeta', [
            'id' => ++$i,
            'page_id' => 3,
            'key' => 'text_block_4',
            'title' => 'Текстовый блок 4',
            'value' => '<p>Сотрудничая с транспортными компаниями-партнёрами, наша организация осуществляет доставку соединительных деталей трубопроводов, таких как отводы, тройники, днища, заглушки, фланцевые элементы, по всей России и странам СНГ. Мы заключаем договор с надёжными транспортными компаниями, в числе которых есть такие известные наименования, как «Деловые линии», КИТ, ПЭК, РАТЭК.</p>
						<p>Условия доставки включают в себя бесплатную транспортировку продукции до терминала транспортной компании(ТК), который расположен в нашем городе. Далее, стоимость доставки от ТК до вашего города рассчитывается исходя из тарификации услуги грузоперевозки до вашего пункта назначения.</p>
						<p>Дополнительно Вы можете воспользоваться услугой самовывоза, которая позволяет нашему складу подготовить Ваш заказ, и в удобное для Вас время, Вы можете забрать продукцию прямо со склада на своём автотранспорте.</p>
						<p>Для крупных покупателей мы имеем возможность заказать отдельный вид транспорта, который предусматривает погрузку соединительных деталей трубопроводов и других элементов. Для этого Вам необходимо связаться с нашим менеджером в процессе формирования заказа и уточнить способ транспортировки при помощи отдельного вида транспорта. В данном случае заказ будет укомплектован соответствующим образом и закреплён в кузове транспортного средства для безопасной транспортировки к пункту назначения.</p>
						<p>Трубопроводная арматура упаковывается в специальную тару, которая предотвращает повреждение и выход из строя в процессе транспортировки до пункта назначения.</p>',
            'type' => 'tinyarea'
        ]);

        $this->insert('pagesmeta', [
            'id' => ++$i,
            'page_id' => 4,
            'key' => 'posts_per_page',
            'title' => 'Количество новостей на странице',
            'value' => 8,
            'type' => 'input'
        ]);

        $this->insert('pagesmeta', [
            'id' => ++$i,
            'page_id' => 5,
            'key' => 'image',
            'title' => 'Изображение',
            'value' => 1,
            'type' => 'media'
        ]);

        $this->insert('pagesmeta', [
            'id' => ++$i,
            'page_id' => 5,
            'key' => 'text_block',
            'title' => 'Текст на странице',
            'value' => 'СТРАНИЦА НЕ НАЙДЕНА',
            'type' => 'tinyarea'
        ]);
    }

    public function down()
    {
        $this->delete('pagesmeta', ['id' => '<=12']);
        return true;
    }
}
