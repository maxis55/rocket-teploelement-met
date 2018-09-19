<?php

use yii\db\Migration;

/**
 * Class m180919_082711_update_messages_table
 */
class m180919_082711_update_messages_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        for ($i = 1; $i <= 20; $i++) {
            $this->insert('messages', [
                'type' => 'phone_request',
                'name' => 'some random name'.$i,
                'phone'=>'43534534534',
                'content'=> null,
                'file'=>null,
            ]);
        }
        for ($i = 1; $i <= 20; $i++) {
            $this->insert('messages', [
                'type' => 'info_request',
                'name' => 'some random name'.$i,
                'phone'=>'43534534534',
                'content'=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis earum facere iste nostrum perspiciatis sed, voluptatem. Accusantium animi dolore dolorem doloremque earum eius excepturi fugit iste maxime placeat qui quis quod rem, sed sequi ut vel veritatis. Impedit, ipsa, laborum. Adipisci molestiae nemo quaerat. Aliquam animi excepturi itaque non quis. Ab accusantium aliquam autem consequuntur deserunt doloremque, modi nihil nobis nostrum praesentium quo quos recusandae tempora totam velit. Consequuntur facilis, nam quis repellat repellendus temporibus. Aperiam atque culpa cum dignissimos ducimus ea et eveniet inventore ipsum iure iusto laboriosam libero, maxime minus mollitia nam necessitatibus neque nostrum nulla quam quia quos rerum similique sint sunt temporibus ullam, ut velit voluptas voluptate. Aspernatur blanditiis earum laudantium maiores quae? Alias architecto asperiores beatae consequatur culpa, doloremque eligendi error ex exercitationem hic inventore laudantium minus neque officia quae quas ratione recusandae rem rerum sunt suscipit ut vitae. Dolorem, ratione vitae. Aliquam debitis eos illo illum maiores odit rem, rerum unde. Beatae commodi eius et excepturi hic laboriosam modi nemo nihil nulla odio quas quia quidem reiciendis, rem rerum saepe tempora! Adipisci amet asperiores, assumenda consectetur debitis delectus, et ex libero nihil nobis pariatur perferendis porro quasi quibusdam quod ratione rem sunt tempora veniam?',
                'file'=>null,
            ]);
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('messages', ['id' => '<=40']);
        echo "m180919_082711_update_messages_table cannot be reverted.\n";

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180919_082711_update_messages_table cannot be reverted.\n";

        return false;
    }
    */
}
