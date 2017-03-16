<?php

use yii\helpers\Html;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $model backend\models\PpaReportBm */
/* @var $ppaModel \backend\models\Ppa */
/* @var $startDate DateTime */
/* @var $startDateOutlet DateTime */
/* @var $ppaInletOutletModels \backend\models\PpaInletOutlet[] */

$this->title = sprintf('%s %s', AppLabels::BTN_UPDATE, AppLabels::BM_REPORT_PARAMETER);
$this->params['breadcrumbs'][] = ['label' => sprintf('%s - %s', AppLabels::PPA, $ppaModel->getSummary()), 'url' => ['/ppa/update', 'id' => $ppaModel->id]];
$this->params['breadcrumbs'][] = ['label' => AppLabels::BM_REPORT_PARAMETER, 'url' => ['index', 'ppaId' => $ppaModel->id]];
$this->params['breadcrumbs'][] = ['label' => $model->ppar_param_code_desc, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = AppLabels::BTN_UPDATE;
?>
<div class="ppa-report-bm-update">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    
    <?= $this->render('_form', [
        'model' => $model,
        'ppaModel' => $ppaModel,
        'startDate' => $startDate,
        'startDateOutlet' => $startDateOutlet,
        'ppaInletOutletModels' => $ppaInletOutletModels,
    ]) ?>

</div>
