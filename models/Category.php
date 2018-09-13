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
 * @property int $media_id
 *
 * @property Category $parent0
 * @property Category[] $categories
 * @property Media $media
 * @property CategoryCharacteristics[] $categoryCharacteristics
 * @property Characteristics[] $characteristics
 * @property Products[] $products
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
            [['parent', 'media_id'], 'integer'],
            [['content'], 'string'],
            [['slug'], 'string', 'max' => 20],
            [['name', 'shortdesc'], 'string', 'max' => 255],
            [['slug'], 'unique'],
            [['parent'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['parent' => 'id']],
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
            'parent' => 'Родительская категория',
            'name' => 'Название категории',
            'shortdesc' => 'Краткое описание',
            'content' => 'Контент',
            'media_id' => 'Изображение',
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMedia()
    {
        return $this->hasOne(Media::className(), ['id' => 'media_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoryCharacteristics()
    {
        return $this->hasMany(CategoryCharacteristics::className(), ['category_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCharacteristics()
    {
        return $this->hasMany(Characteristics::className(), ['id' => 'characteristics_id'])->viaTable('category_characteristics', ['category_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Products::className(), ['category_id' => 'id']);
    }

    /**
     * Content for single category
     * @param $slug
     * @param array $params
     * @return array|null|ActiveRecord
     */
    public static function getCategory($slug, $params = ['category.id', 'category.name', 'category.content', 'category.slug'])
    {

        return Category::find()
            ->select($params)
            ->where(['category.slug' => $slug])
            ->one();
    }


    /**
     * Content for subcategories
     * @param $parent
     * @param array $params
     * @return array|ActiveRecord[]
     */
    public static function getSubCategory($parent, $params = ['category.slug', 'category.name', 'category.shortdesc'])
    {

        return Category::find()
            ->select($params)
            ->where(['category.parent' => $parent])
            ->all();
    }

    public static function getCategoryByParent($parent = null, $params = ['name', 'slug', 'id'])
    {
        return Category::find()
            ->select($params)
            ->where(['parent' => $parent])
            ->indexBy('id')
            ->all();
    }


    public static function findAllProductsSubCategory($subcategory_slug)
    {

        $currCategory=Category::findOne(['slug'=>$subcategory_slug]);
        $products=$currCategory;
        foreach ($currCategory->categories as $subsubcategory){

        }
    }



}
