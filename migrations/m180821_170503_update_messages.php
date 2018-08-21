<?php

use yii\db\Migration;

/**
 * Class m180821_170503_update_messages
 */
class m180821_170503_update_messages extends Migration
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
        echo "m180821_170503_update_messages cannot be reverted.\n";

        return false;
    }

    public function down()
    {
        $this->delete('messages');

        return true;
    }
}
