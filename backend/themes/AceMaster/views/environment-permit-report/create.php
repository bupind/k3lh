<?php

use yii\helpers\Html;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $model backend\models\EnvironmentPermitReport */
/* @var $epModel backend\models\EnvironmentPermit */
/* @var $districtModel backend\models\EnvironmentPermitDistrict[] */
/* @var $provinceModel backend\models\EnvironmentPermitProvince[] */
/* @var $ministryModel backend\models\EnvironmentPermitMinistry[] */

$this->title = sprintf('%s %s', AppLabels::BTN_ADD, AppLabels::REPORTING);
$this->params['breadcrumbs'][] = ['label' => AppLabels::REPORTING, 'url' => ['index', 'epId' => $epModel->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="environment-permit-report-create">

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
