<?php

namespace app\models;

use yii\db\ActiveRecord;

class Steel extends ActiveRecord{


    /**
     * Get product steel
     */
	public function getSteel($product){

		return Steel::find()->select(['name'])->where(['product' => $product])->asArray()->all();
	}


}
