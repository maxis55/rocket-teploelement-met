<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "characteristics".
 *
 * @property int $id
 * @property string $title
 *
 * @property CategoryCharacteristics[] $categoryCharacteristics
 * @property Category[] $categories
 * @property ProductCharacteristics[] $productCharacteristics
 * @property Products[] $products
 */
class Characteristics extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'characteristics';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoryCharacteristics()
    {
        return $this->hasMany(CategoryCharacteristics::className(), ['characteristics_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasMany(Category::className(), ['id' => 'category_id'])->viaTable('category_characteristics', ['characteristics_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductCharacteristics()
    {
        return $this->hasMany(ProductCharacteristics::className(), ['characteristics_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Products::className(), ['id' => 'product_id'])->viaTable('product_characteristics', ['characteristics_id' => 'id']);
    }
}
