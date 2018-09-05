<?php

namespace app\controllers;

use app\models\News;
use Yii;
use yii\web\Controller;
use yii\widgets\Menu;
use app\models\Settings;

class SiteController extends Controller
{


    /**
     * Cross pages actions
     * @param $action
     * @return bool
     * @throws \Exception
     */
    public function beforeAction($action)
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

        return parent::beforeAction($action);
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
        $news_slider = News::getFirstArchiveNews();
        return $this->render('index',['news_slider'=>$news_slider]);
    }

    /**
     * Displays archive news page.
     * @param $slug
     * @return string
     */
    public function actionNews()
    {
        $news = News::getFirstArchiveNews();
        return $this->render('news', compact('news'));
    }
    /**
     * Displays single news page.
     * @param string $slug
     * @return string
     */
    public function actionNewsPage($slug)
    {
        $news = News::getSingleNews($slug);
        return $this->render('news-page', ['news'=>$news]);
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
