<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\data\Pagination;
use app\models\AdminLoginForm;
use app\models\Delivery;
use app\models\Characteristics;
use app\models\Messages;



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

        // cross pages data
        $this->view->params['unread_messages'] = Messages::getNewMessages();

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

        // saving updates
        if (Yii::$app->request->post())
            Characteristics::updateAllCharacteristics(Yii::$app->request->post()['characteristic']);

        $characteristics = Characteristics::getAllCharacteristics();

        return $this->render('characteristics', compact('characteristics'));
    }


    /**
     * displays messages page
     */
    public function actionMessages()
    {
        $pages = new Pagination(['totalCount' => Messages::getTotalCount()]);
        $messages = Messages::getMessages($pages);

        return $this->render('messages', compact('messages', 'pages'));
    }



}
