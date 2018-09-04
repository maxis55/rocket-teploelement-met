<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

class Settings extends ActiveRecord{


    /**
     * Cross pages data, header footer and others
     */
	public static function getCrossPagesData(){

        $json_settings=array('menu');
        $global_settings=Settings::find()->select(['key', 'value','type'])->asArray()->all();

        foreach ($global_settings as $key=>$global_setting){
            if(in_array($global_settings[$key]['type'],$json_settings)){
                $global_settings[$key]['value']=json_decode($global_settings[$key]['value'],true);
            }
        }

		return  ArrayHelper::map($global_settings, 'key', 'value');
	}


}
