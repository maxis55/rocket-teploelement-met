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
            'title' => "Email в шапке и футере",
        ]);

        $this->insert('settings', [
            'id' => ++$i,
            'key' => 'phone1',
            'value' => "+7(351)223-93-92",
            'type' => "input",
            'title' => "Телефон1 в шапке и футере",
        ]);

        $this->insert('settings', [
            'id' => ++$i,
            'key' => 'phone2',
            'value' => "+7(951)779-33-77",
            'type'=>'input',
            'title' => "Телефон2 в шапке и футере",
        ]);
        $this->insert('settings', [
            'id' => ++$i,
            'key' => 'copyright1',
            'value' => "Copyright 2018",
            'type'=>'input',
            'title' => "Копирайт в футере первая строка",
        ]);
        $this->insert('settings', [
            'id' => ++$i,
            'key' => 'copyright2',
            'value' => "Все права защищены",
            'type'=>'input',
            'title' => "Копирайт в футере вторая строка",
        ]);

        $this->insert('settings', [
            'id' => ++$i,
            'key' => 'header_text1',
            'value' => "Минимальные сроки",
            'type'=>'input',
            'title' => "Первый текст рядом с email",
        ]);

        $this->insert('settings', [
            'id' => ++$i,
            'key' => 'header_text2',
            'value' => "Отличные цены",
            'type'=>'input',
            'title' => "Второй текст рядом с email",
        ]);

        $this->insert('settings', [
            'id' => ++$i,
            'key' => 'header_title1',
            'value' => "КОМПЛЕКСНЫЕ ПОСТАВКИ",
            'type'=>'input',
            'title' => "Заголовок в шапке1",
        ]);
        $this->insert('settings', [
            'id' => ++$i,
            'key' => 'header_title2',
            'value' => "МЕТАЛЛОПРОКАТА",
            'type'=>'input',
            'title' => "Заголовок в шапке2",
        ]);
        $this->insert('settings', [
            'id' => ++$i,
            'key' => 'header_title3',
            'value' => "И ДЕТАЛЕЙ ТРУБОПРОВОДА",
            'type'=>'input',
            'title' => "Заголовок в шапке3",
        ]);
        $this->insert('settings', [
            'id' => ++$i,
            'key' => 'logo',
            'value' => "logo.svg",
            'type'=>'media',
            'title' => "Логотип в шапке",
        ]);
        $this->insert('settings', [
            'id' => ++$i,
            'key' => 'header_menu',
            'value' => json_encode([
                ['label' => 'Продукция', 'url' => ['index']],
                ['label' => 'Доставка', 'url' => ['delivery']],
                ['label' => 'Информация', 'url' => ['index']],
                ['label' => 'Контакты', 'url' => ['contact']],
            ]),
            'type'=>'menu',
            'title' => "Меню в Хедере",
        ]);
        $this->insert('settings', [
            'id' => ++$i,
            'key' => 'footer_menu',
            'value' => json_encode([
                ['label' => 'Продукция', 'url' => ['index']],
                ['label' => 'Доставка', 'url' => ['delivery']],
                ['label' => 'Информация', 'url' => ['index']],
                ['label' => 'Контакты', 'url' => ['contact']],
            ]),
            'type'=>'menu',
            'title' => "Меню в футере",
        ]);

        $this->insert('settings', [
            'id' => ++$i,
            'key' => 'price_list',
            'value' => 'price_list.txt',
            'type'=>'file',
            'title' => "Прайс лист рядом с заявкой",
        ]);

        $this->insert('settings', [
            'id' => ++$i,
            'key' => 'before_cats_title',
            'title' => 'Текст перед категориями',
            'value' => 'Мы предлагаем',
            'type' => 'input'
        ]);
        $this->insert('settings', [
            'id' => ++$i,
            'key' => 'before_cats_left_1',
            'title' => 'Текст перед левыми категориями черного цвета',
            'value' => 'Поставки',
            'type' => 'input'
        ]);
        $this->insert('settings', [
            'id' => ++$i,
            'key' => 'before_cats_left_2',
            'title' => 'Текст перед левыми категориями синего цвета',
            'value' => 'Металлопроката',
            'type' => 'input'
        ]);
        $this->insert('settings', [
            'id' => ++$i,
            'key' => 'before_cats_right_1',
            'title' => 'Текст перед правыми категориями черного цвета',
            'value' => 'Детали',
            'type' => 'input'
        ]);
        $this->insert('settings', [
            'id' => ++$i,
            'key' => 'before_cats_right_2',
            'title' => 'Текст перед правыми категориями синего цвета',
            'value' => 'Трубопровода',
            'type' => 'input'
        ]);

        return true;
    }

    public function down()
    {

        $this->delete('settings', ['id' => '<=15']);

        return true;
    }
}
