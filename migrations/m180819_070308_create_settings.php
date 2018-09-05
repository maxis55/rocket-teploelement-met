<?php

use yii\db\Migration;

/**
 * Class m180819_070308_create_settings
 */
class m180819_070308_create_settings extends Migration
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
        echo "m180819_070308_create_settings cannot be reverted.\n";

        return false;
    }


    public function up()
    {
        $tableName = $this->db->tablePrefix . 'settings';

        if ($this->db->getTableSchema($tableName, true) === null) {
            $this->createTable('settings', [
                'id' => $this->primaryKey(),
                'key' => $this->string(50)->unique()->notNull(),
                'value' => $this->text()->notNull(),
                'type'=>$this->string(20)->notNull(),
                'title'=>$this->string(255)->notNull(),
            ]);
        }

        return true;
    }

    public function down()
    {
        $this->dropTable('settings');
        return true;
    }
}
