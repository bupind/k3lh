<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 19/4/2017
 * Time: 3:46 PM
 */

namespace backend\assets;

use yii\web\AssetBundle;
use common\vendor\AppConstants;

class Plb3QuestionAsset extends AssetBundle
{
    public $basePath = AppConstants::THEME_BASE_PATH;
    public $baseUrl = AppConstants::THEME_BASE_URL;
    public $css = [];
    public $js = [
        'js/stringbuilder.js',
        'js/action-view/plb3Question.js'
    ];
    public $depends = [
        'yii\web\JqueryAsset'
    ];
}