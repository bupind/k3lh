<?php

use yii\helpers\Html;
use common\vendor\AppLabels;


/* @var $this yii\web\View */
/* @var $model backend\models\EnvironmentPermitDetail */
/* @var $epModel backend\models\EnvironmentPermit */

$this->title = sprintf('%s %s', AppLabels::BTN_ADD, AppLabels::DOCUMENT_VALIDATION);
$this->params['breadcrumbs'][] = ['label' => AppLabels::DOCUMENT_VALIDATION, 'url' => ['index', 'epId' => $epModel->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="environment-permit-detail-create">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
        'epModel' => $epModel,
    ]) ?>

</div>
