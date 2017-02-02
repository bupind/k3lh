<?php

use yii\helpers\Html;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $model backend\models\Profile */

$this->title = sprintf('%s %s', AppLabels::BTN_ADD, AppLabels::PROFILE);
$this->params['breadcrumbs'][] = ['label' => AppLabels::PROFILE, 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profile-create">
    
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
