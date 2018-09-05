<?php
/**
 * Created by PhpStorm.
 * User: Rocketcmp-1_3
 * Date: 05.09.2018
 * Time: 11:06
 */

namespace app\controllers;


use app\models\LoginForm;
use app\models\MediaSearch;
use Yii;
use yii\web\Controller;
use app\models\Pages;
use app\models\PagesSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class AdminController extends Controller
{

    public $layout = 'admin/main';

    public function actionIndex()
    {

        return $this->render('index');
    }

    public function actionLogin()
    {

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);

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

        public function actionPagesUpdate($id)
        {
            $model = $this->findPagesModel($id);

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['admin/pages-view', 'id' => $model->id]);
            }

            return $this->render('pages/update', [
                'model' => $model,
            ]);
        }

        public function actionPagesDelete($id)
        {
            $this->findPagesModel($id)->delete();

            return $this->redirect(['admin/pages']);
        }

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
            $searchModel = new MediaSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('media/index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }

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

        public function actionMediaUpdate($id)
        {
            $model = $this->findMediaModel($id);

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['media/view', 'id' => $model->id]);
            }

            return $this->render('media/update', [
                'model' => $model,
            ]);
        }

        public function actionMediaDelete($id)
        {
            $this->findMediaModel($id)->delete();

            return $this->redirect(['media/index']);
        }

        protected function findMediaModel($id)
        {
            if (($model = Media::findOne($id)) !== null) {
                return $model;
            }

            throw new NotFoundHttpException('The requested page does not exist.');
        }

    //media actions end
}