<?php

use yii\helpers\Html;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $model backend\models\PpaTechnicalProvision */
/* @var $startDate DateTime */
/* @var $ppaModel \backend\models\Ppa */
/* @var $ppaTechProvDetailModels \backend\models\PpaTechnicalProvisionDetail[] */
/* @var $questionGroups \backend\models\Codeset[] */

$this->title = sprintf('%s %s', AppLabels::BTN_ADD, AppLabels::TECHNICAL_PROVISION);
$this->params['breadcrumbs'][] = ['label' => sprintf('%s - %s', AppLabels::PPA, $ppaModel->getSummary()), 'url' => ['/ppa/update', 'id' => $ppaModel->id]];
$this->params['breadcrumbs'][] = ['label' => AppLabels::TECHNICAL_PROVISION, 'url' => ['index', 'ppaId' => $ppaModel->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ppa-technical-provision-create">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
        'startDate' => $startDate,
        'ppaModel' => $ppaModel,
        'ppaTechProvDetailModels' => $ppaTechProvDetailModels,
        'questionGroups' => $questionGroups
    ]) ?>

</div>
