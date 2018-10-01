<?php

use yii\db\Migration;

/**
 * Handles the creation of table `orders`.
 */
class m180914_143515_create_orders_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('orders', [
            'id' => $this->primaryKey(),
            'date' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'products_information' => $this->text(),
            'customer_information' => $this->text(),
        ], 'ENGINE InnoDB');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('orders');
    }
}
