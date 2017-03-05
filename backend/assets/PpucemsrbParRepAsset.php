<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 4/3/2017
 * Time: 12:21 AM
 */

namespace backend\assets;


use yii\web\AssetBundle;
use common\vendor\AppConstants;

class PpucemsrbParRepAsset extends AssetBundle
{
    public $basePath = AppConstants::THEME_BASE_PATH;
    public $baseUrl = AppConstants::THEME_BASE_URL;
    public $css = [];
    public $js = [
        'js/stringbuilder.js',
        'js/action-view/ppucemsrbParRep.js'
    ];
    public $depends = [
        'yii\web\JqueryAsset'
    ];
}