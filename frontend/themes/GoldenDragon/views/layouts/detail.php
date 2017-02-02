<?php

/* @var $this \yii\web\View */
/* @var $content string */

use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<?= $this->render('elements/head'); ?>
<body>
<?php $this->beginBody() ?>

<div class="container-fluid header-wrapper">
    <?= $this->render('elements/header'); ?>
    <!-- PAGE CONTENT BEGINS -->
    <div class="row margin-bottom-30">
        <div class="col-xs-12 col-md-3">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-lg-12 widget">
                    <h4 class="widget-title">Layanan Pelanggan 24/7 Online!</h4>
                    <div class="widget-body">
                        <?= $this->render('elements/_blocks', ['show' => 'support']); ?>
                    </div>
                </div>
    
                <div class="col-xs-12 col-sm-6 col-lg-12 widget">
                    <h4 class="widget-title">Jadwal Bank Offline</h4>
                    <div class="widget-body">
                        <?= $this->render('elements/_blocks', ['show' => 'bank-schedule']); ?>
                    </div>
                </div>
    
                <div class="col-xs-12 col-sm-6 col-lg-12 widget">
                    <h4 class="widget-title">Info Menarik Lainnya</h4>
                    <div class="widget-body">
                        <?= $this->render('elements/_blocks', ['show' => 'other-info']); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-md-6 post-2">
            <div class="row">
                <div class="col-xs-12">
                    <?= Alert::widget(); ?>
                </div>
            </div>
            
            <?= $content; ?>
        </div>
        <div class="col-xs-12 col-md-3">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-lg-12 widget">
                    <h4 class="widget-title">Form Pendaftaran</h4>
                    <div class="widget-body">
                        <?= $this->render('elements/reg_form'); ?>
                    </div>
                </div>
    
                <div class="col-xs-12 col-sm-6 col-lg-12 widget">
                    <h4 class="widget-title">Bonus</h4>
                    <div class="widget-body">
                        <?= $this->render('elements/_blocks', ['show' => 'bonus']); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- PAGE CONTENT ENDS -->
    
    <?= $this->render('elements/footer'); ?>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
