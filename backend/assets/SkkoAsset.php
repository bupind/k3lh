<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 24/4/2017
 * Time: 4:59 PM
 */

namespace backend\assets;


use yii\web\AssetBundle;
use common\vendor\AppConstants;

class SkkoAsset extends AssetBundle
{
    public $basePath = AppConstants::THEME_BASE_PATH;
    public $baseUrl = AppConstants::THEME_BASE_URL;
    public $css = [];
    public $js = [
        'js/stringbuilder.js',
        'js/action-view/skko.js'
    ];
    public $depends = [
        'yii\web\JqueryAsset'
    ];
}