<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

class Settings extends ActiveRecord{


    /**
     * Cross pages data, header footer and others
     */
	public static function getCrossPagesData(){

		$crossPagesDataList = ['email','phone1','phone2','header_text_1','header_text_2','header_text_3','header_text_4','header_text_5','copyright','catalog_bl_text_1','catalog_bl_text_2','contacts_form_text_1','contacts_form_text_2','contacts_form_text_3']; // list of data keys

		return ArrayHelper::map( Settings::find()->select(['key', 'value'])->where(['key' => $crossPagesDataList])->asArray()->all() , 'key', 'value');
	}


}
