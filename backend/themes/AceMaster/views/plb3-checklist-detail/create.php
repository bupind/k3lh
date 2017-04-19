<?php

use yii\helpers\Html;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $model backend\models\Plb3ChecklistDetail */
/* @var $plb3c_model backend\models\Plb3Checklist */
/* @var $pct string */
/* @var $questionGroups backend\models\Codeset[] */
/* @var $answerModels backend\models\Plb3ChecklistAnswer[] */

$this->title = sprintf('%s %s %s', AppLabels::BTN_ADD, AppLabels::CHECKLIST, $title);
$this->params['breadcrumbs'][] = ['label' => sprintf('%s %s', AppLabels::CHECKLIST, $title), 'url' => ['index', 'plb3cId' => $plb3c_model->id, 'pct' => $pct]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="plb3-checklist-detail-create">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
        'plb3c_model' => $plb3c_model,
        'pct' => $pct,
        'questionGroups' => $questionGroups,
        'answerModels' => $answerModels,
    ]) ?>

</div>
