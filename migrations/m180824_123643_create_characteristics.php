<?php

use yii\db\Migration;

/**
 * Class m180824_123643_create_characteristics
 */
class m180824_123643_create_characteristics extends Migration
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
        echo "m180824_123643_create_characteristics cannot be reverted.\n";

        return false;
    }

    public function up()
    {
        $this->createTable('characteristics', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
        ]);

        return true;
    }

    public function down()
    {
        $this->dropTable('characteristics');
        return true;
    }
}
