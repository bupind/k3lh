<?php

use app\components\DetailView;
use app\components\ViewButton;
use common\vendor\AppConstants;
use common\vendor\AppLabels;
use yii\helpers\Html;
use common\components\helpers\Converter;

/* @var $this yii\web\View */
/* @var $model backend\models\PpaSetupPermit */

$this->title = sprintf('%s %s', AppLabels::BTN_VIEW, AppLabels::SETUP_POINT_PERMIT);
$this->params['breadcrumbs'][] = ['label' => sprintf('%s - %s', AppLabels::PPA, $model->ppa->getSummary()), 'url' => ['/ppa/update', 'id' => $model->ppa->id]];
$this->params['breadcrumbs'][] = ['label' => AppLabels::SETUP_POINT_PERMIT, 'url' => ['index']];
$this->params['subtitle'] = $model->ppasp_wastewater_source;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ppa-setup-permit-view">

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
                'ppa_id' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->ppa->getSummary()],
                'ppasp_wastewater_tech_code' => [AppConstants::FORMAT_TYPE_VARIABLE, $model->ppasp_wastewater_tech_code_desc]
            ]
        ]
    ]); ?>
    
    <?= ViewButton::widget(['model' => $model]); ?>

</div>
