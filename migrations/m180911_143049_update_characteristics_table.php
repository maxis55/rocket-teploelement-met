<?php

use yii\db\Migration;

/**
 * Class m180911_143049_update_characteristics_table
 */
class m180911_143049_update_characteristics_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        for ($i = 1; $i <= 10; ++$i) {
            $this->insert('characteristics', [
                'id' => $i,
                'title' => "Характеристика" . $i,
            ]);
        }

        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('characteristics', ['id' => '<=10']);

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180911_143049_update_characteristics_table cannot be reverted.\n";

        return false;
    }
    */
}
