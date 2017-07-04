<?php

use yii\helpers\Html;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $model backend\models\EnvironmentPermitReport */
/* @var $epModel backend\models\EnvironmentPermit */
/* @var $districtModel backend\models\EnvironmentPermitDistrict[] */
/* @var $provinceModel backend\models\EnvironmentPermitProvince[] */
/* @var $ministryModel backend\models\EnvironmentPermitMinistry[] */

$this->title = sprintf("%s %s", AppLabels::BTN_UPDATE, AppLabels::REPORTING);
$this->params['breadcrumbs'][] = ['label' => AppLabels::ENVIRONMENT_PERMIT, 'url' => ['index', 'epId' => $epModel->id]];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="environment-permit-report-update">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
        'epModel' => $epModel,
        'districtModel' => $districtModel,
        'provinceModel' => $provinceModel,
        'ministryModel' => $ministryModel,
    ]) ?>

</div>
