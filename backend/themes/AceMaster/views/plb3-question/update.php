<?php

use yii\helpers\Html;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $model backend\models\Plb3Question */
/* @var $questionTypeList string[] */

$this->title = sprintf('%s %s %s %s %s', AppLabels::BTN_UPDATE, AppLabels::QUESTION, AppLabels::CHECKLIST, AppLabels::WASTE, AppLabels::B3);
$this->params['breadcrumbs'][] = ['label' => sprintf('%s %s %s %s', AppLabels::QUESTION, AppLabels::CHECKLIST, AppLabels::WASTE, AppLabels::B3), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->plb3_question_type_code_desc, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = AppLabels::BTN_UPDATE;
?>
<div class="plb3-question-update">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
        'questionTypeList' => $questionTypeList,
    ]) ?>

</div>
