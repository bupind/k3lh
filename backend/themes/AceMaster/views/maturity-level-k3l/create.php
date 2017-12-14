<?php

use yii\helpers\Html;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $model backend\models\MaturityLevelK3l */
/* @var $detailModels backend\models\MaturityLevelK3lDetail[] */
/* @var $maturityLevelK3lTitles backend\models\MaturityLevelK3lTitle[] */
/* @var $powerPlantModel backend\models\PowerPlant */

$this->title = sprintf('%s %s', AppLabels::BTN_ADD, AppLabels::MATURITY_LEVEL_K3L);
$this->params['breadcrumbs'][] = ['label' => AppLabels::MATURITY_LEVEL_K3L, 'url' => ['index', '_ppId' => $powerPlantModel->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="maturity-level-k3l-create">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
        'detailModels' => $detailModels,
        'maturityLevelK3lTitles' => $maturityLevelK3lTitles,
        'powerPlantModel' => $powerPlantModel,
    ]) ?>

</div>
