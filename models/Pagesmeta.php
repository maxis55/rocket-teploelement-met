<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "pagesmeta".
 *
 * @property int $id
 * @property int $page_id
 * @property string $key
 * @property string $title
 * @property string $value
 */
class Pagesmeta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pagesmeta';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['page_id'], 'integer'],
            [['value'], 'string'],
            [['key'], 'string', 'max' => 50],
            [['title'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'page_id' => 'Page ID',
            'key' => 'Key',
            'title' => 'Title',
            'value' => 'Value',
        ];
    }

    static function getFrontPageMeta($slug, $admin = false)
    {
        $page = Pages::find()->where(['slug' => $slug])->one();


        $json_settings=array('json');
        $global_settings=self::find()->select(['key', 'value', 'title', 'type'])->where(['=', 'page_id', $page->id])->asArray()->all();

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
