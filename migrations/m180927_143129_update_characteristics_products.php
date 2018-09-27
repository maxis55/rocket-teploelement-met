<?php

use yii\db\Migration;

/**
 * Class m180927_143129_update_characteristics_products
 */
class m180927_143129_update_characteristics_products extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        for ($i = 1; $i <= 40; $i++) {
            for ($j = 1; $j <= 5; $j++) {
                $this->insert('product_characteristics', [
                    'product_id' => $i,
                    'characteristics_id' => $j,
                    'value'=>'somevalue'.$i.' '.$j
                ]);
            }
        }

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('product_characteristics', ['product_id' => '<=10']);

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180927_143129_update_characteristics_products cannot be reverted.\n";

        return false;
    }
    */
}
