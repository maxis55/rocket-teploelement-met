<?php

use yii\db\Migration;

/**
 * Class m180912_075733_update_products_table
 */
class m180912_075733_update_products_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        for($i=1;$i<200;$i++){
            for ($j = 1; $j <= 10; ++$j) {
                $this->insert('products', [
//                    'id' => $i.$j,
                    'title' => "Товар" .$i. $j,
                    'slug' => "product" .$i. $j,
                    'content'=>'<p>Цена трубы бесшовной 7х1 указана за 1 метр погонный. На оптовые поставки со склада действует система скидок, которую Вы можете уточнить у нашего менеджера. На транзитные позиции с завода-производителя стоимость Труба бесшовная 7х1 х/д зависит от марки стали, диаметра, толщины стенки и особых требований покупателя к данному товару. На объем заказа менее 1 тонны (розничный заказ) возможно применение наценки. Окончательную цену за метр и тонну на трубу бесшовную 7х1 Вы можете получить, запросив  коммерческое предложение или счет у нашего менеджера. При расчёте проекта для вашего удобства в нашей компании предусмотрен перерасчет цен</p>
								<p>Стальная Труба бесшовная 7х1 х/д производится в соответствии с ГОСТом 8733-74 и ГОСТом 8734-78, разработанным в институте сертификации. На всю трубу бесшовную имеются сертификаты качества, которые выдаются после получения товара. Купить трубы бесшовная 7х1 Вы можете купить на одном из наших складов оптом и в розницу. Минимальная партия от одной штуки. На нашем предприятии есть возможность отгружать трубу бесшовную различного размера от 1 метра при наличии остатков от производства конструкций. Чтобы ознакомиться со всем сортаментом, и размерами, указанными в таблице, Вы можете перейти в соответствующий раздел или каталог.</p>',
                    'content2'=>'<h3 >Купить Трубу бесшовную 7х1 от Сталь-Про - это лучший Ваш выбор! </h3>
								<span>Хотите узнать стоимость Труба бесшовная 7х1 х/д – звоните!</span>
									<span>При обращении в нашу компанию Вы получаете:</span>
									<ul>
										<li>Лучший сервис в нашей отрасли</li>
										<li>Оперативный ответ на Ваше обращение</li>
										<li>Профессиональные консультации от менеджера до конструктора и технолога</li>
										<li>Качественный металлопрокат и изделия из бесшовной трубы</li>
										<li>Услуги по металлообработке</li>
										<li>Поставки точно в срок в любую точку России всеми видами транспорта.</li>
									</ul>
								',
                    'steel_type'=>json_encode(array('Марка1'.$i. $j, 'Марка2'.$i. $j,'Марка3'.$i. $j)),
                    'category_id'=>$i,
                    'media_id'=>32
                ]);
            }
        }


        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('products', ['id' => '<=1000']);

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180912_075733_update_products_table cannot be reverted.\n";

        return false;
    }
    */
}
