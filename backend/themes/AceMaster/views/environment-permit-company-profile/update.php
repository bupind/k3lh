<?php

use yii\helpers\Html;
use common\vendor\AppLabels;
/* @var $this yii\web\View */
/* @var $model backend\models\EnvironmentPermitCompanyProfile */
/* @var $powerPlantModel backend\models\PowerPlant */

$this->title = sprintf("%s %s", AppLabels::BTN_UPDATE, AppLabels::COMPANY_PROFILE);
$this->params['breadcrumbs'][] = ['label' => sprintf("Form %s", AppLabels::COMPANY_PROFILE), 'url' => ['index', '_ppId' => $powerPlantModel->id]];
$this->params['breadcrumbs'][] = ['label' => $model->ep_profile_name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="environment-permit-company-profile-update">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
        'powerPlantModel' => $powerPlantModel,
    ]) ?>

</div>
