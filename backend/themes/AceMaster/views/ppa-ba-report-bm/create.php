<?php

use yii\helpers\Html;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $model backend\models\PpaBaReportBm */
/* @var $ppaBaModel \backend\models\PpaBa */
/* @var $startDate DateTime */
/* @var $ppaBaConcentrationModels \backend\models\PpaBaConcentration[] */

$this->title = sprintf('%s %s', AppLabels::BTN_ADD, AppLabels::BM_REPORT_PARAMETER);
$this->params['breadcrumbs'][] = ['label' => sprintf('%s - %s', AppLabels::PPA_BA, $ppaBaModel->getSummary()), 'url' => ['/ppa/update', 'id' => $ppaBaModel->id]];
$this->params['breadcrumbs'][] = ['label' => AppLabels::BM_REPORT_PARAMETER, 'url' => ['index', 'ppaBaId' => $ppaBaModel->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ppa-ba-report-bm-create">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    
    <?= $this->render('_form', [
        'model' => $model,
        'ppaBaModel' => $ppaBaModel,
        'startDate' => $startDate,
        'ppaBaConcentrationModels' => $ppaBaConcentrationModels,
    ]) ?>

</div>
