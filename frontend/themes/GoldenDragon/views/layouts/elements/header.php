<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use common\vendor\AppConstants;
?>

<?= $this->render('popup'); ?>

<!-- begin header -->
<div class="row">
    <!-- visible for dekstop > 1200px -->
    <div class="col-xs-12 visible-lg bg-gradient-maroon">
        <div class="container">
            <div class="row main-menu-wrapper">
                <div class="col-xs-12 col-sm-4">
                    <ul class="main-menu-list list list-inline list-unstyled text-right">
                        <li><?= Html::a('home', Yii::$app->homeUrl); ?></li>
                        <li><?= Html::a('bonus', ['/bonus']); ?></li>
                        <li><?= Html::a('produk', ['/produk']); ?></li>
                        <li><?= Html::a('jadwal', ['/jadwal-pertandingan-bola']); ?></li>
                    </ul>
                </div>
                
                <div class="col-xs-12 col-sm-4">
                    <?= Html::a(Html::img(AppConstants::FRONTEND_THEME_IMG_PATH . 'logo.png', ['class' => 'logo ' . AppConstants::IMG_RESPONSIVE]), Yii::$app->homeUrl, ['alt' => 'Naga188', 'title' => 'Naga188']); ?>
                </div>
                
                <div class="col-xs-12 col-sm-4">
                    <ul class="main-menu-list list list-inline list-unstyled">
                        <li><?= Html::a('deposit', ['/deposit']); ?></li>
                        <li><?= Html::a('penarikan', ['/penarikan']); ?></li>
                        <li><?= Html::a('transfer game', ['/transfer-game']); ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    <!-- visible for < 1200px -->
    <div class="col-xs-12 hidden-lg bg-gradient-maroon">
        <div class="container">
            <div class="row main-menu-wrapper">
                <div class="col-xs-12">
                    <?php
                    NavBar::begin([
                        'brandLabel' => Html::img(AppConstants::FRONTEND_THEME_IMG_PATH . 'logo.png', ['class' => 'logo ' . AppConstants::IMG_RESPONSIVE]),
                        'brandUrl' => Yii::$app->homeUrl,
                        'options' => [
                            'class' => 'navbar-inverse1 golden-navbar',
                        ],
                    ]);
                    $menuItems = [
                        ['label' => 'Home', 'url' => Yii::$app->homeUrl],
                        ['label' => 'Bonus', 'url' => ['/bonus']],
                        ['label' => 'Produk', 'url' => ['/produk']],
                        ['label' => 'Jadwal', 'url' => ['/jadwal-pertandingan-bola']],
                        ['label' => 'Deposit', 'url' => ['/deposit']],
                        ['label' => 'Withdraw', 'url' => ['/penarikan']],
                        ['label' => 'Transfer Game', 'url' => ['/transfer-game']],
                    ];
                    
                    echo Nav::widget([
                        'options' => ['class' => 'navbar-nav navbar-right'],
                        'items' => $menuItems,
                    ]);
                    NavBar::end();
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end header -->