<?php

use yii\helpers\Html;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $model backend\models\Plb3SaQuestion */

$this->title = sprintf('%s %s %s %s', AppLabels::BTN_ADD, AppLabels::QUESTION, AppLabels::PLB3, AppLabels::SELF_ASSESSMENT_SHORT);
$this->params['breadcrumbs'][] = ['label' => sprintf('%s %s %s', AppLabels::QUESTION, AppLabels::PLB3, AppLabels::SELF_ASSESSMENT_SHORT), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="plb3-sa-question-create">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
