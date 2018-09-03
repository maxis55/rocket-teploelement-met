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

    public $css = [
        'admin_assets/bower_components/bootstrap/dist/css/bootstrap.min.css',
        'admin_assets/bower_components/font-awesome/css/font-awesome.min.css',
        'admin_assets/bower_components/Ionicons/css/ionicons.min.css',
        'admin_assets/dist/css/AdminLTE.min.css',
        'admin_assets/dist/css/skins/_all-skins.min.css',
        'admin_assets/bower_components/morris.js/morris.css',
        'admin_assets/bower_components/jvectormap/jquery-jvectormap.css',
        'admin_assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css',
        'admin_assets/bower_components/bootstrap-daterangepicker/daterangepicker.css',
        'admin_assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css',
        'https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic',
    ];
    public $js = [
        'admin_assets/bower_components/jquery/dist/jquery.min.js',
        'admin_assets/bower_components/jquery-ui/jquery-ui.min.js',
        'admin_assets/bower_components/bootstrap/dist/js/bootstrap.min.js',
        'admin_assets/bower_components/raphael/raphael.min.js',
        'admin_assets/bower_components/morris.js/morris.min.js',
        'admin_assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js',
        'admin_assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js',
        'admin_assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
        'admin_assets/bower_components/jquery-knob/dist/jquery.knob.min.js',
        'admin_assets/bower_components/moment/min/moment.min.js',
        'admin_assets/bower_components/bootstrap-daterangepicker/daterangepicker.js',
        'admin_assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js',
        'admin_assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js',
        'admin_assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js',
        'admin_assets/bower_components/fastclick/lib/fastclick.js',
        'admin_assets/dist/js/adminlte.min.js',
        'admin_assets/dist/js/pages/dashboard.js',
        'admin_assets/dist/js/demo.js',
        'admin_assets/tinymce/tinymce.min.js',
        'admin_assets/js/admintiny.js',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
        'yii\web\YiiAsset',
    ];
}