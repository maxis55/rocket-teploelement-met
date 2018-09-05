<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property string $slug
 * @property int $parent
 * @property string $name
 * @property string $shortdesc
 * @property string $content
 * @property int $media
 *
 * @property Category $parent0
 * @property Category[] $categories
 */
class Category extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['slug', 'name', 'shortdesc', 'content'], 'required'],
            [['parent', 'media'], 'integer'],
            [['content'], 'string'],
            [['slug'], 'string', 'max' => 20],
            [['name', 'shortdesc'], 'string', 'max' => 255],
            [['slug'], 'unique'],
            [['parent'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['parent' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'slug' => 'Slug',
            'parent' => 'Родительская категория',
            'name' => 'Название категории',
            'shortdesc' => 'Краткое описание',
            'content' => 'Контент',
            'media' => 'Изображение',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent0()
    {
        return $this->hasOne(Category::className(), ['id' => 'parent']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasMany(Category::className(), ['parent' => 'id']);
    }
}
