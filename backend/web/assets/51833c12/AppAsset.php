<?php

/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace backend\assets;

use yii\web\AssetBundle;
use common\vendor\AppConstants;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle {

    public $basePath = AppConstants::THEME_BASE_PATH;
    public $baseUrl = AppConstants::THEME_BASE_URL;
    public $css = [
        'css/bootstrap.min.css',
        'font-awesome/4.6.3/css/font-awesome.min.css',
        'css/jquery-ui.custom.min.css',
        'css/datepicker.min.css',
        'css/jquery.gritter.min.css',
        'css/chosen.min.css',
        'fonts/fonts.googleapis.com.css',
        'css/ace.min.css',
        'css/ace-rtl.min.css',
        'css/site.css'
    ];
    public $js = [
        'js/bootstrap.min.js',
        'js/jquery-ui.custom.min.js',
        'js/jquery.ui.touch-punch.min.js',
        'js/bootstrap-datepicker.min.js',
        'js/jquery.gritter.min.js',
        'js/chosen.jquery.min.js',
        'js/numeral.min.js',
        'js/jquery-calx-2.2.6.min.js',
        'js/site.js',
        'js/ace-elements.min.js',
        'js/ace.min.js',        
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\web\JqueryAsset'
    ];

}
