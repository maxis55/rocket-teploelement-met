<?php

namespace app\models;

use yii\db\ActiveRecord;

class Category extends ActiveRecord{


    /**
     * Content for single category
     */
	public function getCategory($slug){

		return Category::find()->select(['id','name','content'])->where(['slug' => $slug])->asArray()->one();
	}


    /**
     * Content for subcategories
     */
	public function getSubCategory($parent){

		return Category::find()->select(['slug','name','shortdesc'])->where(['parent' => $parent])->asArray()->all();
	}


    /**
     * Get all subcategories
     */
	public function getSubCategories(){

		return Category::find()->select(['id','parent','slug','name'])->orderBy(['parent' => SORT_ASC])->asArray()->all();
	}


}
