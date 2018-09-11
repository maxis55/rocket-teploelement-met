<?php

use yii\db\Migration;

/**
 * Class m180904_152125_create_category
 */
class m180904_152125_create_category extends Migration
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
        echo "m180904_152125_create_category cannot be reverted.\n";

        return false;
    }


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('category', [
            'id' => $this->primaryKey(),
            'slug' => $this->string(20)->notNull()->unique(),
            'parent' => $this->integer(),
            'name' => $this->string(255)->notNull(),
            'shortdesc' => $this->string(255)->notNull(),
            'content' => $this->text()->notNull(),
            'media_id' => $this->integer(),
        ]);
        $this->createIndex(
            'idx-category-slug',
            'category',
            'slug'
        );
        $this->createIndex(
            'FK_category_category',
            'category',
            'parent'
        );

        $this->addForeignKey(
            'FK_category_category',
            'category',
            'parent',
            'category',
            'id',
            'SET NULL'
        );

        $this->createIndex(
            'FK_category_media',
            'category',
            'media_id'
        );

        $this->addForeignKey(
            'FK_category_media',
            'category',
            'media_id',
            'media',
            'id',
            'SET NULL'
        );

    }

    public function down()
    {
        $this->dropTable('category');

        return true;
    }

}
