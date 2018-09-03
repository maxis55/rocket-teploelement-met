<?php

namespace app\models;

use yii\db\ActiveRecord;

class Products extends ActiveRecord{


    /**
     * Content for single product
     */
	public static function getProduct($slug){

		return Products::find()
			->select(['products.id','products.name','products.text','media.image'])
			->leftJoin('media', 'products.media = media.id')
			->where(['products.slug' => $slug])
			->asArray()
			->one();
	}


}
