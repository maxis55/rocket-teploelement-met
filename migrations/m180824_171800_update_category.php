<?php

use yii\db\Migration;

/**
 * Class m180824_171800_update_category
 */
class m180824_171800_update_category extends Migration
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
        echo "m180824_171800_update_category cannot be reverted.\n";

        return false;
    }

    public function up()
    {
        $content = ' В современном обществе принято сразу же после завершения строительства дома заниматься подключением трубопровода, канализации. Естественно, для этого требуется стальной отвод. Как же правильно подобрать этот элемент, чтобы он прослужил длительный срок службы?

Назначение отвода
Известно, что при монтаже трубопровода сталкиваешься с разветвлениями, изменением направления прокладки магистрали. А значит, в работе приходится использовать такие соединительные детали трубопровода, как отводы, переходы, тройники и прочие элементы . У каждой детали имеется свое назначение. Так, например, отводы стальные предназначены для тех случаев, когда требуется изменить направление магистрали.

Помимо этого данный вид деталей применяется и в качестве соединительного элемента 2-х участков трубопровода. Поэтому не удивительно, что отводы должны отвечать жестким требованиям. Четко прописанные параметры деталей трубопровода указываются в нормативно-технической документации.

Характеристики отводов
Соединительный элемент используется в сфере ЖКХ, нефте- и газопромышленности. Все требования к ним прописаны в НТД.

Например, отводы ГОСТ 17375-2001 допускается использовать как для прокладки магистрали в вертикальном, так и в горизонтальном направлении. Так же в документах указано, какими характеристиками обладают соединительные детали.';

        $i=1;

        $this->insert('category', [
            'id' => $i++,
            'name' => $i.' название категории',
            'slug' => 'truby',
            'content' => $i.$content,
        ]);

        $this->insert('category', [
            'id' => $i++,
            'name' => $i.' название категории',
            'slug' => 'listy',
            'content' => $i.$content,
        ]);

        $this->insert('category', [
            'id' => $i++,
            'name' => $i.' название категории',
            'slug' => 'shvellera',
            'content' => $i.$content,
        ]);

        $this->insert('category', [
            'id' => $i++,
            'name' => $i.' название категории',
            'slug' => 'ugolok',
            'content' => $i.$content,
        ]);

        $this->insert('category', [
            'id' => $i++,
            'name' => $i.' название категории',
            'slug' => 'balka',
            'content' => $i.$content,
        ]);

        $this->insert('category', [
            'id' => $i++,
            'name' => $i.' название категории',
            'slug' => 'armatura',
            'content' => $i.$content,
        ]);

        $this->insert('category', [
            'id' => $i++,
            'name' => $i.' название категории',
            'slug' => 'provoloka',
            'content' => $i.$content,
        ]);

        $this->insert('category', [
            'id' => $i++,
            'name' => $i.' название категории',
            'slug' => 'krug',
            'content' => $i.$content,
        ]);

        $this->insert('category', [
            'id' => $i++,
            'name' => $i.' название категории',
            'slug' => 'shestigrannik',
            'content' => $i.$content,
        ]);

        $this->insert('category', [
            'id' => $i++,
            'name' => $i.' название категории',
            'slug' => 'kvadrat',
            'content' => $i.$content,
        ]);

        $this->insert('category', [
            'id' => $i++,
            'name' => $i.' название категории',
            'slug' => 'polosa',
            'content' => $i.$content,
        ]);

        $this->insert('category', [
            'id' => $i++,
            'name' => $i.' название категории',
            'slug' => 'relsy',
            'content' => $i.$content,
        ]);

        $this->insert('category', [
            'id' => $i++,
            'name' => $i.' название категории',
            'slug' => 'pokovka',
            'content' => $i.$content,
        ]);

        $this->insert('category', [
            'id' => $i++,
            'name' => $i.' название категории',
            'slug' => 'setka',
            'content' => $i.$content,
        ]);

        $this->insert('category', [
            'id' => $i++,
            'name' => $i.' название категории',
            'slug' => 'otvody',
            'content' => $i.$content,
        ]);

        $this->insert('category', [
            'id' => $i++,
            'name' => $i.' название категории',
            'slug' => 'perexody',
            'content' => $i.$content,
        ]);

        $this->insert('category', [
            'id' => $i++,
            'name' => $i.' название категории',
            'slug' => 'trojniki',
            'content' => $i.$content,
        ]);

        $this->insert('category', [
            'id' => $i++,
            'name' => $i.' название категории',
            'slug' => 'zaglushki',
            'content' => $i.$content,
        ]);

        $this->insert('category', [
            'id' => $i++,
            'name' => $i.' название категории',
            'slug' => 'flancy',
            'content' => $i.$content,
        ]);

        $this->insert('category', [
            'id' => $i++,
            'name' => $i.' название категории',
            'slug' => 'opory',
            'content' => $i.$content,
        ]);

        $this->insert('category', [
            'id' => $i++,
            'name' => $i.' название категории',
            'slug' => 'sgony',
            'content' => $i.$content,
        ]);

        $this->insert('category', [
            'id' => $i++,
            'name' => $i.' название категории',
            'slug' => 'mufty',
            'content' => $i.$content,
        ]);

        return true;
    }

    public function down()
    {
        $this->delete('category');

        return true;
    }
}
