<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\widgets\Menu;
use app\models\Settings;
use app\models\News;
use app\models\Delivery;
use app\models\Products;
use app\models\Products_characteristics;
use app\models\Category;
use app\models\Steel;
use app\models\ContactForm;
use app\models\ModalCall;



class SiteController extends Controller
{


    /**
     * Cross pages actions
     * @param $action
     * @return bool|\yii\web\Response
     * @throws \Exception
     */
    public function beforeAction($action)
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

        // cross pages forms
        $this->view->params['contact_form'] = new ContactForm();
        $this->view->params['modal_call'] = new ModalCall();

        // cross pages forms submits
        if ($this->view->params['modal_call']->load(Yii::$app->request->post()) && $this->view->params['modal_call']->contact())
            return $this->refresh();
        if ($this->view->params['contact_form']->load(Yii::$app->request->post()) && $this->view->params['contact_form']->contact())
            return $this->refresh();

        // categories list for main navigation
        $this->view->params['navCategories'] = Category::getSubCategories();

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
     * @param $slug
     * @return string
     */
    public function actionNewsPage($slug)
    {
        $news = News::getSingleNews($slug);

        return $this->render('news_page', compact('news'));
    }


    /**
     * Displays product page.
     * @param $slug
     * @return string
     */
    public function actionProduct($slug)
    {
        $product = Products::getProduct($slug);
        $characteristics = Products_characteristics::getCharacteristics($product['id']);
        $steel = Steel::getSteel($product['id']);

        return $this->render('product', compact('product','characteristics','steel'));
    }


    /**
     * Displays catalog category page.
     * @param $category
     * @return string
     */
    public function actionCatalogCategory($category)
    {
        $slug = $category;
        $category = Category::getCategory($slug);
        $subCategory = Category::getSubCategory($category['id']);

        return $this->render('category', compact('category','subCategory','slug'));
    }


    /**
     * Displays catalog subcategory and sub-subcategory page.
     * @param $category
     * @param $subcategory
     * @param null $subsubcategory
     * @return string
     */
    public function actionCatalogSubcategory($category, $subcategory, $subsubcategory=null)
    {
        $slug = $category;

        // category data
        if ($subsubcategory) $category = Category::getCategory($subsubcategory);
        else $category = Category::getCategory($subcategory);

        // breadcrumbs data
        $breadcrumbs = [['cat',$slug]];
        if ($subsubcategory) $breadcrumbs[] = ['sub',$subcategory];

        return $this->render('sub_category', compact('category','slug','breadcrumbs'));
    }



}
