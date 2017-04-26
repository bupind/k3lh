<?php

use yii\helpers\Html;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $model backend\models\EnvironmentPermitDetail */
/* @var $epModel backend\models\EnvironmentPermit */

$this->title = sprintf("%s %s", AppLabels::BTN_UPDATE, AppLabels::ENVIRONMENT_PERMIT);
$this->params['breadcrumbs'][] = ['label' => 'Environment Permits', 'url' => ['index', 'epId' => $epModel->id]];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="environment-permit-update">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
        'epModel' => $epModel,
    ]) ?>

</div>
