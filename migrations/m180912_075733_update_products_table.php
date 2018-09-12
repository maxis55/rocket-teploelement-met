<?php

use yii\db\Migration;

/**
 * Class m180912_075733_update_products_table
 */
class m180912_075733_update_products_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        for($i=1;$i<280;$i++){
            for ($j = 1; $j <= 10; ++$j) {
                $this->insert('products', [
//                    'id' => $i.$j,
                    'title' => "Товар" .$i. $j,
                    'slug' => "product" .$i. $j,
                    'content'=>'Контент'.$i. $j.'конец контента',
                    'steel_type'=>json_encode(array('Марка1', 'Марка2','Марка3')),
                    'category_id'=>$i,
                    'media_id'=>32
                ]);
            }
        }


        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('products', ['id' => '<=1000']);

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180912_075733_update_products_table cannot be reverted.\n";

        return false;
    }
    */
}
