<?php

use yii\helpers\Html;
use app\components\DetailView;
use app\components\ViewButton;

/* @var $this yii\web\View */
/* @var $model backend\models\Employee */

$this->title = 'Lihat Karyawan';
$this->params['subtitle'] = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Karyawan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employee-view">

    <div class="page-header">
        <h1>
            <?= Html::encode($this->title) ?>
            <?php if (isset($this->params['subtitle'])): ?>
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                <?= $this->params['subtitle']; ?>
            </small>
            <?php endif; ?>
        </h1>        
    </div>
    
    <?= DetailView::widget(['model' => $model, 'options' => ['converter' => ['status' => common\vendor\AppConstants::FORMAT_TYPE_YES_NO]]]); ?>
    <?= ViewButton::widget(['model' => $model]); ?>
    
</div>