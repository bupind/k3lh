<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 4/2/2017
 * Time: 9:00 PM
 */

namespace backend\assets;
use yii\web\AssetBundle;
use common\vendor\AppConstants;

class Smk3TitleAsset extends AssetBundle
{
    public $basePath = AppConstants::THEME_BASE_PATH;
    public $baseUrl = AppConstants::THEME_BASE_URL;
    public $css = [];
    public $js = [
        'js/stringbuilder.js',
        'js/action-view/smk3-title.js'
    ];
    public $depends = [
        'yii\web\JqueryAsset'
    ];
}