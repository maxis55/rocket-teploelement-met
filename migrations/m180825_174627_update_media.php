<?php

use yii\db\Migration;

/**
 * Class m180825_174627_update_media
 */
class m180825_174627_update_media extends Migration
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
        echo "m180825_174627_update_media cannot be reverted.\n";

        return false;
    }

    public function up()
    {

        for ($i=1; $i < 11; $i++) { 
            $this->insert('media', [
                'image' => $i.'.jpeg',
            ]);
        }



        return true;
    }

    public function down()
    {
        $this->delete('media');

        return true;
    }
}
