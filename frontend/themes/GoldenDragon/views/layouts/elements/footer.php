<?php
use yii\helpers\Html;

$webProfile = Yii::$app->params['web_profile'];
?>

<!-- begin footer -->
<div class="row bg-gold-2">
    <div class="col-xs-12">
        <div class="container">
            <div class="row footer-wrapper">
                <div class="col-xs-12">
                    <p>Agen Bola Tangkas | Judi Online | SBOBET Bola & Casino. Copyright © 2010 - 2014 <?= Html::a($webProfile->app_name, Yii::$app->homeUrl); ?> All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end footer -->