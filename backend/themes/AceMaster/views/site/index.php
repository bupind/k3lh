<?php
use yii\helpers\Html;
use yii\helpers\Url;
use common\vendor\AppLabels;
use common\vendor\AppConstants;
use backend\assets\TreeviewAsset;

TreeviewAsset::register($this);
$baseUrl = Url::base();

/* @var $this yii\web\View */
/* @var $user backend\models\User */

$this->title = 'Dashboard';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="site-index">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    
    <div class="row">
        
        <?php if (!is_null($user) && $user->isAdmin()): ?>
        <div class="col-xs-12 col-sm-6">
            <div class="widget-box widget-color-blue2">
                <div class="widget-header">
                    <h4 class="widget-title lighter smaller"><?= sprintf('%s %s', AppLabels::DOCUMENTS, AppLabels::MAIN_OFFICE); ?></h4>
                </div>
            
                <div class="widget-body">
                    <div class="widget-main padding-8">
                        <?= Html::hiddenInput('baseurl', $baseUrl, ['id' => 'baseurl']); ?>
                        <p id="spinner1"><i class="ace-icon fa fa-refresh fa-spin blue"></i> <?= AppConstants::INFO_DATA_FETCH; ?></p>
                        <ul id="tree-main-office"></ul>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
        
        <div class="col-xs-12 col-sm-6">
            <div class="widget-box widget-color-green">
                <div class="widget-header">
                    <h4 class="widget-title lighter smaller"><?= sprintf('%s %s', AppLabels::DOCUMENTS, AppLabels::SECTOR); ?></h4>
                </div>
        
                <div class="widget-body">
                    <div class="widget-main padding-8">
                        <?= Html::hiddenInput('baseurl', $baseUrl, ['id' => 'baseurl']); ?>
                        <p id="spinner2"><i class="ace-icon fa fa-refresh fa-spin blue"></i> <?= AppConstants::INFO_DATA_FETCH; ?></p>
                        <ul id="tree-sector"></ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
