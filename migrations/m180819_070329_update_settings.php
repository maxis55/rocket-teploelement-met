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

        $this->insert('settings', [
            'key' => 'email',
            'value' => "zakaz@teploelement.ru",
        ]);

        $this->insert('settings', [
            'key' => 'phone1',
            'value' => "+7(351)223-93-92",
        ]);

        $this->insert('settings', [
            'key' => 'phone2',
            'value' => "+7(951)779-33-77",
        ]);

        $this->insert('settings', [
            'key' => 'news_per_page',
            'value' => 7,
        ]);

        $this->insert('settings', [
            'key' => 'header_text_1',
            'value' => 'Минимальные сроки',
        ]);

        $this->insert('settings', [
            'key' => 'header_text_2',
            'value' => 'Отличные цены',
        ]);

        $this->insert('settings', [
            'key' => 'header_text_3',
            'value' => 'КОМПЛЕКСНЫЕ ПОСТАВКИ',
        ]);

        $this->insert('settings', [
            'key' => 'header_text_4',
            'value' => 'МЕТАЛЛОПРОКАТА',
        ]);

        $this->insert('settings', [
            'key' => 'header_text_5',
            'value' => 'И ДЕТАЛЕЙ ТРУБОПРОВОДА',
        ]);

        $this->insert('settings', [
            'key' => 'copyright',
            'value' => 'Copyright 2018 Все права защищены',
        ]);

        $this->insert('settings', [
            'key' => 'catalog_bl_text_1',
            'value' => 'Мы предлагаем',
        ]);

        $this->insert('settings', [
            'key' => 'catalog_bl_text_2',
            'value' => 'ПОСТАВКИ МЕТАЛЛОПРОКАТА',
        ]);

        $this->insert('settings', [
            'key' => 'catalog_bl_text_3',
            'value' => 'ДЕТАЛИ ТРУБОПРОВОДА',
        ]);

        $this->insert('settings', [
            'key' => 'contacts_form_text_1',
            'value' => 'ОСТАВИТЬ ЗАЯВКУ',
        ]);

        $this->insert('settings', [
            'key' => 'contacts_form_text_2',
            'value' => 'Заполните заявку и в ближайшее время мы с вами свяжемся',
        ]);

        $this->insert('settings', [
            'key' => 'contacts_form_text_3',
            'value' => 'Полный прайс-лист на товары и услуги',
        ]);

        return true;
    }

    public function down()
    {

        $this->delete('settings');

        return true;
    }
}
