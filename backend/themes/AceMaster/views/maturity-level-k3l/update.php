<?php

use yii\helpers\Html;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $model backend\models\MaturityLevelK3l */
/* @var $detailModels backend\models\MaturityLevelK3lDetail[] */
/* @var $maturityLevelK3lTitles backend\models\MaturityLevelK3lTitle[] */
/* @var $powerPlantModel backend\models\PowerPlant */

$this->title = sprintf('%s %s', AppLabels::BTN_UPDATE, AppLabels::MATURITY_LEVEL_K3L);
$this->params['breadcrumbs'][] = ['label' => AppLabels::MATURITY_LEVEL_K3L, 'url' => ['index', '_ppId' => $model->power_plant_id]];
$this->params['breadcrumbs'][] = ['label' => sprintf('%s %s %s %s', AppLabels::QUARTER, $model->mlvl_quarter, AppLabels::YEAR, $model->mlvl_year), 'url' => ['view', 'id' => $model->id, '_ppId' => $model->power_plant_id]];
$this->params['breadcrumbs'][] = AppLabels::BTN_UPDATE;
?>
<div class="maturity-level-k3l-update">

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
