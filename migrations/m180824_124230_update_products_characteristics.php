<?php

use yii\db\Migration;

/**
 * Class m180824_124230_update_products_characteristics
 */
class m180824_124230_update_products_characteristics extends Migration
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
        echo "m180824_124230_update_products_characteristics cannot be reverted.\n";

        return false;
    }

    public function up()
    {
        for ($i = 1; $i <= 10; $i++) {
            $this->insert('products_characteristics', [
                'product' => $i,
                'characteristic' => $i,
                'value' => $i.' мм.'
            ]);
            $this->insert('products_characteristics', [
                'product' => $i,
                'characteristic' => $i,
                'value' => $i.' cм.'
            ]);
        }

        return true;
    }

    public function down()
    {
        $this->delete('products_characteristics');

        return true;
    }
}
