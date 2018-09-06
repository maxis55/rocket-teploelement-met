<?php

use yii\db\Migration;

/**
 * Class m180620_071143_update_media
 */
class m180620_071143_update_table_media extends Migration
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
        echo "m180620_071143_update_media cannot be reverted.\n";

        return false;
    }

    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $i = 0;

        $this->insert('media',[
           'id'=>++$i,
           'name'=>'404.png',
           'title'=>'404',
           'alt'=>'картинка 404'
        ]);

        $this->insert('media',[
            'id'=>++$i,
            'name'=>'armature.png',
            'title'=>'арматура',
            'alt'=>'арматура'
        ]);

        $this->insert('media',[
            'id'=>++$i,
            'name'=>'banner.jpg',
            'title'=>'баннер',
            'alt'=>'баннер'
        ]);

        $this->insert('media',[
            'id'=>++$i,
            'name'=>'beam.png',
            'title'=>'бим',
            'alt'=>'бим'
        ]);

        $this->insert('media',[
            'id'=>++$i,
            'name'=>'bg_main_about.png',
            'title'=>'о нас главная',
            'alt'=>'о нас главная'
        ]);

        $this->insert('media',[
            'id'=>++$i,
            'name'=>'channel.png',
            'title'=>'чанел',
            'alt'=>'чанел'
        ]);

        $this->insert('media',[
            'id'=>++$i,
            'name'=>'chart1.png',
            'title'=>'чарт1',
            'alt'=>'чарт1'
        ]);

        $this->insert('media',[
            'id'=>++$i,
            'name'=>'chart2.png',
            'title'=>'чарт2',
            'alt'=>'чарт2'
        ]);

        $this->insert('media',[
            'id'=>++$i,
            'name'=>'chart3.png',
            'title'=>'чарт3',
            'alt'=>'чарт4'
        ]);

        $this->insert('media',[
            'id'=>++$i,
            'name'=>'circle.png',
            'title'=>'круг',
            'alt'=>'круг'
        ]);

        $this->insert('media',[
            'id'=>++$i,
            'name'=>'corner.png',
            'title'=>'угол',
            'alt'=>'угол'
        ]);

        $this->insert('media',[
            'id'=>++$i,
            'name'=>'couplings.png',
            'title'=>'цилиндр с резьбой',
            'alt'=>'цилиндр с резьбой'
        ]);

        $this->insert('media',[
            'id'=>++$i,
            'name'=>'delivery1.jpg',
            'title'=>'доставка 1',
            'alt'=>'доставка 1'
        ]);

        $this->insert('media',[
            'id'=>++$i,
            'name'=>'delivery2.jpg',
            'title'=>'доставка 3',
            'alt'=>'доставка 2'
        ]);

        $this->insert('media',[
            'id'=>++$i,
            'name'=>'delivery3.jpg',
            'title'=>'доставка 3',
            'alt'=>'доставка 3'
        ]);

        $this->insert('media',[
            'id'=>++$i,
            'name'=>'delivery4.jpg',
            'title'=>'доставка 4',
            'alt'=>'доставка 4'
        ]);

        $this->insert('media',[
            'id'=>++$i,
            'name'=>'drivings.png',
            'title'=>'несущие опоры',
            'alt'=>'несущие опоры'
        ]);

        $this->insert('media',[
            'id'=>++$i,
            'name'=>'flanges.png',
            'title'=>'шайба с отверстиями',
            'alt'=>'шайба с отверстиями'
        ]);

        $this->insert('media',[
            'id'=>++$i,
            'name'=>'modal_logo.png',
            'title'=>'модальное лого',
            'alt'=>'модальное лого'
        ]);

        $this->insert('media',[
            'id'=>++$i,
            'name'=>'new.png',
            'title'=>'большая картинка в середине новости',
            'alt'=>'большая картинка в середине новости'
        ]);

        $this->insert('media',[
            'id'=>++$i,
            'name'=>'new.jpg',
            'title'=>'новости',
            'alt'=>'новость'
        ]);

        $this->insert('media',[
            'id'=>++$i,
            'name'=>'new1.jpg',
            'title'=>'новости',
            'alt'=>'новости'
        ]);

        $this->insert('media',[
            'id'=>++$i,
            'name'=>'news1.jpg',
            'title'=>'новости',
            'alt'=>'новости'
        ]);

        $this->insert('media',[
            'id'=>++$i,
            'name'=>'news2.jpg',
            'title'=>'новости',
            'alt'=>'новости'
        ]);

        $this->insert('media',[
            'id'=>++$i,
            'name'=>'offers.jpg',
            'title'=>'предложение',
            'alt'=>'предложение'
        ]);

        $this->insert('media',[
            'id'=>++$i,
            'name'=>'partners1.png',
            'title'=>'партнеры',
            'alt'=>'партнеры'
        ]);

        $this->insert('media',[
            'id'=>++$i,
            'name'=>'partners2.png',
            'title'=>'партнеры',
            'alt'=>'партнеры'
        ]);

        $this->insert('media',[
            'id'=>++$i,
            'name'=>'partners3.png',
            'title'=>'партнеры',
            'alt'=>'партнеры'
        ]);

        $this->insert('media',[
            'id'=>++$i,
            'name'=>'partners4.png',
            'title'=>'партнеры',
            'alt'=>'партнеры'
        ]);

        $this->insert('media',[
            'id'=>++$i,
            'name'=>'pipes.png',
            'title'=>'трубы',
            'alt'=>'трубы'
        ]);

        $this->insert('media',[
            'id'=>++$i,
            'name'=>'pokrovki.png',
            'title'=>'покровки',
            'alt'=>'покровки'
        ]);

        $this->insert('media',[
            'id'=>++$i,
            'name'=>'product.jpg',
            'title'=>'продукт',
            'alt'=>'продукт'
        ]);

        for ($r=1;$r<=6;$r++){
            $this->insert('media',[
                'id'=>++$i,
                'name'=>'product'. $r .'.png',
                'title'=>'продукт',
                'alt'=>'продукт'
            ]);
        }

        $this->insert('media',[
            'id'=>++$i,
            'name'=>'rails.png',
            'title'=>'рельсы',
            'alt'=>'рельсы'
        ]);

        for ($r=1;$r<=5;$r++){
            $this->insert('media',[
                'id'=>++$i,
                'name'=>'services_img'.$r.'.png',
                'title'=>'картинка сервиса' . $r,
                'alt'=>'картинка сервиса'
            ]);
        }

        $this->insert('media',[
            'id'=>++$i,
            'name'=>'sheets.png',
            'title'=>'листы',
            'alt'=>'листы'
        ]);

        $this->insert('media',[
            'id'=>++$i,
            'name'=>'square.png',
            'title'=>'квадраты',
            'alt'=>'квадраты'
        ]);

        $this->insert('media',[
            'id'=>++$i,
            'name'=>'stubs.png',
            'title'=>'подложки',
            'alt'=>'подложки'
        ]);

        $this->insert('media',[
            'id'=>++$i,
            'name'=>'supports.png',
            'title'=>'поддержки',
            'alt'=>'поддержки'
        ]);

        $this->insert('media',[
            'id'=>++$i,
            'name'=>'taps.png',
            'title'=>'гнутые углы',
            'alt'=>'гнутые углы'
        ]);

        $this->insert('media',[
            'id'=>++$i,
            'name'=>'tees.png',
            'title'=>'ответвители',
            'alt'=>'ответвители'
        ]);

        $this->insert('media',[
            'id'=>++$i,
            'name'=>'transitions.png',
            'title'=>'переходы',
            'alt'=>'переходы'
        ]);

        $this->insert('media',[
            'id'=>++$i,
            'name'=>'wire.png',
            'title'=>'кольца',
            'alt'=>'кольца'
        ]);

        echo "Default images created\n";

        return true;
    }

    public function down()
    {
        $this->delete('media', 'id<=30');

        echo "Default images deleted\n";

        return true;
    }
}
