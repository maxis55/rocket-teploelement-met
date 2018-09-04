<?php

use yii\db\Migration;

/**
 * Class m180819_070329_update_settings
 */
class m180819_070329_update_settings extends Migration
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
        echo "m180819_070329_update_settings cannot be reverted.\n";

        return false;
    }

    
    public function up()
    {
        $i=0;

        $this->insert('settings', [
            'id' => ++$i,
            'key' => 'email',
            'value' => "zakaz@teploment.ru",
            'type' => "input_email",
        ]);

        $this->insert('settings', [
            'id' => ++$i,
            'key' => 'phone1',
            'value' => "+7(351)223-93-92",
            'type' => "input",
        ]);

        $this->insert('settings', [
            'id' => ++$i,
            'key' => 'phone2',
            'value' => "+7(951)779-33-77",
            'type'=>'input'
        ]);

        return true;
    }

    public function down()
    {

        $this->delete('settings', ['id' => '<=15']);

        return true;
    }
}
