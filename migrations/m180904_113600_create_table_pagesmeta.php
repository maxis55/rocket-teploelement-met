<?php

use yii\db\Migration;

/**
 * Class m180904_113600_create_table_pagesmeta
 */
class m180904_113600_create_table_pagesmeta extends Migration
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
        echo "m180904_113600_create_table_pagesmeta cannot be reverted.\n";

        return false;
    }

    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

        $tableName = $this->db->tablePrefix . 'pagesmeta';
        if ($this->db->getTableSchema($tableName, true) === null) {
            $this->createTable('pagesmeta', [
                'id' => $this->primaryKey(),
                'page_id' => $this->integer(),
                'key' => $this->string(50),
                'title' => $this->string(80),
                'type' => $this->string(20),
                'value' => $this->text(),
            ]);
        }
        return true;

    }

    public function down()
    {
        $this->dropTable('pagesmeta');
        return true;
    }
}
