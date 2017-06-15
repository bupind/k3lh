<?php

use yii\helpers\Html;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $model backend\models\HousekeepingQuestion */
/* @var $detailModel backend\models\HqDetail[] */

$this->title = sprintf('%s %s %s', AppLabels::BTN_ADD, AppLabels::QUESTION, AppLabels::HOUSEKEEPING);
$this->params['breadcrumbs'][] = ['label' => sprintf('%s %s', AppLabels::QUESTION, AppLabels::HOUSEKEEPING), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="housekeeping-question-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'detailModel' => $detailModel,
    ]) ?>

</div>
