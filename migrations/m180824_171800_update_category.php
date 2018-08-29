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

        $shortdesc = 'Это пример текста новости, сделан для того, чтобы было понятно, где будет текст. Это пример текста новости, сделан для того, чтобы было понятно, где будет текст';

        $slugs =['','truby','listy','shvellera','ugolok','balka','armatura','provoloka','krug','shestigrannik','kvadrat','polosa','relsy','pokovka','setka','otvody','perexody','trojniki','zaglushki','flancy','opory','sgony','mufty'];

        for ($i = 1; $i <count($slugs); $i++) {
            $this->insert('category', [
                'name' => $i.' название категории',
                'slug' => $slugs[$i],
                'content' => $i.$content,
                'media' => rand(1, 10),
            ]);
            $c1 = Yii::$app->db->getLastInsertID();

            for ($z = 1; $z <=rand(1, 10); $z++) {
                $this->insert('category', [
                    'name' => $i.$z.' подкатегория',
                    'parent' => $c1,
                    'slug' => 'pcat'.$i.$z,
                    'shortdesc' => $shortdesc,
                    'content' => $i.$z.$content,
                    'media' => rand(1, 10),
                ]);

                $c2 = Yii::$app->db->getLastInsertID();

                for ($t = 1; $t <=rand(1, 5); $t++) {
                    $this->insert('category', [
                        'name' => $i.$z.$t.' подподкатегория',
                        'parent' => $c2,
                        'slug' => 'ppcat'.$i.$z.$t,
                        'shortdesc' => $shortdesc,
                        'content' => $i.$z.$t.$content,
                        'media' => rand(1, 10),
                    ]);
                }
            }
        }


        return true;
    }

    public function down()
    {
        $this->delete('category');

        return true;
    }
}