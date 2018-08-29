<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\AdminLoginForm;
use app\models\Delivery;



class AdminController extends Controller
{

    public $layout = 'admin';


    /**
     * actions before page load
     */
    public function beforeAction($action)
    {
        $session = Yii::$app->session;

        // cheking autorization
        if ( $session->get('admin')!=true && $action->id!='login' )
            return $this->redirect(['admin/login']);

        return true;
    }


    /**
     * displays login page
     */
    public function actionLogin()
    {
        $this->layout = 'admin_login';

        // login check
        $model = new AdminLoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login())
            return $this->redirect(['admin/index']);

        return $this->render('login', compact('model'));
    }


    /**
     * logout action
     */
    public function actionLogout()
    {
        Yii::$app->session->set('admin', false);

        return $this->redirect(['admin/login']);
    }


    /**
     * displays homepage
     */
    public function actionIndex()
    {
        return $this->redirect(['admin/delivery']);
    }


    /**
     * displays delivery page
     */
    public function actionDelivery()
    {

        // saving updates
        if (Yii::$app->request->post())
            Delivery::updateAllDelivery(Yii::$app->request->post());

        $delivery = Delivery::getAllDelivery();

        return $this->render('delivery', compact('delivery'));
    }


    /**
     * displays characteristics page
     */
    public function actionCharacteristics()
    {
        return $this->render('characteristics');
    }



}
