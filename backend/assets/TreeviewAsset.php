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
class TreeviewAsset extends AssetBundle {

    public $basePath = AppConstants::THEME_BASE_PATH;
    public $baseUrl = AppConstants::THEME_BASE_URL;
    public $css = [];
    public $js = [
        'js/fuelux.tree.min.js',
        'js/action-view/treeview.js'
    ];
    public $depends = [
        'yii\web\JqueryAsset'
    ];

}
