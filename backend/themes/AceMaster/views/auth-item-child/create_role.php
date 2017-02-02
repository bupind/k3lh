<?php

use yii\helpers\Html;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $model backend\models\AuthItemChild */

$this->title = sprintf('%s %s', AppLabels::BTN_ADD, AppLabels::ROLE);
$this->params['breadcrumbs'][] = ['label' => AppLabels::ROLE, 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-item-child-create">
    
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <?= $this->render('_form_role', [
        'model' => $model,
    ]) ?>

</div>
