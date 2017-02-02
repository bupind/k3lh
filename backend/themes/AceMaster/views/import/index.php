<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\assets\ImportAsset;

ImportAsset::register($this);

/* @var $this yii\web\View */
/* @var $searchModel backend\models\GameSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Import File';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="import-form">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <div class="col-xs-12">
        <?php 
            $form = ActiveForm::begin([
                'options' => [
                    'class' => 'form-horizontal',
                    'role' => 'form',
                    'enctype' => 'multipart/form-data'
                ]
            ]);
            
            echo $form->field($model, 'excel_files[]', ['template' => '<div class="col-sm-12">{input}<span class="help-inline col-xs-12 col-sm-7"><span class="middle">{error}{hint}</span></span></div>'])
                ->fileInput(['multiple' => true, 'class' => 'file-input-multiple', 'accept' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'])
                ->label(false);
        ?>
        
        <div class="clearfix form-actions">
            <div class="col-md-12 text-center">
                <?= Html::submitButton('<i class="ace-icon fa fa-upload bigger-110"></i> Upload & Import', ['data-confirm' => 'Apakah Anda yakin data sudah benar?', 'class' => 'btn btn-success']); ?>
            </div>
        </div>
        
        <?php ActiveForm::end(); ?>
    </div>
</div>
