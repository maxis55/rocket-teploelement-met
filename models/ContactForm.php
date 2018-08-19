<?php

namespace app\models;

use Yii;
use yii\base\Model;


/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends Model
{

    public $name;
    public $phone;
    public $message;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['name', 'phone', 'message'], 'required', 'message' => 'Поле должно быть заполнено'],
            ['phone', 'match', 'pattern' => '/(\(?\d{3}\)?[\- ]?)?[\d\- ]{4,10}$/', 'message' => 'Неверный формат телефона'],
        ];
    }


    /**
     * Sends an email to the admin email address
     */
    public function contact()
    {
        if ($this->validate()) {
            Yii::$app->mailer->compose()
                ->setTo('nicolaypetrovich@icloud.com')
                ->setFrom(['no-reply@mail.com' => $this->name])
                ->setSubject('Заявка с сайта')
                ->setTextBody($this->phone.'\n\r'.$this->message)
                ->send();

            return true;
        }
        return false;
    }

}
