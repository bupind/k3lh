<?php

use yii\helpers\Html;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $model backend\models\Ppu */

$this->title = sprintf('%s %s', AppLabels::BTN_ADD, AppLabels::AIR_POLLUTION_CONTROL);
$this->params['breadcrumbs'][] = ['label' => AppLabels::AIR_POLLUTION_CONTROL, 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ppu-create">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
