<?php
use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $model common\models\Member */

?>
Hallo Admin,
Terdapat anggota baru yang terdaftar pada rajadewa.com dengan rincian sebagai berikut:

Nama Pemilik Rekening: <?= Html::decode($model->member_account_name); ?>

No. Rekening: <?= $model->member_account_no; ?>

Bank: <?= $model->bank->bank_name; ?>

Permainan: <?= $model->game->game_name; ?>

Handphone: <?= $model->member_phone; ?>

Email: <?= $model->member_email; ?>

IP Address: <?= $model->ip_address; ?>


Mohon untuk segera di follow up.
Terima kasih.
