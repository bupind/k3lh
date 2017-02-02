<?php
/**
 * langkah setup:
perameter
user
pricecategory
unit
brand
category
product
supplier
customer

 */
/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use backend\models\Parameter;
use yii\web\Session;

AppAsset::register($this);

## GET PARAMETERS, SAVE TO SESSION
$sesSetting = Yii::$app->session->get('setting');
if (empty($sesSetting)) {
    $parameter = Parameter::findOne(1);
    Yii::$app->session->set('setting', $parameter);
}
$parameter = Yii::$app->session->get('setting');
$brandName = empty($parameter->app_name) ? 'FillBlank' : $parameter->app_name;
//$brandName = common\components\helpers\AppConst::APP_NAME;
?>
<?php $this->beginPage() ?>

<?php $theme = $this->theme; ?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= $brandName ?> - <?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => $brandName,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-default navbar-static-top',
        ],
        'innerContainerOptions' => [
            'class' => 'container-fluid'
        ],
    ]);
    $menuItems = [
        ['label' => 'Master', 'items' => [
            ['label' => 'Akun', 'url' => ['/account/index']],
            ['label' => 'Grup Akun', 'url' => ['/account-group/index']],
            ['label' => 'Kategori Akun', 'url' => ['/account-category/index']],
            '<li class="divider"></li>',
            ['label' => 'Produk', 'url' => ['/product/index']],
            ['label' => 'Merk Produk', 'url' => ['/product-brand/index']],
            ['label' => 'Kategori Produk', 'url' => ['/product-category/index']],
            ['label' => 'Satuan', 'url' => ['/product-unit/index']],
            ['label' => 'Kategori Harga', 'url' => ['/price-category/index']],
            '<li class="divider"></li>',
            //['label' => 'Pajak', 'url' => ['/tax/index']],
            ['label' => 'Parameter', 'url' => ['/parameter/index']],
            ['label' => 'Printer', 'url' => ['/printer/index']],
            ['label' => 'User', 'url' => ['/user/index']],
        ]],
        ['label' => 'Partner', 'items' => [
            ['label' => 'Pelanggan', 'url' => ['/customer/index']],
            ['label' => 'Supplier', 'url' => ['/supplier/index']],
            ['label' => 'Karyawan', 'url' => ['/employee/index']],
            '<li class="divider"></li>',
            ['label' => 'Term of Payment', 'url' => ['/term-of-payment/index']],
            ['label' => 'Kota', 'url' => ['/city/index']],
            ['label' => 'Provinsi', 'url' => ['/province/index']],
        ]],
        ['label' => 'Transaction', 'items' => [
            ['label' => 'Pembelian', 'url' => ['/purchase-order/index']],
            ['label' => 'Penjualan', 'url' => ['/sale-order/index']],
            '<li class="divider"></li>',
            ['label' => 'Pelunasan Pembelian', 'url' => ['/purchase-payment/index']],
            ['label' => 'Pelunasan Penjualan', 'url' => ['/sale-payment/index']],
            '<li class="divider"></li>',
            //['label' => 'TT Pembelian', 'url' => ['/purchase-receipt/index']],
            ['label' => 'TT Penjualan', 'url' => ['/sale-receipt/index']],
            '<li class="divider"></li>',
            ['label' => 'Retur Pembelian', 'url' => ['/purchase-return/index']],
            ['label' => 'Retur Penjualan', 'url' => ['/sale-return/index']],
            '<li class="divider"></li>',
            ['label' => 'Pengeluaran', 'url' => ['/expense/index']],
            ['label' => 'Pendapatan lain-lain', 'url' => ['/income/index']],
            '<li class="divider"></li>',
            ['label' => 'Mutasi Produk', 'url' => ['/product-history/index']],
        ]],
        ['label' => 'Laporan', 'url' => ['/site/report']],
        ['label' => 'Database', 'items' => [
            ['label' => 'Backup', 'url' => ['/site/backup-db']],
        ]],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = [
            'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
            'url' => ['/site/logout'],
            'linkOptions' => ['data-method' => 'post']
        ];
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container-fluid">
        <div class="clearfix">
            <div class="pull-left">
                <?= Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
            </div>
           <div class="pull-right">
               <div class="btn-group">
                <?php
                if (isset($this->params['buttons'])):
                    foreach ($this->params['buttons'] as $button):
                        echo $button . '&nbsp;';
                    endforeach;
                endif;
                ?>
               </div>
               <div class="btn-group">
                <?php
                if (isset($this->params['export'])):
                    echo $this->params['export'];
                endif;
                ?>
               </div>
            </div>
        </div>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<!--<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company 2016 ?></p>

        <p class="pull-right">Designer</p>
    </div>
</footer>-->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
