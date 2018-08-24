<?php

use yii\db\Migration;

/**
 * Class m180824_171751_create_category
 */
class m180824_171751_create_category extends Migration
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
        echo "m180824_171751_create_category cannot be reverted.\n";

        return false;
    }

    public function up()
    {
        $this->createTable('category', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'slug' => $this->string(20)->notNull()->unique(),
            'content' => $this->text()->notNull(),
        ]);

        $this->createIndex(
            'idx-category-slug',
            'category',
            'slug'
        );

        return true;
    }

    public function down()
    {
        $this->dropTable('category');
        return true;
    }
}
