<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

class Settings extends ActiveRecord{


    /**
     * Cross pages data, header footer and others
     */
	public function getCrossPagesData(){

		$crossPagesDataList = ['email','phone1','phone2']; // list of data keys

		return ArrayHelper::map( Settings::find()->select(['key', 'value'])->where(['key' => $crossPagesDataList])->asArray()->all() , 'key', 'value');
	}


}
