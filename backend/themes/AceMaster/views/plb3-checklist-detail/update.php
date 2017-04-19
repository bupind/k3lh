<?php

use yii\helpers\Html;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $model backend\models\Plb3ChecklistDetail */
/* @var $questionGroups backend\models\Codeset[] */
/* @var $answerModels backend\models\Plb3ChecklistAnswer[] */
/* @var $plb3c_model backend\models\Plb3Checklist */
/* @var $pct string */
/* @var $question backend\models\Plb3Question */

$this->title = sprintf('%s %s %s', AppLabels::BTN_UPDATE, AppLabels::CHECKLIST, $title);
$this->params['breadcrumbs'][] = ['label' => sprintf('%s %s', AppLabels::CHECKLIST, $title), 'url' => ['index', 'plb3cId' => $plb3c_model->id, 'pct' => $pct]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="plb3-checklist-detail-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'questionGroups' => $questionGroups,
        'answerModels' => $answerModels,
        'plb3c_model' => $plb3c_model,
        'pct' => $pct,
        'question' => $question,
    ]) ?>

</div>
