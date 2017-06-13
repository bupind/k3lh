<?php

use yii\helpers\Html;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $model backend\models\HydrantQuestion */

$this->title = sprintf('%s %s %s', AppLabels::BTN_UPDATE, AppLabels::ITEM, AppLabels::HYDRANT);
$this->params['breadcrumbs'][] = ['label' => sprintf('%s %s', AppLabels::ITEM, AppLabels::HYDRANT), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = AppLabels::BTN_UPDATE;
?>
<div class="hydrant-question-update">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
