<?php

use yii\helpers\Html;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $model backend\models\MaturityLevel */
/* @var $detailModels backend\models\MaturityLevelDetail[] */
/* @var $maturityLevelTitles backend\models\MaturityLevelTitle[] */

$this->title = sprintf('%s %s', AppLabels::BTN_ADD, AppLabels::MATURITY_LEVEL);
$this->params['breadcrumbs'][] = ['label' => AppLabels::MATURITY_LEVEL, 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="maturity-level-create">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
        'detailModels' => $detailModels,
        'maturityLevelTitles' => $maturityLevelTitles
    ]) ?>

</div>
