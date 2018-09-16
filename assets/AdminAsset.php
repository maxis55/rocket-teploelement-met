<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */
namespace app\assets;
use yii\web\AssetBundle;
/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AdminAsset extends AssetBundle
{
    public $basePath = '@webroot/admin';
    public $baseUrl = '@web/admin';
    public $css = [
        'css/admin.css',
        'https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic',
    ];
    public $js = [
        '//api-maps.yandex.ru/2.1/?lang=ru_RU',
        'js/admin.js',
        'js/tinymce/tinymce.min.js',
        'js/admintiny.js',
        'js/adminmedia.js',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
    ];
}