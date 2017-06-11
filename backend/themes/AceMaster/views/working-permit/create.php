<?php

use yii\helpers\Html;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $model backend\models\WorkingPermit */
/* @var $powerPlantModel \backend\models\PowerPlant */

$this->title = sprintf('%s %s', AppLabels::BTN_ADD, AppLabels::FORM_WORKING_PERMIT);
$this->params['breadcrumbs'][] = ['label' => sprintf('%s - %s', AppLabels::FORM_WORKING_PERMIT, $powerPlantModel->getSummary()), 'url' => ['/working-permit/update', 'id' => $powerPlantModel->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="working-permit-create">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    
    <?= $this->render('_form', [
        'model' => $model,
        'powerPlantModel' => $powerPlantModel
    ]) ?>

</div>
