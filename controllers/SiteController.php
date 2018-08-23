<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\widgets\Menu;
use app\models\Settings;
use app\models\News;
use app\models\Delivery;
use app\models\ContactForm;
use app\models\ModalCall;

class SiteController extends Controller
{



    /**
     * Cross pages actions
     */
    public function beforeAction()
    {

        // header navigation
        $this->view->params['header_nav'] = Menu::widget([
            'items' => [
                ['label' => 'Продукция', 'url' => ['site/index'], 'items' => [
                    ['label' => 'cетка сварная', 'url' => ['site/index']],
                    ['label' => 'cетка тканная', 'url' => ['site/index']],
                    ['label' => 'cетка нержавеющая', 'url' => ['site/index'], 'items' => [
                            ['label' => 'трубы', 'url' => ['site/index']],
                            ['label' => 'листы', 'url' => ['site/index']],
                            ['label' => 'швеллера', 'url' => ['site/index']],
                        ]
                    ],
                    ['label' => 'cетка плетенная рабица', 'url' => ['site/index']],
                    ['label' => 'cетка тканная', 'url' => ['site/index']],
                ]],
                ['label' => 'Доставка', 'url' => ['site/delivery']],
                ['label' => 'Информация', 'url' => ['site/index'], 'items' => [
                    ['label' => 'новости', 'url' => ['site/index']],
                    ['label' => 'статьи', 'url' => ['site/index']],
                ]],
                ['label' => 'Контакты', 'url' => ['site/contact']],
            ],
            'submenuTemplate' => "\n<ul class='sub_menu'>\n{items}\n</ul>\n",
            'options'=>['class'=>'menu'],
        ]);

        // footer navigation
        $this->view->params['footer_nav'] = Menu::widget([
            'items' => [
                ['label' => 'Продукция', 'url' => ['site/index']],
                ['label' => 'Доставка', 'url' => ['site/delivery']],
                ['label' => 'Информация', 'url' => ['site/index']],
                ['label' => 'Контакты', 'url' => ['site/contact']],
            ],
            'options'=>['class'=>'menu'],
        ]);

        // cross pages data
        $this->view->params['cross_pages_data'] = Settings::getCrossPagesData();

        // main contact form
        $this->view->params['contact_form'] = new ContactForm();
        if ($this->view->params['contact_form']->load(Yii::$app->request->post()) && $this->view->params['contact_form']->contact())
            return $this->refresh();

        // modal contact form
        $this->view->params['modal_call'] = new ModalCall();
        if ($this->view->params['modal_call']->load(Yii::$app->request->post()) && $this->view->params['modal_call']->contact())
            return $this->refresh();

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
        $news = News::getNewsForMain();
        $delivery = Delivery::getAllDelivery();

        $this->layout = 'index';
        return $this->render('index', compact('news','delivery'));
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



    /**
     * Displays news archive page.
     */
    public function actionNews()
    {
        $news = News::getFirstArchiveNews();

        return $this->render('news', compact('news'));
    }



    /**
     * Displays single news page.
     */
    public function actionNewsPage($slug)
    {
        $news = News::getSingleNews($slug);

        return $this->render('news_page', compact('news'));
    }



}
