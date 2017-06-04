<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 3/6/2017
 * Time: 2:08 PM
 */

namespace backend\assets;

use yii\web\AssetBundle;
use common\vendor\AppConstants;


class BeyondObedienceProgramAsset extends AssetBundle
{
    public $basePath = AppConstants::THEME_BASE_PATH;
    public $baseUrl = AppConstants::THEME_BASE_URL;
    public $css = [];
    public $js = [
        'js/stringbuilder.js',
        'js/action-view/beyond_obedience_program.js'
    ];
    public $depends = [
        'yii\web\JqueryAsset'
    ];
}