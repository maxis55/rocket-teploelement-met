<?php

use yii\db\Migration;

/**
 * Class m180824_132203_create_steel
 */
class m180824_132203_create_steel extends Migration
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
        echo "m180824_132203_create_steel cannot be reverted.\n";

        return false;
    }

    public function up()
    {
        $this->createTable('steel', [
            'id' => $this->primaryKey(),
            'product' => $this->integer(),
            'name' => $this->string(255)->notNull(),
        ]);

        $this->createIndex(
            'idx-steel-product',
            'steel',
            'product'
        );

        return true;
    }

    public function down()
    {
        $this->dropTable('steel');
        return true;
    }
}
