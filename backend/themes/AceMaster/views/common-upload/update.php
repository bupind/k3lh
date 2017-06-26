<?php

use yii\helpers\Html;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $model backend\models\CommonUpload */
/* @var $powerPlantModel \backend\models\PowerPlant */
/* @var $codesetModel \backend\models\Codeset */

$this->title = sprintf('%s %s %s', AppLabels::BTN_UPDATE, AppLabels::UPLOAD, $codesetModel->cset_value);
$this->params['breadcrumbs'][] = ['label' => sprintf('%s %s', AppLabels::UPLOAD, $codesetModel->cset_value), 'url' => ['index', 'utc' => $codesetModel->cset_code, '_ppId' => $model->power_plant_id]];
$this->params['breadcrumbs'][] = ['label' => $model->powerPlant->getSummary(), 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = AppLabels::BTN_UPDATE;
?>
<div class="common-upload-update">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    
    <?= $this->render('_form', [
        'model' => $model,
        'powerPlantModel' => $powerPlantModel,
        'codesetModel' => $codesetModel
    ]) ?>

</div>
