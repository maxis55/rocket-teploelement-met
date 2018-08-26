<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;



class AdminController extends Controller
{



    /**
     * Displays homepage.
     */
    public function actionIndex()
    {
        //echo 1; die;
        return $this->render('index');
    }



}
