<?php
/**
 * Created by PhpStorm.
 * User: Rocketcmp-1_3
 * Date: 05.09.2018
 * Time: 11:06
 */

namespace app\controllers;


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
}