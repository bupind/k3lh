<?php

use yii\helpers\Html;
use common\vendor\AppLabels;


/* @var $this yii\web\View */
/* @var $model backend\models\Smk3Title */

$this->title = sprintf('%s %s', AppLabels::BTN_ADD, AppLabels::SMK3_TITLE);
$this->params['breadcrumbs'][] = ['label' => $model->sttl_title, 'url' => ['index']];
$this->params['breadcrumbs'][] =  sprintf('%s %s', AppLabels::BTN_ADD, AppLabels::SMK3);
?>
<div class="smk3-title-create">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
