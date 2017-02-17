<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 17/2/2017
 * Time: 5:12 PM
 */

namespace backend\assets;


use yii\web\AssetBundle;
use common\vendor\AppConstants;

class PpuAsset extends AssetBundle
{
    public $basePath = AppConstants::THEME_BASE_PATH;
    public $baseUrl = AppConstants::THEME_BASE_URL;
    public $css = [];
    public $js = [
        'js/action-view/ppu.js'
    ];
    public $depends = [
        'yii\web\JqueryAsset'
    ];
}