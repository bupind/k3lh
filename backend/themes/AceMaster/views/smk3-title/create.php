<?php

use yii\helpers\Html;
use common\vendor\AppLabels;


/* @var $this yii\web\View */
/* @var $model backend\models\Smk3Title */

$this->title = sprintf('%s %s', AppLabels::BTN_ADD, AppLabels::SMK3_TITLE);
$this->params['breadcrumbs'][] = ['label' => 'Smk3 Titles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="smk3-title-create">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
