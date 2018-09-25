<?php

use yii\db\Migration;

/**
 * Class m180924_134632_update_table_users
 */
class m180924_134632_update_table_users extends Migration
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
        echo "m180924_134632_update_table_users cannot be reverted.\n";

        return false;
    }


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        try {
            $this->insert('{{%user}}', [
                'username' => 'tadmin',
                'auth_key' => 'Ff3XaaxXfGREUh3T_Fum1YPnFQreOVkc',
                'password_hash' => Yii::$app->security->generatePasswordHash('admin123'),
                'email' => 'rocketnottester@gmail.com',
                'status' => 10,
            ]);
        } catch (\yii\base\Exception $e) {

        }

    }

    public function down()
    {
        $this->delete('{{%user}}', ['id' => '<=5']);
        //echo "m180924_134632_update_table_users cannot be reverted.\n";

        return true;
    }

}
