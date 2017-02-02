<?php

use yii\helpers\Html;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $model backend\models\User */

$this->title = sprintf('%s %s', AppLabels::BTN_ADD, AppLabels::USER);
$this->params['breadcrumbs'][] = ['label' => AppLabels::USER, 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-create">
    
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    
    <?= $this->render('_form', [
        'model' => $model,
        'employeeMdl' => $employeeMdl
    ]) ?>

</div>
