<?php

use yii\helpers\Html;
use common\vendor\AppLabels;


/* @var $this yii\web\View */
/* @var $model backend\models\BeyondObedienceProgram */
/* @var $bopt string */
/* @var $powerPlantModel backend\models\PowerPlant */
/* @var $title string */
/* @var $detailModels backend\models\BopDetail[] */

$this->title = sprintf("%s %s %s", AppLabels::BTN_ADD, AppLabels::PROGRAM, $title);
$this->params['breadcrumbs'][] = ['label' => $title, 'url' => ['index', 'bopt' => $bopt, '_ppId' => $powerPlantModel->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="beyond-obedience-program-create">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
        'detailModels' => $detailModels,
        'bopt' => $bopt,
        'title' => $title,
        'powerPlantModel' => $powerPlantModel,
    ]) ?>

</div>
