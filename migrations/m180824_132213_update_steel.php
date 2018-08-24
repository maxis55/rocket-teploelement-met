<?php

use yii\db\Migration;

/**
 * Class m180824_132213_update_steel
 */
class m180824_132213_update_steel extends Migration
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
        echo "m180824_132213_update_steel cannot be reverted.\n";

        return false;
    }

    public function up()
    {
        for ($i = 1; $i <= 10; $i++) {
            $this->insert('steel', [
                'product' => $i,
                'name' => 'Марка №'.$i
            ]);
            $this->insert('steel', [
                'product' => $i,
                'name' => 'Марка №2'
            ]);
        }

        return true;
    }

    public function down()
    {
        $this->delete('steel');

        return true;
    }
}
