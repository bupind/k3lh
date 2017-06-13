<?php

use yii\helpers\Html;
use common\vendor\AppLabels;
/* @var $this yii\web\View */
/* @var $model backend\models\WorkingEnvData */
/* @var $detailModel backend\models\WevDetail[] */
/* @var $powerPlantModel backend\models\PowerPlant */

$this->title = sprintf("%s %s", AppLabels::BTN_UPDATE, AppLabels::FORM_WORK_ENV_DATA);
$this->params['breadcrumbs'][] = ['label' => sprintf("Form %s", AppLabels::FORM_WORK_ENV_DATA), 'url' => ['index', '_ppId' => $powerPlantModel->id]];
$this->params['breadcrumbs'][] = ['label' => $model->wed_work_area, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="working-env-data-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'powerPlantModel' => $powerPlantModel,
        'detailModel' => $detailModel,
    ]) ?>

</div>
