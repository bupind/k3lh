<?php

use yii\helpers\Html;
use common\vendor\AppLabels;



/* @var $this yii\web\View */
/* @var $model backend\models\WorkAccident */
/* @var $powerPlantModel backend\models\PowerPlant */
/* @var $title string */
/* @var $wat string */

$this->title = sprintf("%s %s", AppLabels::BTN_ADD,  $title);
$this->params['breadcrumbs'][] = ['label' => sprintf("Form %s", $title), 'url' => ['index', '_ppId' => $powerPlantModel->id, 'wat' => $wat]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="work-accident-create">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
        'powerPlantModel' => $powerPlantModel,
        'title' => $title,
    ]) ?>

</div>
