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
            'media' => $this->integer(),
        ]);
        $this->createIndex(
            'idx-category-slug',
            'category',
            'slug'
        );

    }

    public function down()
    {
        $this->dropTable('category');

        return true;
    }

}
