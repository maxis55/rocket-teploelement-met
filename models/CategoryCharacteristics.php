<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "category_characteristics".
 *
 * @property int $category_id
 * @property int $characteristics_id
 *
 * @property Category $category
 * @property Characteristics $characteristics
 */
class CategoryCharacteristics extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category_characteristics';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'characteristics_id'], 'required'],
            [['category_id', 'characteristics_id'], 'integer'],
            [['category_id', 'characteristics_id'], 'unique', 'targetAttribute' => ['category_id', 'characteristics_id']],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['characteristics_id'], 'exist', 'skipOnError' => true, 'targetClass' => Characteristics::className(), 'targetAttribute' => ['characteristics_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'category_id' => 'Category ID',
            'characteristics_id' => 'Characteristics ID',
        ];
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
    public function getCharacteristics()
    {
        return $this->hasOne(Characteristics::className(), ['id' => 'characteristics_id']);
    }
}
