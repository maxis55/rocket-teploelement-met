<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_characteristics".
 *
 * @property int $product_id
 * @property int $characteristics_id
 * @property string $value
 *
 * @property Characteristics $characteristics
 * @property Products $product
 */
class ProductCharacteristics extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_characteristics';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'characteristics_id', 'value'], 'required'],
            [['product_id', 'characteristics_id'], 'integer'],
            [['value'], 'string', 'max' => 60],
            [['product_id', 'characteristics_id'], 'unique', 'targetAttribute' => ['product_id', 'characteristics_id']],
            [['characteristics_id'], 'exist', 'skipOnError' => true, 'targetClass' => Characteristics::className(), 'targetAttribute' => ['characteristics_id' => 'id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Products::className(), 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'product_id' => 'Product ID',
            'characteristics_id' => 'Characteristics ID',
            'value' => 'Value',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCharacteristics()
    {
        return $this->hasOne(Characteristics::className(), ['id' => 'characteristics_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Products::className(), ['id' => 'product_id']);
    }
}
