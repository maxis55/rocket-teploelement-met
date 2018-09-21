<?php

namespace app\controllers;

use app\models\Category;
use app\models\Media;
use app\models\News;
use app\models\Products;
use app\models\ProductsSearch;
use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\web\Controller;
use yii\widgets\Menu;
use app\models\Settings;
use app\models\Pages;
use app\models\Pagesmeta;

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


        $arrayWithoutCategories = array('contact', 'news-page', 'news');
        //categories
        if (!in_array(Yii::$app->controller->action->id, $arrayWithoutCategories)) {
            $categories = Category::getCategoryByParent(null);
            $this->view->params['categories'] = $categories;
        }
        $pagesSlugs = Pages::find()->select(['slug'])->where(['<','id','5'])->asArray()->all();

        return parent::beforeAction($action);
    }


    public function actionError()
    {
        $exception = Yii::$app->errorHandler->exception;

        if ($exception !== null) {
            $page_content = Pagesmeta::getPageMeta('404', true);
            $media_ids = array();
            foreach ($page_content as $item) {
                if ('image' == $item['type']) {
                    $media_ids[] = $item['value'];
                }
            }
            $mediaArr = Media::findInIdAsArray($media_ids);
            return $this->render('error', [
                'exception' => $exception,
                'page_content' => ArrayHelper::map($page_content, 'key', 'value'),
                'media_arr' => $mediaArr
            ]);
        }
    }

    /**
     * Displays homepage.
     */
    public function actionIndex()
    {
        $this->layout = 'index';

        $page_content = Pagesmeta::getPageMeta('index', true);
        $media_ids = array();
        foreach ($page_content as $item) {
            if ('image' == $item['type']) {
                $media_ids[] = $item['value'];
            }
        }

        $news_slider = News::find()
            ->select(['name', 'date', 'shortdesc', 'slug'])
            ->orderBy(['date' => SORT_DESC,'id' => SORT_DESC])
            ->limit($page_content['posts_per_page']['value'])
            ->asArray()
            ->all();

        $mediaArr = Media::findInIdAsArray($media_ids);

        return $this->render('index', [
            'news_slider' => $news_slider,
            'page_content' => ArrayHelper::map($page_content, 'key', 'value'),
            'media_arr' => $mediaArr
        ]);
    }

    /**
     * Displays archive news page.
     * @return string
     */
    public function actionNews()
    {

        $request = Yii::$app->request;
        $viewed = $request->get('sortBy') === 'viewed';
        $page_content = Pagesmeta::getPageMeta('news');
        $news = News::getArchiveNews($page_content['posts_per_page'], $viewed);
        $maxNews=(int)News::find()->count();
        return $this->render('news',
            [
                'news' => $news,
                'page_content' => $page_content,
                'maxNews'=>$maxNews
            ]
        );
    }

    /**
     * Displays single news page.
     * @param string $slug
     * @return string
     */
    public function actionNewsPage($slug)
    {
        $news = News::getSingleNews($slug);
        $this->view->params['breadcrumbs'][] = ['label' => 'Новости', 'url' => Url::toRoute(['site/news'])];
        $this->view->params['breadcrumbs'][] = $news['name'];

        $cookiesWrite = Yii::$app->response->cookies;
        $cookiesRead = Yii::$app->request->cookies;

        $read_news = array();
        $curr_news_id = $news['id'];
        if (null != $curr_news_id && '' != $curr_news_id) {

            if (($cookie = $cookiesRead->get('read_news')) !== null) {
                $read_news = json_decode($cookie->value, true);
            }
            if (!in_array($curr_news_id, $read_news)) {
                $read_news[] = $curr_news_id;
            } else {
                $read_news = array_diff($read_news, [$curr_news_id]);
                $read_news[] = $curr_news_id;
            }
            $cookiesWrite->add(new \yii\web\Cookie([
                'name' => 'read_news',
                'value' => json_encode(
                    $read_news
                ),
                'expire' => time() + 60 * 60 * 24 * 4, //4 days
            ]));

        }


        return $this->render('news-page', ['news' => $news]);
    }


    /**
     * Displays single news page.
     * @param string $slug
     * @return string
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionSinglePage($slug)
    {
        $page = Pages::findOne(['slug'=>$slug]);
        $this->view->params['breadcrumbs'][] = $page->title;

        if(!empty($page))
                return $this->render('single-page', ['page' => $page]);
            else
                throw new \yii\web\NotFoundHttpException();

    }




    /**
     * Displays product page.
     * @param $product_slug
     * @return string
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionProduct($product_slug)
    {
        $product = Products::findProductBySlug($product_slug);

        $characteristicsWvalues = Products::getCharacteristicsWvalues($product_slug);
        $searchModel = new ProductsSearch();
        $filterParams = Yii::$app->request->queryParams;
        $subcategoriesIdsArray = array_column(Category::findAllSubcategoryIds($product->category_id), 'id');
        $subcategoriesIdsArray[] = $product->category_id;

        $dataProvider = $searchModel->search($filterParams, $subcategoriesIdsArray);

        return $this->render('product',
            [
                'dataProvider' => $dataProvider,
                'product' => $product,
                'characteristicsWvalues' => $characteristicsWvalues
            ]
        );
    }

    /**
     * Displays contact page.
     */
    public function actionContact()
    {

        $page_content = Pagesmeta::getPageMeta('contact', true);
        $media_ids = array();
        foreach ($page_content as $item) {
            if ('image' == $item['type']) {
                $media_ids[] = $item['value'];
            }
        }
        $mediaArr = Media::findInIdAsArray($media_ids);

        return $this->render('contact', [
            'page_content' => ArrayHelper::map($page_content, 'key', 'value'),
            'media_arr' => $mediaArr
        ]);
    }


    /**
     * Displays delivery page.
     */
    public function actionDelivery()
    {
        $page_content = Pagesmeta::getPageMeta('delivery', true);
        $media_ids = array();
        foreach ($page_content as $item) {
            if ('image' == $item['type']) {
                $media_ids[] = $item['value'];
            }
        }


        $mediaArr = Media::findInIdAsArray($media_ids);

        return $this->render('delivery', [
            'page_content' => ArrayHelper::map($page_content, 'key', 'value'),
            'media_arr' => $mediaArr
        ]);
    }


    /**
     * Displays catalog category page.
     * @param $category_slug
     * @return string
     */
    public function actionCatalogCategory($category_slug)
    {
        $category = Category::getCategory($category_slug);
        $subCategory = Category::getSubCategory($category['id'], ['category.name', 'category.slug', 'category.shortdesc']);

        $this->view->params['breadcrumbs'][] = $category['name'];

        return $this->render('category', compact('category', 'subCategory'));
    }


    /**
     * Displays catalog subcategory and sub-subcategory page.
     * @param $category_slug
     * @param $subcategory_slug
     * @param null $subsubcategory_slug
     * @return string
     */
    public function actionCatalogSubcategory($category_slug, $subcategory_slug, $subsubcategory_slug = null)
    {

        $first_category = Category::getCategory($category_slug, ['category.name']);

        $this->view->params['breadcrumbs'][] =
            [
                'label' => $first_category['name'],
                'url' => Url::toRoute(['catalog-category', 'category_slug' => $category_slug])
            ];
        $searchModel = new ProductsSearch();
        $filterParams = Yii::$app->request->queryParams;
        // category & breadcrumbs data
        if (null != $subsubcategory_slug) {

            $subcategory = Category::getCategory(['slug' => $subcategory_slug], ['category.name']);
            $subsubcategory = Category::findOne(['slug' => $subsubcategory_slug]);


            $this->view->params['breadcrumbs'][] =
                ['label' => $subcategory->name,
                    'url' =>
                        Url::toRoute(['catalog-subcategory', 'category_slug' => $category_slug, 'subcategory_slug' => $subcategory_slug])
                ];

            $this->view->params['breadcrumbs'][] = $subsubcategory['name'];


            $dataProvider = $searchModel->search($filterParams, [$subsubcategory->id]);

            return $this->render('sub_category',
                [

                    'current_category' => $subsubcategory,
                    'subcategory_slug' => $subcategory_slug,
                    'subsubcategory_slug' => $subsubcategory_slug,
                    'category_slug' => $category_slug,
                    'dataProvider' => $dataProvider,

                ]);


        } else {

            $subcategory = Category::findOne(['slug' => $subcategory_slug]);

            $this->view->params['breadcrumbs'][] = $subcategory->name;


            $subcategoriesIdsArray = array_column(Category::findAllSubcategoryIds($subcategory->id), 'id');
            $subcategoriesIdsArray[] = $subcategory->id;

            $dataProvider = $searchModel->search($filterParams, $subcategoriesIdsArray);

            return $this->render('sub_category', [
                'current_category' => $subcategory,
                'category_slug' => $category_slug,
                'subcategory_slug' => $subcategory_slug,
                'dataProvider' => $dataProvider,
            ]);
        }

    }


}
