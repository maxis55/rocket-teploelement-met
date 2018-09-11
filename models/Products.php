<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property string $slug
 * @property string $title
 * @property string $content
 * @property string $steel_type
 * @property int $category_id
 * @property int $media_id
 *
 * @property ProductCharacteristics[] $productCharacteristics
 * @property Characteristics[] $characteristics
 * @property Category $category
 * @property Media $media
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['slug', 'title', 'content', 'steel_type'], 'required'],
            [['content', 'steel_type'], 'string'],
            [['category_id', 'media_id'], 'integer'],
            [['slug'], 'string', 'max' => 50],
            [['title'], 'string', 'max' => 255],
            [['slug'], 'unique'],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['media_id'], 'exist', 'skipOnError' => true, 'targetClass' => Media::className(), 'targetAttribute' => ['media_id' => 'id']],
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
            'title' => 'Заголовок',
            'content' => 'Контент',
            'steel_type' => 'Тип стали',
            'category_id' => 'Category ID',
            'media_id' => 'Media ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductCharacteristics()
    {
        return $this->hasMany(ProductCharacteristics::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCharacteristics()
    {
        return $this->hasMany(Characteristics::className(), ['id' => 'characteristics_id'])->viaTable('product_characteristics', ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMedia()
    {
        return $this->hasOne(Media::className(), ['id' => 'media_id']);
    }
}
