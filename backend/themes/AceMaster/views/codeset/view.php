<?php

use yii\helpers\Html;
use app\components\DetailView;
use app\components\ViewButton;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $model backend\models\Codeset */

$this->title = sprintf('%s %s', AppLabels::BTN_VIEW, AppLabels::CODESET);
$this->params['subtitle'] = sprintf('%s - %s', $model->cset_code, $model->cset_value);
$this->params['breadcrumbs'][] = ['label' => AppLabels::CODESET, 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="codeset-view">

    <div class="page-header">
        <h1>
            <?= Html::encode($this->title) ?>
            <?php if (isset($this->params['subtitle'])): ?>
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                <?= $this->params['subtitle']; ?>
            </small>
            <?php endif; ?>
        </h1>        
    </div>
    
    <?= DetailView::widget(['model' => $model]); ?>
    <?= ViewButton::widget(['model' => $model]); ?>
    
</div>
