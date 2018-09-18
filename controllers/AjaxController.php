<?php
/**
 * Created by PhpStorm.
 * User: Rocketcmp-1_3
 * Date: 17.09.2018
 * Time: 12:18
 */

namespace app\controllers;


use app\components\OutputHelper;
use Yii;
use yii\web\Controller;
use yii\web\Response;

class AjaxController extends Controller
{

    public function actionAddToCart()
    {
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
                'expire' => time() + 60 * 60 * 24 * 2,
            ]));

        }

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
                'expire' => time() + 60 * 60 * 24 * 2,
            ]));

        $sizeofcart=sizeof($cart_content2);
        return $sizeofcart.' '.OutputHelper::true_wordform($sizeofcart,'позиция','позиции','позиций');
        }
    }
}