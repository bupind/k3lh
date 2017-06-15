<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 15/6/2017
 * Time: 10:50 AM
 */

namespace backend\assets;
use yii\web\AssetBundle;
use common\vendor\AppConstants;

class HqDetailAsset extends AssetBundle
{
    public $basePath = AppConstants::THEME_BASE_PATH;
    public $baseUrl = AppConstants::THEME_BASE_URL;
    public $css = [];
    public $js = [
        'js/stringbuilder.js',
        'js/action-view/hq_detail.js'
    ];
    public $depends = [
        'yii\web\JqueryAsset'
    ];
}