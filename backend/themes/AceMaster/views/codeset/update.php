<?php

use yii\helpers\Html;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $model backend\models\Codeset */

$this->title = sprintf('%s %s', AppLabels::BTN_UPDATE, AppLabels::CODESET);
$this->params['breadcrumbs'][] = ['label' => AppLabels::CODESET, 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cset_code, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = AppLabels::BTN_UPDATE;
?>
<div class="codeset-update">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
