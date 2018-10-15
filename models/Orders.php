<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property int $id
 * @property string $date
 * @property string $products_information
 * @property string $customer_information
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date'], 'safe'],
            [['products_information', 'customer_information'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Дата',
            'products_information' => 'Информация о продуктах',
            'customer_information' => 'Информация от заказчика',

        ];
    }


    public function sendMail(){
    	$admin_email=Settings::findOne(['key'=>'admin_email']);
    	$customerInfo=json_decode($this->customer_information,true);
	    \Yii::$app->mailer->compose()
	                    ->setFrom([\Yii::$app->params['adminEmail'] => 'Teploelement'])
	                    ->setTo($admin_email->value )
		                ->setTextBody('Новый заказ от '.$customerInfo['name'].' '.$customerInfo['email'])
	                    ->setSubject('Новый заказ' )
	                    ->send();
    }
}
