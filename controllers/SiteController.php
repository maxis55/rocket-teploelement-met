<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\widgets\Menu;

class SiteController extends Controller
{



    /**
     * cross pages actions
     */
    public function actions()
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

        // return settings
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
