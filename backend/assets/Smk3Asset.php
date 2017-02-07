<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 7/2/2017
 * Time: 4:39 PM
 */

namespace backend\assets;

use yii\web\AssetBundle;
use common\vendor\AppConstants;

class Smk3Asset extends AssetBundle
{
    public $basePath = AppConstants::THEME_BASE_PATH;
    public $baseUrl = AppConstants::THEME_BASE_URL;
    public $css = [];
    public $js = [
        'js/stringbuilder.js',
        'js/action-view/smk3.js'
    ];
    public $depends = [
        'yii\web\JqueryAsset'
    ];
}