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


}
