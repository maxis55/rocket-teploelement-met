<?php
/**
 * Created by PhpStorm.
 * User: Rocketcmp-1_3
 * Date: 05.09.2018
 * Time: 11:06
 */

namespace app\controllers;


use app\models\LoginForm;
use Yii;
use yii\web\Controller;

class AdminController extends Controller
{

    public $layout = 'admin/main';

    /**
     * Displays homepage.
     */
    public function actionIndex()
    {

        return $this->render('index');
    }

    public function actionLogin()
    {

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);

    }
}