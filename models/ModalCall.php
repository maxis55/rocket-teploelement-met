<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\Messages;


/**
 * ContactForm is the model behind the contact form.
 */
class ModalCall extends Model
{

    public $name;
    public $phone;
    public $permission;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['name', 'phone', 'permission'], 'required', 'message' => 'Поле должно быть заполнено'],
        ];
    }


    /**
     * Sends an email to the admin email address
     */
    public function contact()
    {
        if ($this->validate()) {

            // saving in admin panel
            Messages::addMessage($this, 2, 0);

            // sending mail
            Yii::$app->mailer->compose()
                ->setTo('nicolaypetrovich@icloud.com')
                ->setFrom(['no-reply@mail.com' => $this->name])
                ->setSubject('Заявка с сайта')
                ->setTextBody($this->phone.'\n\r')
                ->send();

            return true;
        }
        return false;
    }

}
