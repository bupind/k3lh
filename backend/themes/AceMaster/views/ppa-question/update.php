<?php

use yii\helpers\Html;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $model backend\models\PpaQuestion */

$this->title = sprintf('%s %s %s', AppLabels::BTN_UPDATE, AppLabels::QUESTION, AppLabels::TECHNICAL_PROVISION);
$this->params['breadcrumbs'][] = ['label' => sprintf('%s %s', AppLabels::QUESTION, AppLabels::TECHNICAL_PROVISION), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ppaq_question_type_code_desc, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = AppLabels::BTN_UPDATE;
?>
<div class="ppa-question-update">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
