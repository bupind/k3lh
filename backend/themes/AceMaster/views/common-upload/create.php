<?php

use yii\helpers\Html;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $model backend\models\CommonUpload */
/* @var $powerPlantModel \backend\models\PowerPlant */
/* @var $codesetModel \backend\models\Codeset */

$this->title = sprintf('%s %s %s', AppLabels::BTN_ADD, AppLabels::UPLOAD, $codesetModel->cset_value);
$this->params['breadcrumbs'][] = ['label' => sprintf('%s %s - %s', AppLabels::UPLOAD, $codesetModel->cset_value, $powerPlantModel->getSummary()), 'url' => ['/common-upload/index', 'utc' => $codesetModel->cset_code, '_ppId' => $powerPlantModel->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="common-upload-create">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    
    <?= $this->render('_form', [
        'model' => $model,
        'powerPlantModel' => $powerPlantModel,
        'codesetModel' => $codesetModel
    ]) ?>

</div>
