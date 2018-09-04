<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\widgets\Menu;
use app\models\Settings;

class SiteController extends Controller
{



    /**
     * Cross pages actions
     */
    public function beforeAction()
    {


        // cross pages data
        $this->view->params['cross_pages_data'] = Settings::getCrossPagesData();


        // footer navigation
        $this->view->params['footer_nav'] = Menu::widget([
            'items' =>$this->view->params['cross_pages_data']['footer_menu'],
            'options'=>['class'=>'menu'],
        ]);


        // header navigation
        $this->view->params['header_nav'] = Menu::widget([
            'items' =>$this->view->params['cross_pages_data']['header_menu'],
            'submenuTemplate' => "\n<ul class='sub_menu'>\n{items}\n</ul>\n",
            'options'=>['class'=>'menu'],
        ]);

        return true;
    }



    /**
     * External actions
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ]
        ];
    }



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
