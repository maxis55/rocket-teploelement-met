<?php

use yii\db\Migration;

/**
 * Class m180904_110925_create_table_pages
 */
class m180904_110925_create_table_pages extends Migration
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
        echo "m180904_110925_create_table_pages cannot be reverted.\n";

        return false;
    }

    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

        $tableName = $this->db->tablePrefix . 'pages';
        if ($this->db->getTableSchema($tableName, true) === null) {
            $this->createTable('pages', [
                'id' => $this->primaryKey(),
                'title' => $this->string(50)->unique()->notNull(),
                'content' => $this->text(),
                'description' => $this->string(100),
                'keywords' => $this->string(50),
                'slug' => $this->string(50)->unique()->notNull()
            ]);
        }
        return true;

    }

    public function down()
    {
        $this->dropTable('pages');
        return true;
    }
}
