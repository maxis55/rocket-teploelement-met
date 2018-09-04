<?php

use yii\db\Migration;

/**
 * Class m180904_141128_update_news
 */
class m180904_141128_update_news extends Migration
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
        echo "m180904_141128_update_news cannot be reverted.\n";

        return false;
    }


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        for ($i = 1; $i <= 66; $i++) {
            $this->insert('news', [
                'id' => $i,
                'name' => $i.' Заголовок текстовой новости может быть длинным или в две три строки, например, это пример заголовка',
                'shortdesc' => $i.' Это пример текста новости, сделан для того, чтобы было понятно, где будет текст. Это пример текста новости, сделан для того, чтобы было понятно, где будет текст',
                'content' => $i.' На всем пространственно-временном континууме квазитерритории дислоцирован ряд рефлексирующих субъектов, которые обладают фундаментальным набором миссий. В их компетенции возможность передачи права собственности на предметы материально-виртуального мира и использование информационного поля субъективной вселенной.
                    Необходимо, манипулируя полученными предметами материального мира и фрагментами информационного поля, эмпирическим путем достигнуть логического завершения конкурса.
                    Первая цель конкурса — обнаружение предметов материального мира, обладающих колоссальной ценностью, принадлежащих живому биологическому организму, в дальнейшем именуемым драконом, и их экспроприация.
                    Вторая цель — освобождение наследницы правителя феодального домена.
                    Третья цель — остановка всех биологических функций живого организма, именуемого драконом.
                    Когда субъект деятельности по участию в конкурсе осуществляет выполнение поставленной задачи, возникает острая необходимость передать информацию об этом факте обыденной реальности главному субординатору, находящемуся на вершине иерархической лестницы конкурса и продемонстрировать ему предмет материального мира, обретенный в результате выполнения одной из поставленных задач. При определенном искривлении временного континуума или объективном достижении троекратного завершения промежуточных задач, субъективная вселенная перестает существовать и выходит за рамки сознания индивидуума.
                    Каждый рефлексирующий субъект обладает набором знаний и имеет позитивные возможности оказания влияния на информационное поле для взаимодействия с субъектами виртуального мира, но в то же время наделен плюралистическим мировоззрением, позволяющим ему при необходимости достижения или сохранения собственных материальных благ пренебрегать законами логики и здравого смысла. Каждый из рефлексирующих субъектов виртуального мира может находиться в двух основных состояниях: стационарном и мобильном, при котором они или сводят передвижение в трехмерном Евклидовом пространстве с декартовой системой координат к абстрактному минимуму, или ограничиваются формальными перемещениями массы в некоторой части пространственного континуума.
                    При истечении возможности понимания вышеизложенной информации вы имеете объективную возможность подать официальный запрос главному субординатору локальной виртуальной вселенной.
                ',
                'slug' => 'test-news-'.$i,
                'media_id' => rand(1, 10),
            ]);
        }
        return true;
    }

    public function down()
    {
        $this->delete('settings', ['id' => '<=66']);

        return true;
    }

}
