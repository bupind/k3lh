<?php

use yii\helpers\Html;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $model backend\models\AuthAssignment */

$this->title = sprintf('%s %s', AppLabels::BTN_ADD, AppLabels::AUTH_ASSIGNMENT);
$this->params['breadcrumbs'][] = ['label' => AppLabels::AUTH_ASSIGNMENT, 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-assignment-create">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
