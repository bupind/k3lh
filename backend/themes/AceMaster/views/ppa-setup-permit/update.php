<?php

use yii\helpers\Html;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $model backend\models\PpaSetupPermit */
/* @var $ppaModel \backend\models\Ppa */
/* @var $startDate DateTime */
/* @var $ppaMonthModels \backend\models\PpaMonth[] */

$this->title = sprintf('%s %s', AppLabels::BTN_UPDATE, AppLabels::SETUP_POINT_PERMIT);
$this->params['breadcrumbs'][] = ['label' => sprintf('%s - %s', AppLabels::PPA, $ppaModel->getSummary()), 'url' => ['/ppa/update', 'id' => $ppaModel->id]];
$this->params['breadcrumbs'][] = ['label' => AppLabels::SETUP_POINT_PERMIT, 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ppasp_wastewater_source, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = AppLabels::BTN_UPDATE;
?>
<div class="ppa-setup-permit-update">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
        'ppaModel' => $ppaModel,
        'startDate' => $startDate,
        'ppaMonthModels' => $ppaMonthModels
    ]) ?>

</div>
