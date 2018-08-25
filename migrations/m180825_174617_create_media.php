<?php

use yii\db\Migration;

/**
 * Class m180825_174617_create_media
 */
class m180825_174617_create_media extends Migration
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
        echo "m180825_174617_create_media cannot be reverted.\n";

        return false;
    }

    public function up()
    {
        $this->createTable('media', [
            'id' => $this->primaryKey(),
            'image' => $this->string()->unique()->notNull(),
        ]);

        return true;
    }

    public function down()
    {
        $this->dropTable('media');

        return true;
    }
}
