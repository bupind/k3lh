<?php

use yii\helpers\Html;
use common\vendor\AppLabels;


/* @var $this yii\web\View */
/* @var $model backend\models\HousekeepingImplementation */
/* @var $powerPlantModel backend\models\PowerPlant */
/* @var $questionList backend\models\HousekeepingQuestion[] */

$this->title = sprintf("%s %s", AppLabels::BTN_ADD,  AppLabels::FORM_HOUSEKEEPING_IMPLEMENTATION);
$this->params['breadcrumbs'][] = ['label' => sprintf("Form %s", AppLabels::FORM_HOUSEKEEPING_IMPLEMENTATION), 'url' => ['index', '_ppId' => $powerPlantModel->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="housekeeping-implementation-create">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
        'powerPlantModel' => $powerPlantModel,
        'questionList' => $questionList,
    ]) ?>

</div>
