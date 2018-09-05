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

        for ($i=1; $i < 11; $i++) { 
            $this->insert('media', [
                'id' => $i,
                'name' => $i.'.jpg',
                'title' => 'Title #'.$i,
                'alt' => 'Alt #'.$i,
            ]);
        }

        $this->insert('media',[
           'id'=>11,
           'name'=>'calculate.png',
           'title'=>'calculate',
           'alt'=>'calculate'
        ]);

        $this->insert('media',[
            'id'=>12,
            'name'=>'find.png',
            'title'=>'find',
            'alt'=>'find'
        ]);

        $this->insert('media',[
            'id'=>13,
            'name'=>'faq.png',
            'title'=>'faq',
            'alt'=>'faq'
        ]);

        $this->insert('media',[
            'id'=>14,
            'name'=>'main.png',
            'title'=>'banner',
            'alt'=>'banner'
        ]);

        $this->insert('media',[
            'id'=>15,
            'name'=>'logo.png',
            'title'=>'logo',
            'alt'=>'Экспресс доставка'
        ]);

        $id_counter = 16;
        for ($i=1; $i < 4; $i++) {
            $this->insert('media', [
                'id' => $id_counter,
                'name' => 'slide'.$i.'.jpg',
                'title' => 'Slide Title #'.$i,
                'alt' => 'Slide Alt #'.$i,
            ]);
            $id_counter++;
        }

        for ($i=1; $i <= 6; $i++) {
            $this->insert('media', [
                'id' => $id_counter,
                'name' => 'icon'.$i.'.png',
                'title' => 'icon#'.$i,
                'alt' => 'Доставка'.$i,
            ]);
            $id_counter++;
        }
        $id_counter=25;
        for ($i=1; $i <= 5; $i++) {
            $this->insert('media', [
                'id' => $id_counter,
                'name' => 'addservice'.$i.'.jpg',
                'title' => 'addservice#'.$i,
                'alt' => 'addservice'.$i,
            ]);
            $id_counter++;
        }

        $this->insert('media', [
            'id' => $id_counter++,
            'name' => 'about.jpg',
            'title' => 'about',
            'alt' => 'about',
        ]);

        $this->insert('media', [
            'id' => $id_counter++,
            'name' => 'favicon.png',
            'title' => 'favicon',
            'alt' => 'favicon',
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
