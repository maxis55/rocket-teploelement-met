<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pages".
 *
 * @property int $id
 * @property string $title
 * @property string $content
 * @property string $description
 * @property string $keywords
 * @property string $slug
 */
class Pages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'slug'], 'required'],
            [['content'], 'string'],
            [['title', 'keywords', 'slug'], 'string', 'max' => 50],
            [['description'], 'string', 'max' => 100],
            [['title'], 'unique'],
            [['slug'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название',
            'content' => 'Контент',
            'description' => 'Описание',
            'keywords' => 'Ключевые слова',
            'slug' => 'Слаг',
        ];
    }


    public static function getPages($params=['slug']){
        return Pages::find()->select($params)->asArray()->all();
    }

}
