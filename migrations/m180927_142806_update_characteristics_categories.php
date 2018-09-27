<?php

use yii\db\Migration;

/**
 * Class m180927_142806_update_characteristics_categories
 */
class m180927_142806_update_characteristics_categories extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

            for($j=1;$j<=5;$j++){
                $this->insert('category_characteristics', [
                    'category_id' => 1,
                    'characteristics_id' => $j,
                ]);
            }



    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->delete('category_characteristics', ['category_id' => '<=10']);

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180927_142806_update_characteristics_categories cannot be reverted.\n";

        return false;
    }
    */
}
