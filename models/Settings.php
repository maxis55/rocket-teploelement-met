<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

class Settings extends ActiveRecord{


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'settings';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['key', 'value', 'type', 'title'], 'required'],
            [['value'], 'string'],
            [['key'], 'string', 'max' => 50],
            [['type'], 'string', 'max' => 20],
            [['title'], 'string', 'max' => 255],
            [['key'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'key' => 'Key',
            'value' => 'Value',
            'type' => 'Type',
            'title' => 'Title',
        ];
    }

    /**
	 * Cross pages data, header footer and others
	 *
	 * @param array $fields
	 * @param bool $admin
	 *
	 * @return array|ActiveRecord[]
	 */
	public static function getCrossPagesData($fields=['key', 'value','type'],$admin=false){

        $json_settings=array('menu');

        $global_settings=self::find()->select($fields)->asArray()->all();

        foreach ($global_settings as $key=>$global_setting){
            if(in_array($global_settings[$key]['type'],$json_settings)){
                $global_settings[$key]['value']=json_decode($global_settings[$key]['value'],true);
            }
        }

		if($admin)
		{
			return $global_settings;
		}

		return  ArrayHelper::map($global_settings, 'key', 'value');
	}


}
