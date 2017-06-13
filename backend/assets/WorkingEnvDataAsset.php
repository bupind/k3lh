<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 13/6/2017
 * Time: 2:41 PM
 */

namespace backend\assets;
use yii\web\AssetBundle;
use common\vendor\AppConstants;

class WorkingEnvDataAsset extends AssetBundle
{
    public $basePath = AppConstants::THEME_BASE_PATH;
    public $baseUrl = AppConstants::THEME_BASE_URL;
    public $css = [];
    public $js = [
        'js/stringbuilder.js',
        'js/action-view/working_env_data.js'
    ];
    public $depends = [
        'yii\web\JqueryAsset'
    ];
}