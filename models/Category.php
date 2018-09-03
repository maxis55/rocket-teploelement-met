<?php

namespace app\models;

use yii\db\ActiveRecord;

class Category extends ActiveRecord{


    /**
     * Content for single category
     */
	public static function getCategory($slug){

		return Category::find()
			->select(['category.id','category.name','category.content','media.image'])
			->leftJoin('media', 'category.media = media.id')
			->where(['category.slug' => $slug])
			->asArray()
			->one();
	}


    /**
     * Content for subcategories
     */
	public static function getSubCategory($parent){

		return Category::find()
			->select(['category.slug','category.name','category.shortdesc','media.image'])
			->leftJoin('media', 'category.media = media.id')
			->where(['category.parent' => $parent])
			->asArray()
			->all();
	}


    /**
     * Get all subcategories
     */
	public static function getSubCategories(){

		return Category::find()->select(['id','parent','slug','name'])->orderBy(['parent' => SORT_ASC])->asArray()->all();
	}


}
