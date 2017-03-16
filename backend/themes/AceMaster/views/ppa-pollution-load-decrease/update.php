<?php

use yii\helpers\Html;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $model backend\models\PpaPollutionLoadDecrease */
/* @var $ppaModel \backend\models\Ppa */
/* @var $startYear DateTime */
/* @var $ppaLDYearModels \backend\models\PpaPollutionLoadDecreaseYear[] */

$this->title = sprintf('%s %s', AppLabels::BTN_UPDATE, AppLabels::POLLUTION_LOAD_DECREASE);
$this->params['breadcrumbs'][] = ['label' => sprintf('%s - %s', AppLabels::PPA, $ppaModel->getSummary()), 'url' => ['/ppa/update', 'id' => $ppaModel->id]];
$this->params['breadcrumbs'][] = ['label' => AppLabels::POLLUTION_LOAD_DECREASE, 'url' => ['index', 'ppaId' => $ppaModel->id]];
$this->params['breadcrumbs'][] = ['label' => $model->ppapld_activity, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = AppLabels::BTN_UPDATE;
?>
<div class="ppa-pollution-load-decrease-update">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
        'ppaModel' => $ppaModel,
        'startYear' => $startYear,
        'ppaLDYearModels' => $ppaLDYearModels
    ]) ?>

</div>
