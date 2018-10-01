<?php
/**
 * Created by PhpStorm.
 * User: Rocketcmp-1_3
 * Date: 05.09.2018
 * Time: 11:06
 */

namespace app\controllers;


use app\models\Category;
use app\models\CategorySearch;
use app\assets\AdminAsset;
use app\models\Characteristics;
use app\models\CharacteristicsSearch;
use app\models\LoginForm;
use app\models\Media;
use app\models\MediaSearch;
use app\models\Messages;
use app\models\MessagesSearch;
use app\models\News;
use app\models\NewsSearch;
use app\models\Orders;
use app\models\OrdersSearch;
use app\models\Pagesmeta;
use app\models\ProductCharacteristics;
use app\models\Products;
use app\models\ProductsSearch;
use app\models\Settings;
use app\models\PasswordResetRequestForm;
use app\models\ResetPasswordForm;
use Yii;
use yii\base\InvalidParamException;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use app\models\Pages;
use app\models\PagesSearch;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

class AdminController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['login','reset-password','request-password-reset'],
                    ],
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                    'settingsUpdate' => ['post', 'get'],
                ],
            ],
        ];
    }

    public $layout = 'admin/main';

    public function init()
    {
        AdminAsset::register(Yii::$app->view);

        parent::init();
    }

    public function actionIndex()
    {

        return $this->render('index');
    }


    /**
     * Lists all Category models.
     * @return mixed
     */
    public function actionCategories()
    {
        $searchModel = new CategorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('categories/index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Category model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException
     */
    public function actionCategoryView($id)
    {
        return $this->render('categories/view', [
            'model' => $this->findCategoryModel($id),
        ]);
    }

    /**
     * Creates a new Category model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCategoryCreate()
    {
        $model = new Category();


        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            return $this->redirect(['admin/category-view', 'id' => $model->id]);
        }

        $parentCategories = Category::getCategoryByParent(null);


        return $this->render('categories/create', [
            'model' => $model,
            'parentCategories' => $parentCategories,
        ]);
    }

    /**
     * Updates an existing Category model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionCategoryUpdate($id)
    {
        $model = $this->findCategoryModel($id);



        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $characteristicsPost = Yii::$app->request->post()["Category"]['characteristics'];

            //get related characteristics, turn into array of IDs
            if (!empty($characteristicsPost)) {
                $currCharacteristics = array_map(function ($object) {
                    return $object->id;
                }, $model->characteristics);

                //get deleted characteristics
                $removedCharacteristics = array_diff($currCharacteristics, $characteristicsPost);

                //new characteristics to add
                $newCharacteristics = array_diff($characteristicsPost, array_diff($currCharacteristics, $removedCharacteristics));

                foreach ($removedCharacteristics as $item) {
                    $model->unlink('characteristics', Characteristics::findOne($item), true);
                }
                foreach ($newCharacteristics as $item) {
                    $model->link('characteristics', Characteristics::findOne($item));
                }
            }
            return $this->redirect(['admin/category-view', 'id' => $model->id]);
        }

        if(null != $model->parent){
            $temp=json_decode($model->content);
            $model->content_arr1=$temp[0];
            $model->content_arr2=$temp[1];
            $model->content_arr3=$temp[2];
        }

        $allCharacteristics = Characteristics::getCharacteristicsByPar();
        $parentCategories = Category::getCategoryByParent(null);


        return $this->render('categories/update', [
            'model' => $model,
            'parentCategories' => $parentCategories,
            'allCharacteristics' => $allCharacteristics,
        ]);
    }

    /**
     * Deletes an existing Category model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     * @throws \Exception
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionCategoryDelete($id)
    {
        $this->findCategoryModel($id)->delete();

        return $this->redirect(['admin/categories/']);
    }

    /**
     * Finds the Category model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Category the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findCategoryModel($id)
    {
        if (($model = Category::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    //pages actions

    public function actionPages()
    {
        $searchModel = new PagesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('pages/index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * @param $id
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionPagesView($id)
    {
        return $this->render('pages/view', [
            'model' => $this->findPagesModel($id),
        ]);
    }

    public function actionPagesCreate()
    {
        $model = new Pages();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['admin/pages-view', 'id' => $model->id]);
        }

        return $this->render('pages/create', [
            'model' => $model,
        ]);
    }

    /**
     * @param $id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException
     */
    public function actionPagesUpdate($id)
    {
        $model = $this->findPagesModel($id);

        if (Yii::$app->request->isPost) {
            $post = Yii::$app->request->post('Pages');
            $meta = Pagesmeta::find()->where(['=', 'page_id', $id])->all();

            $cities_name=Yii::$app->request->post('cities_names');
            $cities_messages=Yii::$app->request->post('cities_messages');
            if(!empty($cities_name)&&!empty($cities_messages)){
                $cities=array_combine($cities_name,$cities_messages);
                $post['map_cities']=json_encode($cities);
            }

            foreach ($meta as $single_meta) {
                $single_meta->value = $post[$single_meta->key];
                $single_meta->save();
            }
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['admin/pages-view', 'id' => $model->id]);
        }

        return $this->render('pages/update', [
            'model' => $model,
        ]);
    }

    /**
     * @param $id
     * @return \yii\web\Response
     * @throws NotFoundHttpException
     * @throws \Exception
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionPagesDelete($id)
    {
        $this->findPagesModel($id)->delete();

        return $this->redirect(['admin/pages']);
    }

    /**
     * @param $id
     *
     * @return Pages * @throws NotFoundHttpException
     * @throws NotFoundHttpException
     */
    protected function findPagesModel($id)
    {
        if (($model = Pages::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    //pages actions end

    //media actions

    public function actionMedia()
    {
        if (yii::$app->request->isPost) {

            $files = UploadedFile::getInstancesByName( 'images');

            foreach ($files as $obj) {
                Media::uploadImage($obj);
            }
        }

        $searchModel = new MediaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('media/index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * @param $id
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionMediaView($id)
    {
        return $this->render('media/view', [
            'model' => $this->findMediaModel($id),
        ]);
    }

    public function actionMediaCreate()
    {
        $model = new Media();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['media/view', 'id' => $model->id]);
        }

        return $this->render('media/create', [
            'model' => $model,
        ]);
    }

    /**
     * @param $id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException
     */
    public function actionMediaUpdate($id)
    {
        $model = $this->findMediaModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['admin/media-view', 'id' => $model->id]);
        }

        return $this->render('media/update', [
            'model' => $model,
        ]);
    }

    /**
     * @param $id
     * @return \yii\web\Response
     * @throws NotFoundHttpException
     * @throws \Exception
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionMediaDelete($id)
    {
        $this->findMediaModel($id)->delete();

        return $this->redirect(['admin/media']);
    }

    public function actionMediaLibrary()
    {
        $data = yii::$app->request->post();
        $counter = $data['counter'];
        $type = $data['type'];
        return Media::getImagesLibrary($counter, $type);
    }

	/**
	 * @param $id
	 *
	 * @throws NotFoundHttpException
	 */
    protected function findMediaModel($id)
    {
        if (($model = Media::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    //media actions end


    //start of "News" block
    /**
     * Lists all News models.
     * @return mixed
     */
    public function actionNews()
    {
        $searchModel = new NewsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('news/index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single News model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionNewsView($id)
    {
        return $this->render('news/view', [
            'model' => $this->findNewsModel($id),
        ]);
    }

    /**
     * Creates a new News model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionNewsCreate()
    {
        $model = new News();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['news-view', 'id' => $model->id]);
        }

        return $this->render('news/create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing News model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionNewsUpdate($id)
    {
        $model = $this->findNewsModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['admin/news-view', 'id' => $model->id]);
        }

        return $this->render('news/update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing News model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     * @throws \Exception
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionNewsDelete($id)
    {
        $this->findNewsModel($id)->delete();

        return $this->redirect(['admin/news']);
    }

    /**
     * Finds the News model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return News the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findNewsModel($id)
    {
        if (($model = News::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


//end of "News" block


    /**
     * Lists all Settings models.
     * @return mixed
     * @throws NotFoundHttpException
     */
    public function actionSettings()
    {

        $meta = Settings::getCrossPagesData(['key', 'value', 'type', 'title'], true);
        return $this->render('settings/view', [
            'meta' => $meta
        ]);
    }

    public function actionSettingsUpdate()
    {


        if (Yii::$app->request->isPost) {

            $json_settings = array('menu');
            $settings = Settings::find()->indexBy('key')->all();

            $post = Yii::$app->request->post();
            foreach ($settings as $settings_key => $settings_item) {

                if (in_array($settings_item->type, $json_settings)) {
                    $settings[$settings_key]->value = json_encode($post[$settings_key]);
                    $settings[$settings_key]->save();
                } else {
                    $settings[$settings_key]->value = $post[$settings_key];
                    $settings[$settings_key]->save();
                }

            }
            return $this->redirect('settings');
        }
        $meta = Settings::getCrossPagesData(['key', 'value', 'type', 'title'], true);

        $pagesSlugs = Pages::getPages(['slug', 'title']);

        return $this->render('settings/update', [
            'meta' => $meta,
            'pagesSlugs' => $pagesSlugs
        ]);
    }


    /**
     * Lists all Products models.
     * @return mixed
     */
    public function actionProducts()
    {
        $searchModel = new ProductsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams,array(),10);

        return $this->render('products/index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Products model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionProductsView($id)
    {
        return $this->render('products/view', [
            'model' => $this->findProductsModel($id),
        ]);
    }

    /**
     * Creates a new Products model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionProductsCreate()
    {
        $model = new Products();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['admin/products-view', 'id' => $model->id]);
        }
        $parentCategories = Category::getCategoryByParent(null);

        return $this->render('products/create', [
            'model' => $model,
            'parentCategories' => $parentCategories,
        ]);
    }

    /**
     * Updates an existing Products model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionProductsUpdate($id)
    {
        $model = $this->findProductsModel($id);
        $request = Yii::$app->request;
        if ($request->isPost) {
            $tempPost = Yii::$app->request->post();
            $postCharacteristics = $tempPost['Products']['characteristics'];
            $tempPost['Products']['steel_type'] = json_encode($tempPost['steel_type']);

            if ($model->load($tempPost) && $model->save()) {

                if (!empty($postCharacteristics)) {
                    //no way to evaluate which characteristics are changed, need to delete all
                    ProductCharacteristics::deleteAll(['product_id' => $model->id]);
                    foreach ($postCharacteristics as $key => $characteristic) if(!empty($characteristic)) {
                        $model->link('characteristics', Characteristics::findOne($key), array('value' => $characteristic));
                    }
                }
                return $this->redirect(['admin/products-view', 'id' => $model->id]);
            }
        }


        $parentCategories = Category::getCategoryByParent(null);

        return $this->render('products/update', [
            'model' => $model,
            'parentCategories' => $parentCategories,
        ]);
    }

    /**
     * Deletes an existing Products model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     * @throws \Exception
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionProductsDelete($id)
    {
        $this->findProductsModel($id)->delete();

        return $this->redirect(['admin/products']);
    }

    /**
     * Finds the Products model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Products the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findProductsModel($id)
    {
        if (($model = Products::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    /**
     * Lists all Characteristics models.
     * @return mixed
     */
    public function actionCharacteristics()
    {
        $searchModel = new CharacteristicsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('characteristics/index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Characteristics model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionCharacteristicsView($id)
    {
        return $this->render('characteristics/view', [
            'model' => $this->findCharacteristicsModel($id),
        ]);
    }

    /**
     * Creates a new Characteristics model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCharacteristicsCreate()
    {
        $model = new Characteristics();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['admin/characteristics-view', 'id' => $model->id]);
        }

        return $this->render('characteristics/create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Characteristics model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionCharacteristicsUpdate($id)
    {
        $model = $this->findCharacteristicsModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['admin/characteristics-view', 'id' => $model->id]);
        }

        return $this->render('characteristics/update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Characteristics model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     * @throws \Exception
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionCharacteristicsDelete($id)
    {
        $this->findCharacteristicsModel($id)->delete();

        return $this->redirect(['admin/characteristics']);
    }

    /**
     * Finds the Characteristics model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Characteristics the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findCharacteristicsModel($id)
    {
        if (($model = Characteristics::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }




    /**
     * Lists all Orders models.
     * @return mixed
     */
    public function actionOrders()
    {
        $searchModel = new OrdersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('orders/index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Orders model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionOrdersView($id)
    {
        return $this->render('orders/view', [
            'model' => $this->findOrdersModel($id),
        ]);
    }

    /**
     * Deletes an existing Orders model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     * @throws \Exception
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionOrdersDelete($id)
    {
        $this->findOrdersModel($id)->delete();

        return $this->redirect(['admin/orders']);
    }

    /**
     * Finds the Orders model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Orders the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findOrdersModel($id)
    {
        if (($model = Orders::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }



    public function actionMessages()
    {
        $searchModel = new MessagesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('messages/index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Messages model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionMessagesView($id)
    {
        return $this->render('messages/view', [
            'model' => $this->findMessagesModel($id),
        ]);
    }


    /**
     * Deletes an existing Messages model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     * @throws \Exception
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionMessagesDelete($id)
    {
        $this->findMessagesModel($id)->delete();

        return $this->redirect(['admin/messages']);
    }

    /**
     * Finds the Messages model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Messages the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findMessagesModel($id)
    {
        if (($model = Messages::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }




    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        $this->layout='admin/main-login';
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect('index');
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);

    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $this->layout='admin/main-login';
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                return $this->goHome();
            }

        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        $this->layout='admin/main-login';
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'Новый пароль сохранён.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

}