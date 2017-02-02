<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use common\vendor\AppConstants;
use common\vendor\AppLabels;

$webProfile = Yii::$app->params['web_profile'];
$this->title = sprintf('%s %s', AppLabels::LOGIN, $webProfile->app_name);
?>

<div class="row">
    <div class="col-sm-10 col-sm-offset-1">
        <div class="login-container">
            <div class="center">
                <div class="space-12"></div>
                <?= Html::img(AppConstants::THEME_IMG_PATH . 'logo-pln.jpg', ['alt' => $webProfile->app_name]); ?>
            </div>

            <div class="space-6"></div>

            <div class="position-relative">
                <div id="login-box" class="login-box visible widget-box no-border">
                    <div class="widget-body">
                        <div class="widget-main">
                            <h4 class="header blue lighter bigger">
                                <i class="ace-icon fa fa-ticket green"></i>
                                <?= AppConstants::INFO_PLEASE_INPUT_ACCOUNT_CREDENTIAL; ?>
                            </h4>

                            <div class="space-6"></div>

                            <?php if ($model->hasErrors()): ?>
                            <div class="alert alert-danger">
                                <button data-dismiss="alert" class="close" type="button">
                                    <i class="ace-icon fa fa-times"></i>
                                </button>
                                <?= Html::error($model, 'password'); ?>
                            </div>
                            <?php endif; ?>
                            
                            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                            <fieldset>
                                <label class="block clearfix">
                                    <span class="block input-icon input-icon-right">
                                        <?= Html::activeTextInput($model, 'username', ['class' => 'form-control']) ?>
                                        <i class="ace-icon fa fa-user"></i>
                                    </span>
                                </label>
                                
                                <label class="block clearfix">
                                    <span class="block input-icon input-icon-right">
                                        <?= Html::activePasswordInput($model, 'password', ['class' => 'form-control']) ?>
                                        <i class="ace-icon fa fa-lock"></i>
                                    </span>
                                </label>
                                
                                <div class="space"></div>

                                <div class="clearfix">
                                    <button type="submit" class="width-35 pull-right btn btn-sm btn-primary">
                                        <i class="ace-icon fa fa-key"></i>
                                        <span class="bigger-110"><?= AppLabels::LOGIN; ?></span>
                                    </button>
                                </div>

                                <div class="space-4"></div>
                            </fieldset>
                            <?php ActiveForm::end(); ?>
                        </div><!-- /.widget-main -->
                    </div><!-- /.widget-body -->
                </div><!-- /.login-box -->
            </div><!-- /.position-relative -->
        </div>
    </div><!-- /.col -->
</div><!-- /.row -->