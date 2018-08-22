<?php

use yii\db\Migration;

/**
 * Class m180822_102724_update_delivery
 */
class m180822_102724_update_delivery extends Migration
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
        echo "m180822_102724_update_delivery cannot be reverted.\n";

        return false;
    }

    public function up()
    {
        $i=1;

        $this->insert('delivery', [
            'id' => $i++,
            'city' => 'Москва',
            'text' => "Доставка в ваш город осуществляется 3 рабочих дней.",
        ]);

        $this->insert('delivery', [
            'id' => $i++,
            'city' => 'Петербург',
            'text' => "Доставка в ваш город осуществляется 7 рабочих дней.",
        ]);

        $this->insert('delivery', [
            'id' => $i++,
            'city' => 'Тимбукту',
            'text' => "Доставка в ваш город осуществляется 666 рабочих дней.",
        ]);

        return true;
    }

    public function down()
    {
        $this->delete('delivery');

        return true;
    }
}
