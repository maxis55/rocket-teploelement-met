<?php

use yii\db\Migration;

/**
 * Handles the creation of table `messages`.
 */
class m180919_082544_create_messages_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('messages', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255),
            'date' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'phone' => $this->string(20),
            'type' => $this->string(20),
            'content' => $this->text()->defaultValue(null),
            'file'=>$this->string(255)->defaultValue(null)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('messages');
    }
}
