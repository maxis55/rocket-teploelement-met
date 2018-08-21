<?php

use yii\db\Migration;

/**
 * Class m180821_170442_create_messages
 */
class m180821_170442_create_messages extends Migration
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
        echo "m180821_170442_create_messages cannot be reverted.\n";

        return false;
    }


    public function up()
    {
        $this->createTable('messages', [
            'id' => $this->primaryKey(),
            'form' => $this->integer(),
            'name' => $this->string(255),
            'phone' => $this->string(255),
            'file' => $this->boolean()->notNull(),
            'message' => $this->text()->notNull(),
            'date' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
        ]);

        $this->createIndex(
            'idx-messages-form',
            'messages',
            'form'
        );

    }

    public function down()
    {

        $this->dropTable('messages');

        return true;
    }
}
