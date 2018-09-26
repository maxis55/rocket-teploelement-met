<?php


namespace app\components;


use app\models\Media;
use Yii;
use yii\base\Component;
use yii\helpers\Url;
use yii\web\Response;

class OutputHelper extends Component
{
    public static function outputCart($cart_content=array())
    {
        if(empty($cart_content)){
            $cookiesRead = Yii::$app->request->cookies;
            if (($cookie = $cookiesRead->get('cart_content')) !== null) {
                $cart_content = json_decode($cookie->value,true);
            }
        }

        $result = '<tr>
                            <th class="cell1">Наименование</th>
                            <th class="cell2">Количество</th>
                            <th class="cell3"></th>
                   </tr>';

        if(!empty($cart_content)){
            $i=0;
            foreach ($cart_content as $item){
                $result.='<tr>'.
                    ' <td class="cell1">'.$item['product_name'].'<br><span class="steel_type">Марка стали: '.$item['steel_type'].'</span></td>';
                $result.='<td class="cell2">
                                <div class="counter-wrapper">
                                    <div class="counter-box">
                                        <button class="counter-minus" ></button>
                                        <input type="number" class="counter-qt" data-prod_id="'.$item['product_id'].'" value="'.$item['amount'].'">
                                        <button class="counter-plus" ></button>
                                    </div>
                                </div>
                            </td>';
                $result.='<td class="cell3"><span data-prod_id="'.$item['product_id'].'" class="basket_close"></span></td>';
                $result.='</tr>';

                $i++;
            }
            $result.='<tr>
                            <td colspan="3" class="basket_total">
                                <table class="basket_inner_tb">
                                    <tbody>
                                    <tr>
                                        <td class="cell1 basket_mes_td">
                                            <span class="basket_count_mes">готово к показу</span>
                                            <span class="basket_count">'.$i.' '.self::true_wordform($i,'позиция','позиции','позиций').'</span> 
                                        </td>
                                        <td class="al_right">
                                            <button class="clear_all white_btn">Очистить все</button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>';
        }


        if (\Yii::$app->request->isAjax) {
            return ['cart_html' => $result];
        } else {
            return $result;
        }
//        die();

    }



    public static function drawOneNewsElement($element){
        return  ' <div class="main_news_item">
                                <figure>
                                    <a href="'. Url::toRoute(['site/news-page', 'slug' => $element['slug']]) .'" class="news_img">
                                        <img src="'. Media::getImageOfSizeStatic($element['media_name'],'image').'">
                                    </a>
                                    <figcaption>
                                        <time datetime="'.date('Y-m', strtotime($element['date'])).'">
                                            <span>'.date('d', strtotime($element['date'])).'</span>'
                                            .date('m.y', strtotime($element['date'])).'
                                        </time>
                                        <a href="'.Url::toRoute(['site/news-page', 'slug' => $element['slug']]).'" class="news_name">'. $element['name'].'</a>
                                    </figcaption>
                                    <span class="news_content">
										'.$element['shortdesc']  .'
                                        <a href="'. Url::toRoute(['site/news-page', 'slug' => $element['slug']]).'" class="news_content_lk"></a>
									</span>
                                </figure>
                            </div>';

    }




    public static function true_wordform($num, $form_for_1, $form_for_2, $form_for_5)
    {
        $num = abs($num) % 100; // берем число по модулю и сбрасываем сотни (делим на 100, а остаток присваиваем переменной $num)
        $num_x = $num % 10; // сбрасываем десятки и записываем в новую переменную
        if ($num > 10 && $num < 20) // если число принадлежит отрезку [11;19]
            return $form_for_5;
        if ($num_x > 1 && $num_x < 5) // иначе если число оканчивается на 2,3,4
            return $form_for_2;
        if ($num_x == 1) // иначе если оканчивается на 1
            return $form_for_1;
        return $form_for_5;
    }


}