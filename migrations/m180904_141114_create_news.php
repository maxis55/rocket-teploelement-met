<?php

use yii\db\Migration;

/**
 * Class m180904_141114_create_news
 */
class m180904_141114_create_news extends Migration
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
        echo "m180904_141114_create_news cannot be reverted.\n";

        return false;
    }


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

        $this->createTable('news', [
            'id' => $this->primaryKey(),
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

        //uncomment when media table is created
//        $this->createIndex(
//            'FK_news_media',
//            'news',
//            'media_id'
//        );
//
//        $this->addForeignKey(
//            'FK_news_media',
//            'news',
//            'media_id',
//            'media',
//            'id',
//            'SET NULL'
//        );

        return true;

    }

    public function down()
    {
        $this->dropTable('news');

        return true;
    }

}
