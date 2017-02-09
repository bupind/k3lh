<?php

use yii\helpers\Html;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $model backend\models\MaturityLevelQuestion */
/* @var $maturityLevelTitleMdl backend\models\MaturityLevelTitle */

$this->title = sprintf('%s %s %s', AppLabels::BTN_UPDATE, AppLabels::QUESTION, AppLabels::MATURITY_LEVEL);
$this->params['breadcrumbs'][] = ['label' => sprintf('%s %s', AppLabels::QUESTION, AppLabels::MATURITY_LEVEL), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->maturityLevelTitle->title_text, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = AppLabels::BTN_UPDATE;
?>
<div class="maturity-level-question-update">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    
    <?= $this->render('_form', [
        'model' => $model,
        'maturityLevelTitleMdl' => $maturityLevelTitleMdl
    ]) ?>

</div>
