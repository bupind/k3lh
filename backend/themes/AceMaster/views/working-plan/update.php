<?php

use yii\helpers\Html;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $model backend\models\WorkingPlan */

$this->title = sprintf('%s %s %s', AppLabels::BTN_UPDATE, AppLabels::WORKING_PLAN, $model->form_type_code_desc);
$this->params['breadcrumbs'][] = ['label' => sprintf('%s %s', AppLabels::WORKING_PLAN, $model->form_type_code_desc), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->sector->sector_name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = AppLabels::BTN_UPDATE;
?>
<div class="working-plan-update">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    
    <?= $this->render('_form', [
        'model' => $model,
        'legends' => $legends
    ]) ?>

</div>
