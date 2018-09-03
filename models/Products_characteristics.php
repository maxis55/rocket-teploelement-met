<?php

namespace app\models;

use yii\db\ActiveRecord;

class Products_characteristics extends ActiveRecord{


    /**
     * Content for single product
     */
	public static function getCharacteristics($product){

		return Products_characteristics::find()
			->select(['characteristics.name','products_characteristics.value'])
			->leftJoin('characteristics', 'products_characteristics.characteristic = characteristics.id')
			->where(['products_characteristics.product' => $product])
			->asArray()
			->all();
	}


}
