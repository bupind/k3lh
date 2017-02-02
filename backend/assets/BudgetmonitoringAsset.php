<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 21/1/2017
 * Time: 9:28 PM
 */

namespace backend\assets;


use yii\web\AssetBundle;
use common\vendor\AppConstants;

class BudgetmonitoringAsset extends AssetBundle
{
    public $basePath = AppConstants::THEME_BASE_PATH;
    public $baseUrl = AppConstants::THEME_BASE_URL;
    public $css = [];
    public $js = [
        'js/stringbuilder.js',
        'js/action-view/budget_monitor.js'
    ];
    public $depends = [
        'yii\web\JqueryAsset'
    ];
}