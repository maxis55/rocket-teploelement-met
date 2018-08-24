<?php

namespace app\models;

use yii\db\ActiveRecord;

class Products extends ActiveRecord{


    /**
     * Content for single product
     */
	public function getProduct($slug){

		return Products::find()->select(['id','name','text'])->where(['slug' => $slug])->asArray()->one();
	}


}
