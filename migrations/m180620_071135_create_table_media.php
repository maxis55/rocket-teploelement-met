<?php

use yii\db\Migration;

/**
 * Class m180620_071135_create_table_media
 */
class m180620_071135_create_table_media extends Migration
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
        echo "m180620_071135_create_table_media cannot be reverted.\n";

        return false;
    }

    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('media', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->unique()->notNull(),
            'title' => $this->string(60),
            'alt' => $this->string(125),
        ]);

        echo "Table 'media' created\n";

        return true;
    }

    public function down()
    {
        $this->dropTable('media');

        echo "Table 'media' deleted\n";

        return true;
    }
}
