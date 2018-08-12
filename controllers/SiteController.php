<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;

class SiteController extends Controller
{

    /**
     * Displays homepage.
     */
    public function actionIndex()
    {
        $this->layout = 'index';
        return $this->render('index');
    }

    /**
     * Displays contact page.
     */
    public function actionContact()
    {
        return $this->render('contact');
    }

    /**
     * Displays delivery page.
     */
    public function actionDelivery()
    {
        return $this->render('delivery');
    }
}
