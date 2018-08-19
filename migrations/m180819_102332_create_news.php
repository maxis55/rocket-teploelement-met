<?php

use yii\db\Migration;

/**
 * Class m180819_102332_create_news
 */
class m180819_102332_create_news extends Migration
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
        echo "m180819_102332_create_news cannot be reverted.\n";

        return false;
    }


    public function up()
    {
        $this->createTable('news', [
            'id' => $this->primaryKey(),
            'title' => $this->string(70),
            'keywords' => $this->string(200),
            'description' => $this->string(255),
            'name' => $this->string(255)->notNull(),
            'content' => $this->text()->notNull(),
            'date' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
            'shortdesc' => $this->string(255)->notNull(),
            'slug' => $this->string(20)->notNull()->unique(),
            'media_id' => $this->integer(),
        ]);

        $this->createIndex(
            'idx-news-slug',
            'news',
            'slug'
        );

    }

    public function down()
    {

        $this->dropTable('news');

        return true;
    }
}
