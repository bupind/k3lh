<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 5/6/2017
 * Time: 11:18 AM
 */

namespace backend\assets;

use yii\web\AssetBundle;
use common\vendor\AppConstants;

class BeyondObedienceComdevAsset extends AssetBundle
{
    public $basePath = AppConstants::THEME_BASE_PATH;
    public $baseUrl = AppConstants::THEME_BASE_URL;
    public $css = [];
    public $js = [
        'js/stringbuilder.js',
        'js/action-view/beyond_obedience_comdev.js'
    ];
    public $depends = [
        'yii\web\JqueryAsset'
    ];
}