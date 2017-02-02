<?php 
use yii\helpers\Html;

$theme = $this->theme;
$baseUrl = $theme->getBaseUrl();

?>
<div class="navbar-buttons navbar-header pull-right" role="navigation">
    <ul class="nav ace-nav">
        <li class="light-blue">
            <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                <span class="user-info">
                    <small>Selamat Datang,</small>
                    <?= (Yii::$app->user->isGuest == false) ? Yii::$app->user->identity->getEmployee()->name : ''; ?>
                </span>

                <i class="ace-icon fa fa-caret-down"></i>
            </a>

            <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                <li><?= Html::a('<i class="ace-icon fa fa-user"></i> Profil', ['/user-profile/update', 'id' => Yii::$app->user->id]); ?></li>

                <li class="divider"></li>

                <li>
                    <?= Html::a('<i class="ace-icon fa fa-power-off"></i> Logout', ['site/logout'], ['data' => ['method' => 'post']]); ?>
                </li>
            </ul>
        </li>
    </ul>
</div>