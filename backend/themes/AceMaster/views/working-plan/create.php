<?php

use yii\helpers\Html;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $model backend\models\WorkingPlan */
/* @var $legends backend\models\Codeset */

$this->title = sprintf('%s %s %s', AppLabels::BTN_ADD, AppLabels::WORKING_PLAN, $title);
$this->params['breadcrumbs'][] = ['label' => sprintf('%s %s', AppLabels::WORKING_PLAN, $title), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="working-plan-create">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    
    <?= $this->render('_form', [
        'model' => $model,
        'legends' => $legends
    ]) ?>

</div>
