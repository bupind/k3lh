<?php

use yii\helpers\Html;
use app\components\DetailView;
use common\vendor\AppLabels;
use common\vendor\AppConstants;
use backend\models\Codeset;

/* @var $this yii\web\View */
/* @var $model backend\models\PpuCompulsoryMonitoredEmissionSource */

$this->title = sprintf("%s %s", AppLabels::BTN_VIEW, $model->ppucmes_name);
$this->params['breadcrumbs'][] = ['label' => AppLabels::ADHERENCE_POINT, 'url' => ['index', 'ppuId' => $model->ppu_id]];
$this->params['breadcrumbs'][] = ['label' => $model->ppucmes_name];
?>
<div class="ppu-compulsory-monitored-emission-source-view">

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
            'excluded' => ['ppu_id'],
            'converter' => [
                'ppucmes_freq_monitoring_obligation_code' => [AppConstants::FORMAT_TYPE_VARIABLE, Codeset::getCodesetValue(AppConstants::CODESET_NAME_FREQ_MONITORING_OBLIGATION_CODE, $model->ppucmes_freq_monitoring_obligation_code)],
            ]
        ]
    ]); ?>

</div>
