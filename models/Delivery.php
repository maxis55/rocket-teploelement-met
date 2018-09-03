<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Delivery extends ActiveRecord{


    /**
     * All delivery messages for main page
     */
	public static function getAllDelivery()
	{

		return Delivery::find()->select(['city','text'])->asArray()->all();
	}


    /**
     * Update all delivery messages for main page
     */
	public static function updateAllDelivery($data)
	{

		// building data for insert
		$bulkInsertArray = [];
		foreach($data['city'] as $key => $value)
			if($value || $data['text'][$key])
				$bulkInsertArray[] = [ 'city'=>$value, 'text'=>$data['text'][$key] ];

		// cleaning table
		Delivery::deleteAll();

		return Yii::$app->db->createCommand()->batchInsert('delivery', ['city', 'text'], $bulkInsertArray)->execute();
	}


}
