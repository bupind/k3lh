<?php
use yii\helpers\Html;

$this->title = $exception->statusCode == '404' ? 'Page not found' : 'Forbidden';
?>

<div class="error-container">
    <div class="well">
        <h1 class="grey lighter smaller">
            <span class="blue bigger-125">
                <i class="ace-icon fa <?= $exception->statusCode == '404' ? 'fa-sitemap' : 'fa-random'; ?>"></i>
                <?= $exception->statusCode; ?>
            </span>
            <?= $this->title; ?>
        </h1>

        <hr>
        <h3 class="lighter smaller"><?= $message . $exception->statusCode; ?></h3>

        <div>
            <div class="space"></div>
            <h4 class="smaller">Silahkan coba beberapa hal berikut:</h4>
            
            <ul class="list-unstyled spaced inline bigger-110 margin-15">
                <li>
                    <i class="ace-icon fa fa-hand-o-right blue"></i>
                    Periksa ulang url untuk kemungkinan terjadi kesalahan dalam pengetikan.
                </li>

                <li>
                    <i class="ace-icon fa fa-hand-o-right blue"></i>
                    Tanyakan tentang hak akses.
                </li>

                <li>
                    <i class="ace-icon fa fa-hand-o-right blue"></i>
                    Laporkan hal ini kepada kami.
                </li>
            </ul>
            
        </div>

        <hr>
        <div class="space"></div>

        <div class="center">
            <?= Html::a('<i class="ace-icon fa fa-tachometer"></i> Dashboard', ['/site'], ['class' => 'btn btn-primary']); ?>
        </div>
    </div>
</div>