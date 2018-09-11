<?php

use yii\db\Migration;

/**
 * Handles the creation of table `characteristics`.
 */
class m180911_095548_create_characteristics_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('characteristics', [
            'id' => $this->primaryKey(),
            'title' => $this->string(50),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('characteristics');
    }
}
