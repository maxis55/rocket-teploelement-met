<?php

namespace app\models;

use yii\db\ActiveRecord;

class Delivery extends ActiveRecord{


    /**
     * All delivery messages for main page
     */
	public function getAllDelivery(){

		return Delivery::find()->select(['city','text'])->asArray()->all();
	}


}
