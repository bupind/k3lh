<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use yii\web\AssetBundle;
use common\vendor\AppConstants;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle {
    public $basePath = AppConstants::FRONTEND_THEME_BASE_PATH;
    public $baseUrl = AppConstants::FRONTEND_THEME_BASE_URL;
    public $css = [
        'css/bootstrap.min.css',
        'font-awesome/4.6.3/css/font-awesome.min.css',
        'css/jquery-ui.min.css',
        'css/jquery-ui.custom.min.css',
        'css/jquery.bxslider.css',
        'css/spotlights.css',
        'css/site.css',
    ];
    public $js = [
        'js/bootstrap.min.js',
        'js/jquery-ui.min.js',
        'js/jquery-ui.custom.min.js',
        'js/jquery.bxslider.min.js',
        'js/site.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\web\JqueryAsset'
    ];
}
