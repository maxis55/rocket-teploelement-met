<?php

use yii\db\Migration;

/**
 * Class m180914_143743_update_orders_table
 */
class m180914_143743_update_orders_table extends Migration
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
        echo "m180914_143743_update_orders_table cannot be reverted.\n";

        return false;
    }

    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        for ($i = 1; $i <= 20; $i++) {
            $this->insert('orders', [
                'products_information' => json_encode([
                    ['type'=>'SteelType1'.$i,'amount'=>1,'id'=>12+$i],
                    ['type'=>'SteelType2'.$i,'amount'=>2,'id'=>12+$i],
                    ['type'=>'SteelType3'.$i,'amount'=>3,'id'=>12+$i],
                ]),
            ]);
        }
        return true;
    }

    public function down()
    {
        $this->delete('orders', ['id' => '<=20']);

        return true;
    }
}
