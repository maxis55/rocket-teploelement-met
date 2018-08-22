<?php

use yii\db\Migration;

/**
 * Class m180822_102631_create_delivery
 */
class m180822_102631_create_delivery extends Migration
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
        echo "m180822_102631_create_delivery cannot be reverted.\n";

        return false;
    }

    public function up()
    {
        $this->createTable('delivery', [
            'id' => $this->primaryKey(),
            'city' => $this->string(255),
            'text' => $this->text()->notNull(),
        ]);

    }

    public function down()
    {

        $this->dropTable('delivery');

        return true;
    }
}
