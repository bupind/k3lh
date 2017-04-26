<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\EnvironmentPermitReport */
/* @var $epModel backend\models\EnvironmentPermit */
/* @var $districtModel backend\models\EnvironmentPermitDistrict[] */
/* @var $provinceModel backend\models\EnvironmentPermitProvince[] */
/* @var $ministryModel backend\models\EnvironmentPermitMinistry[] */

$this->title = 'Update Environment Permit Report: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Environment Permit Reports', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="environment-permit-report-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'epModel' => $epModel,
        'districtModel' => $districtModel,
        'provinceModel' => $provinceModel,
        'ministryModel' => $ministryModel,
    ]) ?>

</div>
