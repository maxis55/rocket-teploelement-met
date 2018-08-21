<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;
use app\models\Messages;


/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends Model
{

    public $name;
    public $phone;
    public $message;
    public $file;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['name', 'phone', 'message'], 'required', 'message' => 'Поле должно быть заполнено'],
            [['file'], 'file', 'message' => 'Поле должно быть заполнено'],
            ['phone', 'match', 'pattern' => '/(\(?\d{3}\)?[\- ]?)?[\d\- ]{4,10}$/', 'message' => 'Неверный формат телефона'],
        ];
    }


    /**
     * Sends an email to the admin email address
     */
    public function contact()
    {
        if ($this->validate()) {
            $file = UploadedFile::getInstance($this, 'file');

            // saving in admin panel
            $f = 0;
            if($file->size) $f = 1;
            $id = Messages::addMessage($this, 1, $f);

            // saving file
            if ($id && $file->size) $file->saveAs('uploads/'.$id.'.'.$file->extension);

            // sending mail
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
