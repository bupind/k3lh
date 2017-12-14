<?php

use yii\helpers\Html;
use common\vendor\AppLabels;


/* @var $this yii\web\View */
/* @var $model backend\models\MaturityLevelK3lTitle */

$this->title = sprintf('%s %s %s', AppLabels::BTN_UPDATE, AppLabels::TITLE, AppLabels::MATURITY_LEVEL_K3L);
$this->params['breadcrumbs'][] = ['label' => sprintf('%s %s', AppLabels::TITLE, AppLabels::MATURITY_LEVEL_K3L), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title_text, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = AppLabels::BTN_UPDATE;
?>
<div class="maturity-level-k3l-title-update">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
