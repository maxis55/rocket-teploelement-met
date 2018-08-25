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
        $i=1;

        $this->insert('settings', [
            'id' => $i++,
            'key' => 'email',
            'value' => "zakaz@teploelement.ru",
        ]);

        $this->insert('settings', [
            'id' => $i++,
            'key' => 'phone1',
            'value' => "+7(351)223-93-92",
        ]);

        $this->insert('settings', [
            'id' => $i++,
            'key' => 'phone2',
            'value' => "+7(951)779-33-77",
        ]);

        $this->insert('settings', [
            'id' => $i++,
            'key' => 'news_per_page',
            'value' => 7,
        ]);

        return true;
    }

    public function down()
    {

        $this->delete('settings');

        return true;
    }
}
