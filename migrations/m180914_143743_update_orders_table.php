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
                    ['steel_type'=>'SteelType1'.$i,'product_name'=>'Продукт'.$i,'amount'=>1,'product_id'=>12+$i],
                    ['steel_type'=>'SteelType2'.$i,'product_name'=>'Продукт'.$i,'amount'=>2,'product_id'=>12+$i],
                    ['steel_type'=>'SteelType3'.$i,'product_name'=>'Продукт'.$i,'amount'=>3,'product_id'=>12+$i],
                ]),
                'customer_information'=>json_encode(
                    [
                        'name'=>'ФИО'.$i,
                        'phone'=>'5345353',
                        'email'=>'example'.$i.'@gmail.com',
                        'message'=>'Информация от заказчика желающего купить продукт',

                    ]
                ),
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
