<?php

use yii\db\Migration;

/**
 * Class m180824_124215_create_products_characteristics
 */
class m180824_124215_create_products_characteristics extends Migration
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
        echo "m180824_124215_create_products_characteristics cannot be reverted.\n";

        return false;
    }

    public function up()
    {
        $this->createTable('products_characteristics', [
            'id' => $this->primaryKey(),
            'product' => $this->integer(),
            'characteristic' => $this->integer(),
            'value' => $this->string(255)->notNull(),
        ]);

        $this->createIndex(
            'idx-products_characteristics-product',
            'products_characteristics',
            'product'
        );

        return true;

    }

    public function down()
    {

        $this->dropTable('products_characteristics');

        return true;
    }
}
