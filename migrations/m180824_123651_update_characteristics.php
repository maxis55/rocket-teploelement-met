<?php

use yii\db\Migration;

/**
 * Class m180824_123651_update_characteristics
 */
class m180824_123651_update_characteristics extends Migration
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
        echo "m180824_123651_update_characteristics cannot be reverted.\n";

        return false;
    }

    public function up()
    {
        $i=1;

        $this->insert('characteristics', [
            'id' => $i++,
            'name' => 'Вес погонного метра',
        ]);

        $this->insert('characteristics', [
            'id' => $i++,
            'name' => 'Материал',
        ]);

        $this->insert('characteristics', [
            'id' => $i++,
            'name' => 'Марка стали или сплава',
        ]);

        $this->insert('characteristics', [
            'id' => $i++,
            'name' => 'Способ производства',
        ]);

        $this->insert('characteristics', [
            'id' => $i++,
            'name' => 'Тип производства',
        ]);

        $this->insert('characteristics', [
            'id' => $i++,
            'name' => 'Вес погонного метра',
        ]);

        $this->insert('characteristics', [
            'id' => $i++,
            'name' => 'Материал',
        ]);

        $this->insert('characteristics', [
            'id' => $i++,
            'name' => 'Марка стали или сплава',
        ]);

        $this->insert('characteristics', [
            'id' => $i++,
            'name' => 'Способ производства',
        ]);

        $this->insert('characteristics', [
            'id' => $i++,
            'name' => 'Тип производства',
        ]);

        return true;
    }

    public function down()
    {

        $this->delete('characteristics');

        return true;
    }
}
