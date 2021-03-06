<?php

use yii\db\Migration;

/**
 * Class m180904_111521_update_table_pages
 */
class m180904_111521_update_table_pages extends Migration
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
        echo "m180904_111521_update_table_pages cannot be reverted.\n";

        return false;
    }

    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $i=1;

        $this->insert('pages', [
            'id' => $i,
            'title' => 'Главная страница',
            'description' => "описание главной страницы",
            'slug' => 'index'
        ]);

        $this->insert('pages', [
            'id' => ++$i,
            'title' => 'Контакты',
            'description' => "описание страницы контактов",
            'slug' => 'contact'
        ]);

        $this->insert('pages', [
            'id' => ++$i,
            'title' => 'Доставка',
            'description' => "описание страницы доставки",
            'slug' => 'delivery'
        ]);

        $this->insert('pages', [
            'id' => ++$i,
            'title' => 'Новости',
            'description' => "новостная страница",
            'slug' => 'news'
        ]);
        $this->insert('pages', [
            'id' => ++$i,
            'title' => 'Страница 404',
            'description' => "страница 404",
            'slug' => '404'
        ]);
    }

    public function down()
    {
        $this->delete('pages', ['id' => '<=6']);

        return true;
    }
}
