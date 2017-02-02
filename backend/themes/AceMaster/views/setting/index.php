<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\components\SubmitButton;
use common\vendor\AppLabels;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CodesetSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = AppLabels::APPLICATION_SETTING;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="codeset-index">

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    
    <div class="col-xs-12">
        <?php $form = ActiveForm::begin([
            'options' => [
                'class' => 'form-horizontal',
                'role' => 'form'
            ]
        ]); ?>
                
        <?php foreach ($dataProvider->models as $index => $model): ?>
            <?= Html::activeHiddenInput($model, 'id', ['name' => sprintf('Codeset[%s][id]', $index), 'id' => sprintf('Codeset%sId', $index)]); ?>
            <?= 
                $form->field($model, sprintf('[%s]cset_value', $index), ['template' => '{label} <div class="col-sm-9">{input}<span class="help-inline col-xs-12 col-sm-7"><span class="middle">'. $model->cset_description .'</span></span>{hint}</div>'])
                ->textInput(['maxlength' => true, 'class' => 'col-xs-10 col-sm-5'])
                ->label($model->cset_code, ['class' => 'col-sm-3 control-label no-padding-right']);
            ?>
        <?php endforeach; ?>
        
        <?= SubmitButton::widget(['backAction' => 'index', 'isNewRecord' => $model->isNewRecord]); ?>

        <?php ActiveForm::end(); ?>
    </div>
    
</div>
