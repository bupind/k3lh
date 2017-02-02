<?php

use yii\helpers\Html;
use app\components\DetailView;
use app\components\ViewButton;
use common\vendor\AppLabels;
use common\vendor\AppConstants;

/* @var $this yii\web\View */
/* @var $model backend\models\PowerPlant */

$this->title = sprintf('%s %s', AppLabels::BTN_VIEW, AppLabels::POWER_PLANT);
$this->params['subtitle'] = $model->pp_name;
$this->params['breadcrumbs'][] = ['label' => AppLabels::POWER_PLANT, 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="power-plant-view">
    
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
    
    <?= DetailView::widget([
        'model' => $model,
        'options' => [
            'converter' => [
                'sector_id' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->sector->sector_name]
            ]
        ]
    ]); ?>
    <?= ViewButton::widget(['model' => $model]); ?>

</div>
