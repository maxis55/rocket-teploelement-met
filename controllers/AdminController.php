<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;



class AdminController extends Controller
{

    public $layout = 'admin';

    /**
     * Displays homepage.
     */
    public function actionLogin()
    {
        $this->layout = 'admin_logout';
        return $this->render('login');
    }

    /**
     * Displays homepage.
     */
    public function actionIndex()
    {
        return $this->redirect(['admin/delivery']);
    }

    /**
     * Displays delivery page
     */
    public function actionDelivery()
    {
        return $this->render('delivery');
    }

    /**
     * Displays characteristics page
     */
    public function actionCharacteristics()
    {
        return $this->render('characteristics');
    }



}
