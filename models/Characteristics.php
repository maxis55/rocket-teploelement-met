<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Characteristics extends ActiveRecord{


    /**
     * All characteristics
     */
	public function getAllCharacteristics()
	{

		return Characteristics::find()->select(['id','name'])->asArray()->all();
	}


    /**
     * Update all characteristics names
     */
	public function updateAllCharacteristics($data)
	{
		// building data for insert
		$bulkInsertArray = [];
		foreach($data as $id => $val)
			if($val)
				$bulkInsertArray[] = [ 'id'=>$id, 'name'=>$val ];

		// cleaning table
		Characteristics::deleteAll();

		return Yii::$app->db->createCommand()->batchInsert('characteristics', ['id', 'name'], $bulkInsertArray)->execute();
	}


}
