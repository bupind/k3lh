<?php

use yii\helpers\Html;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $model backend\models\Smk3Title */

$this->title = sprintf("%s %s", AppLabels::BTN_UPDATE, AppLabels::SMK3_TITLE);
$this->params['breadcrumbs'][] = ['label' => AppLabels::SMK3_TITLE, 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->sttl_title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = AppLabels::BTN_UPDATE;
?>
<div class="smk3-title-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
