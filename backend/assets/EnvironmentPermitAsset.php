<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 11/2/2017
 * Time: 12:14 AM
 */

namespace backend\assets;

use yii\web\AssetBundle;
use common\vendor\AppConstants;

class EnvironmentPermitAsset extends AssetBundle
{
    public $basePath = AppConstants::THEME_BASE_PATH;
    public $baseUrl = AppConstants::THEME_BASE_URL;
    public $css = [];
    public $js = [
        'js/stringbuilder.js',
        'js/action-view/environment_permit.js'
    ];
    public $depends = [
        'yii\web\JqueryAsset'
    ];
}