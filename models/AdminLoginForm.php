<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\Settings;

/**
 * LoginForm is the model behind the login form
 */
class AdminLoginForm extends Model
{
    public $username;
    public $password;

    private $_user = false;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            ['password', 'validatePassword'],
        ];
    }


    /**
     * Validates the password
     */
    public function validatePassword($attribute)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user || $this->username != $user['admin_username']->value || md5($this->password) != $user['admin_password']->value)
                $this->addError($attribute, 'Не верный логин или пароль');
        }
    }

    /**
     * Logs in a user
     */
    public function login()
    {

        if ($this->validate()) {
            $session = Yii::$app->session;
            if (!$session->isActive)
                $session->open();
            $session->set('admin', true);
            return true;
        }

        return false;
    }

    /**
     * Gets admin data
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $admin = Settings::find()->select('key,value')
                ->where(['like', 'key', 'admin'])
                ->indexBy('key')
                ->all();
            $this->_user = $admin;
        }

        return $this->_user;
    }
}