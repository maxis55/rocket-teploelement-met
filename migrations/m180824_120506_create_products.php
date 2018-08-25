<?php

use yii\db\Migration;

/**
 * Class m180824_120506_create_products
 */
class m180824_120506_create_products extends Migration
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
        echo "m180824_120506_create_products cannot be reverted.\n";

        return false;
    }

    public function up()
    {
        $this->createTable('products', [
            'id' => $this->primaryKey(),
            'slug' => $this->string(50)->unique()->notNull(),
            'name' => $this->string(255)->notNull(),
            'text' => $this->text()->notNull(),
            'media' => $this->integer(),
        ]);

        $this->createIndex(
            'idx-products-slug',
            'products',
            'slug'
        );

        return true;
    }

    public function down()
    {
        $this->dropTable('products');
        return true;
    }
}
