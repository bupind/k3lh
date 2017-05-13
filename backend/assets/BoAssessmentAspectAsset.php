<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 10/5/2017
 * Time: 1:55 AM
 */

namespace backend\assets;

use yii\web\AssetBundle;
use common\vendor\AppConstants;


class BoAssessmentAspectAsset extends AssetBundle
{
    public $basePath = AppConstants::THEME_BASE_PATH;
    public $baseUrl = AppConstants::THEME_BASE_URL;
    public $css = [];
    public $js = [
        'js/stringbuilder.js',
        'js/action-view/bo_assessment_aspect.js'
    ];
    public $depends = [
        'yii\web\JqueryAsset'
    ];
}