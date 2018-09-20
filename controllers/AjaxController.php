<?php
/**
 * Created by PhpStorm.
 * User: Rocketcmp-1_3
 * Date: 17.09.2018
 * Time: 12:18
 */

namespace app\controllers;


use app\components\OutputHelper;
use app\models\Media;
use app\models\Messages;
use app\models\News;
use app\models\Orders;
use Yii;
use yii\web\Controller;
use yii\web\Response;
use yii\web\UploadedFile;

class AjaxController extends Controller
{

    public function actionAddToCart()
    {
        $cart_content=array();
        if (\Yii::$app->request->isAjax) {
            $cookiesWrite = Yii::$app->response->cookies;
            $cookiesRead = Yii::$app->request->cookies;
            $cart_content=array();


            if (($cookie = $cookiesRead->get('cart_content')) !== null) {
                $cart_content = json_decode($cookie->value,true);
            }
            $post_content = Yii::$app->request->post();

            $cart_content[$post_content['product_id']]=[
                'product_id' => $post_content['product_id'] ,
                'product_name' => $post_content['product_name'],
                'amount' => $post_content['amount'],
                'steel_type' => $post_content['steel_type'],
            ];
            $cookiesWrite->add(new \yii\web\Cookie([
                'name' => 'cart_content',
                'value' => json_encode(
                    $cart_content
                ),
                'expire' => time() + 60 * 60 * 24 * 2, //2 days
            ]));

        }
        \Yii::$app->response->format = Response::FORMAT_JSON;
        return OutputHelper::outputCart($cart_content);
    }

    public function actionDeleteFromCart()
    {
        if (\Yii::$app->request->isAjax) {
            \Yii::$app->response->format = Response::FORMAT_JSON;

            $cookiesWrite = Yii::$app->response->cookies;
            $cookiesRead = Yii::$app->request->cookies;
            $cart_content=array();


            if (($cookie = $cookiesRead->get('cart_content')) !== null) {
                $cart_content = json_decode($cookie->value,true);
            }
            $item_to_delete = Yii::$app->request->post('prod_id');

            $cart_content2=$cart_content;
            unset($cart_content2[$item_to_delete]);

            $cookiesWrite->add(new \yii\web\Cookie([
                'name' => 'cart_content',
                'value' => json_encode(
                    $cart_content2
                ),
                'expire' => time() + 60 * 60 * 24 * 2, //2 days
            ]));

        $sizeofcart=sizeof($cart_content2);
        return $sizeofcart.' '.OutputHelper::true_wordform($sizeofcart,'позиция','позиции','позиций');
        }
    }


    public function actionCreateOrder(){
        if (\Yii::$app->request->isAjax) {
            \Yii::$app->response->format = Response::FORMAT_JSON;
            $post_content = Yii::$app->request->post();
            $cookiesWrite = Yii::$app->response->cookies;
            $cookiesRead = Yii::$app->request->cookies;

            $cart_content=array();

            if (($cookie = $cookiesRead->get('cart_content')) !== null) {
                $cart_content = json_decode($cookie->value,true);
            }
            $customer_info=[
                'name'=>$post_content['name'],
                'phone'=>$post_content['phone'],
                'email'=>$post_content['email'],
                'message'=>$post_content['message'],
            ];

            $cookiesWrite->remove('cart_content');

            if(!empty($cart_content)&&!empty($cart_content)){
                $order=new Orders();
                $order->products_information=json_encode($cart_content);
                $order->customer_information=json_encode($customer_info);
                $order->save();
                return 'success';
            }

            return 'error';
        }
    }


    public function actionMessageCreate()
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        if (\Yii::$app->request->isAjax) {
            $model = new Messages();

            $post_content = Yii::$app->request->post();
            if (!empty($post_content)) {

                $model->name = $post_content['name'];
                $model->phone = $post_content['phone'];
                $model->content = $post_content['message'];
                $model->type = $post_content['type'];
                $file = UploadedFile::getInstanceByName('file');

                if (!empty($file)) {
                    $fileName = Messages::saveFile($file);
                    if (false !== $fileName) {
                        $model->file = $fileName;
                    }
                }

                if ($model->save()) {
                    return ['success'];

                }

                $model->validate();
                return ['fail', $model->errors];

            }

        }
        return ['fail'];
    }


    public function actionMoreNews(){
        \Yii::$app->response->format = Response::FORMAT_JSON;
        if (\Yii::$app->request->isAjax) {
            $get_content = Yii::$app->request->get();

            $viewed = $get_content['sortBy']==='viewed';
            $news = News::getArchiveNews( $get_content['per_page'], $viewed, $get_content['page']);
//            var_dump($news);
//            die();
            $result=array();
            foreach ($news as $element){
                $result[]=OutputHelper::drawOneNewsElement($element);
            }
            return ['html'=>$result,'last'=>sizeof($result)<$get_content['per_page']];
        }
        return ['fail'];
    }

}