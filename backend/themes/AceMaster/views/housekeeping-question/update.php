<?php

use yii\helpers\Html;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $model backend\models\HousekeepingQuestion */
/* @var $detailModel backend\models\HqDetail[] */

$this->title = sprintf('%s %s %s', AppLabels::BTN_UPDATE, AppLabels::QUESTION, AppLabels::HOUSEKEEPING);
$this->params['breadcrumbs'][] = ['label' => sprintf('%s %s', AppLabels::QUESTION, AppLabels::HOUSEKEEPING), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = AppLabels::BTN_UPDATE;
?>
<div class="housekeeping-question-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'detailModel' => $detailModel,
    ]) ?>

</div>
