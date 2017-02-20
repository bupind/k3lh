<?php

use yii\helpers\Html;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $model backend\models\PpaReportBm */
/* @var $ppaModel \backend\models\Ppa */
/* @var $startDate DateTime */
/* @var $ppaInletModels \backend\models\PpaInletOutlet[] */
/* @var $ppaOutletModels \backend\models\PpaInletOutlet[] */

$this->title = sprintf('%s %s', AppLabels::BTN_ADD, AppLabels::BM_REPORT_PARAMETER);
$this->params['breadcrumbs'][] = ['label' => sprintf('%s - %s', AppLabels::PPA, $ppaModel->getSummary()), 'url' => ['/ppa/update', 'id' => $ppaModel->id]];
$this->params['breadcrumbs'][] = ['label' => AppLabels::BM_REPORT_PARAMETER, 'url' => ['index', 'ppaId' => $ppaModel->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ppa-report-bm-create">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    
    <?= $this->render('_form', [
        'model' => $model,
        'ppaModel' => $ppaModel,
        'startDate' => $startDate,
        'ppaInletModels' => $ppaInletModels,
        'ppaOutletModels' => $ppaOutletModels
    ]) ?>

</div>
