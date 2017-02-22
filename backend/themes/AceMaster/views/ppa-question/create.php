<?php

use yii\helpers\Html;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $model backend\models\PpaQuestion */

$this->title = sprintf('%s %s %s', AppLabels::BTN_ADD, AppLabels::QUESTION, AppLabels::TECHNICAL_PROVISION);
$this->params['breadcrumbs'][] = ['label' => sprintf('%s %s', AppLabels::QUESTION, AppLabels::TECHNICAL_PROVISION), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ppa-question-create">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
