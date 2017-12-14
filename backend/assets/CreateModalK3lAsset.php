<?php
/**
 * Created by PhpStorm.
 * User: User
 * Author: Joshua Saputra
 * Date: 13/12/2017
 * Time: 4:51 PM
 */

namespace backend\assets;
use common\vendor\AppConstants;
use yii\web\AssetBundle;

class CreateModalK3LAsset extends AssetBundle
{
    public $basePath = AppConstants::THEME_BASE_PATH;
    public $baseUrl = AppConstants::THEME_BASE_URL;
    public $css = [];
    public $js = [
        'js/action-view/createModalK3l.js',
        'js/stringbuilder.js'
    ];
    public $depends = [
        'yii\web\JqueryAsset'
    ];
}