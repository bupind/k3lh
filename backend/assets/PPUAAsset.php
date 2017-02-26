<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 26/2/2017
 * Time: 9:55 PM
 */

namespace backend\assets;


use yii\web\AssetBundle;
use common\vendor\AppConstants;

class PPUAAsset extends AssetBundle
{
    public $basePath = AppConstants::THEME_BASE_PATH;
    public $baseUrl = AppConstants::THEME_BASE_URL;
    public $css = [];
    public $js = [
        'js/action-view/ppua.js'
    ];
    public $depends = [
        'yii\web\JqueryAsset'
    ];
}