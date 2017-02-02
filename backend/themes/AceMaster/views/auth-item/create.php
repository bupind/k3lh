<?php

use yii\helpers\Html;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $model backend\models\AuthItem */

$this->title = sprintf('%s %s', AppLabels::BTN_ADD, AppLabels::AUTH_ITEM);
$this->params['breadcrumbs'][] = ['label' => AppLabels::AUTH_ITEM, 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-item-create">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
