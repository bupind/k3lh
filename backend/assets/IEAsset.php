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
class IEAsset extends AssetBundle {

    public $basePath = AppConstants::THEME_BASE_PATH;
    public $baseUrl = AppConstants::THEME_BASE_URL;
    public $css = [
        'css/ace-part2.min.css',
        'css/ace-ie.min.css'
    ];
    public $js = [
        'js/html5shiv.min.js',
        'js/respond.min.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
    public $cssOptions = ['condition' => 'lte IE9'];
    public $jsOptions = ['condition' => 'lte IE9'];

}
