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

    public $content_arr1;
    public $content_arr2;
    public $content_arr3;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['slug', 'name', 'shortdesc'], 'required'],
            ['content', 'customValidator', 'params' => ['extraFields' => ['content_arr1','content_arr2','content_arr3','content_arr4']]],
            [['parent', 'media_id'], 'integer'],
            [['content','content_arr1','content_arr2','content_arr3','content_arr4'], 'string'],
            [['slug'], 'string', 'max' => 20],
            [['name', 'shortdesc'], 'string', 'max' => 255],
            [['slug'], 'unique'],
            [['parent'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['parent' => 'id']],
            [['media_id'], 'exist', 'skipOnError' => true, 'targetClass' => Media::className(), 'targetAttribute' => ['media_id' => 'id']],
        ];
    }

    public function customValidator(){
        if (empty($this->content_arr1) && empty($this->content) ) {

            $this->addError('content', Yii::t('user', 'At least 1 of the field must be filled up properly'));
            $this->addError('content_arr1', Yii::t('user', 'At least 1 of the field must be filled up properly'));
            $this->addError('content_arr2', Yii::t('user', 'At least 1 of the field must be filled up properly'));
            $this->addError('content_arr3', Yii::t('user', 'At least 1 of the field must be filled up properly'));

            return false;
        }

        return true;
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
            'content_arr1'=>'Составной контент',
            'content_arr2'=>'Составной контент2',
            'content_arr3'=>'Составной контент3',
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

    public static function getAllCategoriesIndexedByParent(){
        $all_categories=Category::find()->select(['slug','name','parent','id'])->asArray()->all();
        $grouped_categories=array();

        foreach($all_categories as $key => $item)
        {
            if($item['parent']=='')
                $item['parent']='none';
            $grouped_categories[$item['parent']][] = $item;
        }

        ksort($grouped_categories, SORT_NUMERIC);
        return $grouped_categories;
    }


    public static function findAllSubcategoryIds($parent_id)
    {

        return Category::find()->select('id')->where(['parent'=>$parent_id])->asArray()->all();
    }

    public function beforeSave($insert)
    {

        if(!empty($this->content_arr1)&&!empty($this->content_arr2)&&!empty($this->content_arr3)){

            $this->content=json_encode([$this->content_arr1,$this->content_arr2,$this->content_arr3]);
        }

        return parent::beforeSave($insert);
    }



}
