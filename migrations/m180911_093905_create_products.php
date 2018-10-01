<?php

use yii\db\Migration;

/**
 * Class m180911_093905_create_products
 */
class m180911_093905_create_products extends Migration
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
        echo "m180911_093905_create_products cannot be reverted.\n";

        return false;
    }


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('products', [
            'id' => $this->primaryKey(),
            'slug' => $this->string(50)->unique()->notNull(),
            'title' => $this->string(255)->notNull(),
            'content' => $this->text()->notNull(),
            'content2' => $this->text()->notNull(),
            'steel_type' => $this->text(),
            'category_id' => $this->integer(),
            'media_id' => $this->integer(),
        ], 'ENGINE InnoDB');

        $this->createIndex(
            'idx-products-slug',
            'products',
            'slug'
        );


        $this->createIndex(
            'FK_products_media',
            'products',
            'media_id'
        );

        $this->addForeignKey(
            'FK_products_media',
            'products',
            'media_id',
            'media',
            'id',
            'SET NULL'
        );

        $this->createIndex(
            'FK_products_category',
            'products',
            'category_id'
        );

        $this->addForeignKey(
            'FK_products_category',
            'products',
            'category_id',
            'category',
            'id',
            'SET NULL'
        );

        return true;
    }

    public function down()
    {
        $this->dropTable('products');
        return true;
    }

}
