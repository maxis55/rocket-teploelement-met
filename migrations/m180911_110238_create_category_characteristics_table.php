<?php

use yii\db\Migration;

/**
 * Handles the creation of table `category_characteristics`.
 * Has foreign keys to the tables:
 *
 * - `category`
 * - `characteristics`
 */
class m180911_110238_create_category_characteristics_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('category_characteristics', [
            'category_id' => $this->integer()->notNull(),
            'characteristics_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `category_id`
        $this->createIndex(
            'idx-category_characteristics-category_id',
            'category_characteristics',
            'category_id'
        );

        // add foreign key for table `category`
        $this->addForeignKey(
            'fk-category_characteristics-category_id',
            'category_characteristics',
            'category_id',
            'category',
            'id',
            'CASCADE'
        );

        // creates index for column `characteristics_id`
        $this->createIndex(
            'idx-category_characteristics-characteristics_id',
            'category_characteristics',
            'characteristics_id'
        );

        // add foreign key for table `characteristics`
        $this->addForeignKey(
            'fk-category_characteristics-characteristics_id',
            'category_characteristics',
            'characteristics_id',
            'characteristics',
            'id',
            'CASCADE'
        );
        $this->addPrimaryKey('category_characteristics_pk', 'category_characteristics', ['category_id', 'characteristics_id']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `category`
        $this->dropForeignKey(
            'fk-category_characteristics-category_id',
            'category_characteristics'
        );

        // drops index for column `category_id`
        $this->dropIndex(
            'idx-category_characteristics-category_id',
            'category_characteristics'
        );

        // drops foreign key for table `characteristics`
        $this->dropForeignKey(
            'fk-category_characteristics-characteristics_id',
            'category_characteristics'
        );

        // drops index for column `characteristics_id`
        $this->dropIndex(
            'idx-category_characteristics-characteristics_id',
            'category_characteristics'
        );

        $this->dropTable('category_characteristics');
    }
}
