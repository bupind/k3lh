<?php
use yii\helpers\Html;
use common\vendor\AppConstants;
?>
<!-- begin top content -->
<div class="row top-content-wrapper">
    <?= $this->render('_news_ticker'); ?>
    
    <div class="col-xs-12 no-gutter">
        <?= Html::img(AppConstants::FRONTEND_THEME_IMG_PATH . 'background.jpg', ['class' => 'big-background ' . AppConstants::IMG_RESPONSIVE]); ?>
        
        <div class="container">
            <div class="row">
                <div class="col-xs-12 visible-lg">
                    <div class="spotlight">
                        <div class="light-1">
                            <?= Html::img(AppConstants::FRONTEND_THEME_IMG_PATH . 'spotlight-short.png', ['class' => 'animation']); ?>
                        </div>
                        <div class="light-2">
                            <?= Html::img(AppConstants::FRONTEND_THEME_IMG_PATH . 'spotlight-short.png', ['class' => 'animation']); ?>
                        </div>
                    </div>
                    
                    <div class="thin-spotlight">
                        <div class="thin-light-1">
                            <?= Html::img(AppConstants::FRONTEND_THEME_IMG_PATH . 'spotlight-long.png', ['class' => 'animation']); ?>
                        </div>
                        <div class="thin-light-2">
                            <?= Html::img(AppConstants::FRONTEND_THEME_IMG_PATH . 'spotlight-long.png', ['class' => 'animation']); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-xs-12">
        <div class="row">
            <div class="top-block-wrapper">
                <div class="col-xs-12 col-md-2 col-md-offset-1 bg-transparent-dark-choco-95 tblock">
                    <div class="row">
                        <div class="col-sm-12 col-md-4 tblock-icobox">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="col-sm-12 col-md-8 tblock-databox">
                            <?= Html::a('Layanan Pelanggan 24/7 Online!', '#', ['class' => 'tblock-trigger', 'data-block-id' => 'support-block']) ?>
                        </div>
                    </div>
                    <div id="support-block" class="row tblock-content tblock-active">
                        <div class="col-xs-12 bg-transparent-dark-95">
                            <?= $this->render('_blocks', ['show' => 'support']); ?>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-2 bg-transparent-light-choco-95 tblock">
                    <div class="row">
                        <div class="col-sm-12 col-md-5 tblock-icobox">
                            <i class="fa fa-bank"></i>
                        </div>
                        <div class="col-sm-12 col-md-7 tblock-databox">
                            <?= Html::a('Jadwal Offline Bank', '#', ['class' => 'tblock-trigger', 'data-block-id' => 'bank-schedule-block']) ?>
                        </div>
                    </div>
                    <div id="bank-schedule-block" class="row tblock-content tblock-closed">
                        <div class="col-xs-12 bg-transparent-dark-95">
                            <?= $this->render('_blocks', ['show' => 'bank-schedule']); ?>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-2 bg-transparent-dark-95 tblock logo-small">
                    <div class="row">
                        <div class="col-xs-12">
                            <?= Html::a(Html::img(AppConstants::FRONTEND_THEME_IMG_PATH . 'logo-small.png', ['class' => AppConstants::IMG_RESPONSIVE]), '#', ['class' => 'tblock-trigger', 'data-block-id' => 'reg-form-block']); ?>
                        </div>
                    </div>
                    <div class="row tblock-content">
                        <div class="col-xs-12 bg-transparent-blue-95">
                            <h2 class="register-title"><?= Html::a('Klik Daftar Sekarang', '#', ['class' => 'tblock-trigger', 'data-block-id' => 'reg-form-block']) ?></h2>
                        </div>
                    </div>
                    <div id="reg-form-block" class="row tblock-content tblock-closed">
                        <div class="col-xs-12 bg-transparent-dark-95">
                            <h4 class="form-title">Segera Bergabung Bersama Kami</h4>
                            <?= $this->render('reg_form'); ?>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-2 bg-transparent-dark-choco-95 tblock">
                    <div class="row">
                        <div class="col-sm-12 col-md-5 tblock-icobox">
                            <i class="fa fa-money"></i>
                        </div>
                        <div class="col-sm-12 col-md-7 tblock-databox">
                            <?= Html::a('Dapatkan Bonus Menarik', '#', ['class' => 'tblock-trigger', 'data-block-id' => 'bonus-block']) ?>
                        </div>
                    </div>
                    <div id="bonus-block" class="row tblock-content tblock-closed">
                        <div class="col-xs-12 bg-transparent-dark-95">
                            <?= $this->render('_blocks', ['show' => 'bonus']); ?>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-2 bg-transparent-light-choco-95 tblock">
                    <div class="row">
                        <div class="col-sm-12 col-md-5 tblock-icobox">
                            <i class="fa fa-list"></i>
                        </div>
                        <div class="col-sm-12 col-md-7 tblock-databox">
                            <?= Html::a('Info Menarik Lainnya', '#', ['class' => 'tblock-trigger', 'data-block-id' => 'other-block']) ?>
                        </div>
                    </div>
                    <div id="other-block" class="row tblock-content tblock-closed">
                        <div class="col-xs-12 bg-transparent-dark-95">
                            <?= $this->render('_blocks', ['show' => 'other-info']); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end top content -->