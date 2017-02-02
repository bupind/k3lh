<?php

use yii\helpers\Html;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $model backend\models\User */

$this->title = sprintf('%s %s', AppLabels::BTN_UPDATE, AppLabels::USER);
$this->params['breadcrumbs'][] = ['label' => AppLabels::USER, 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->username, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = AppLabels::BTN_UPDATE;
?>
<div class="user-update">
    
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    
    <?= $this->render('_form', [
        'model' => $model,
        'employeeMdl' => $employeeMdl
    ]) ?>

</div>
