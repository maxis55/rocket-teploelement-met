<?php

use yii\db\Migration;

/**
 * Handles the creation of table `product_characteristics`.
 * Has foreign keys to the tables:
 *
 * - `products`
 * - `characteristics`
 */
class m180911_104749_create_product_characteristics_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('product_characteristics', [
            'product_id' => $this->integer()->notNull(),
            'characteristics_id' => $this->integer()->notNull(),
            'value'=>$this->string(60)->notNull()
        ]);

        // creates index for column `product_id`
        $this->createIndex(
            'idx-product_characteristics-product_id',
            'product_characteristics',
            'product_id'
        );

        // add foreign key for table `products`
        $this->addForeignKey(
            'fk-product_characteristics-product_id',
            'product_characteristics',
            'product_id',
            'products',
            'id',
            'CASCADE'
        );

        // creates index for column `characteristics_id`
        $this->createIndex(
            'idx-product_characteristics-characteristics_id',
            'product_characteristics',
            'characteristics_id'
        );

        // add foreign key for table `characteristics`
        $this->addForeignKey(
            'fk-product_characteristics-characteristics_id',
            'product_characteristics',
            'characteristics_id',
            'characteristics',
            'id',
            'CASCADE'
        );
        $this->addPrimaryKey('product_characteristics_pk', 'product_characteristics', ['product_id', 'characteristics_id']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `products`
        $this->dropForeignKey(
            'fk-product_characteristics-product_id',
            'product_characteristics'
        );

        // drops index for column `product_id`
        $this->dropIndex(
            'idx-product_characteristics-product_id',
            'product_characteristics'
        );

        // drops foreign key for table `characteristics`
        $this->dropForeignKey(
            'fk-product_characteristics-characteristics_id',
            'product_characteristics'
        );

        // drops index for column `characteristics_id`
        $this->dropIndex(
            'idx-product_characteristics-characteristics_id',
            'product_characteristics'
        );

        $this->dropTable('product_characteristics');
    }
}
