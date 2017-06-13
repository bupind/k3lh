<?php

use yii\helpers\Html;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $model backend\models\HydrantQuestion */

$this->title = sprintf('%s %s %s', AppLabels::BTN_ADD, AppLabels::ITEM, AppLabels::HYDRANT);
$this->params['breadcrumbs'][] = ['label' => sprintf('%s %s', AppLabels::ITEM, AppLabels::HYDRANT), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hydrant-question-create">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
