<?php

use yii\helpers\Html;
use common\vendor\AppLabels;


/* @var $this yii\web\View */
/* @var $model backend\models\EnvironmentPermit */
/* @var $firstDetail backend\models\EnvironmentPermitDetail */
/* @var $powerPlantList [backend\models\PowerPlant] */

$this->title = sprintf("%s %s", AppLabels::BTN_ADD, AppLabels::ENVIRONMENT_PERMIT);
$this->params['breadcrumbs'][] = ['label' => AppLabels::ENVIRONMENT_PERMIT, 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="environment-permit-create">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <?= $this->render('_form', [
        'firstDetail' => $firstDetail,
        'powerPlantList' => $powerPlantList,
        'model' => $model,
    ]) ?>

</div>
