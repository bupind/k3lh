<?php
use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $model common\models\TransferGame */

?>
Hallo Admin,
Terdapat request transfer game baru dengan rincian sebagai berikut:

Nama Lengkap: <?= $model->tg_name; ?>

Email: <?= $model->tg_email; ?>

Jumlah Penarikan: <?= Yii::$app->formatter->asCurrency($model->tg_amount); ?>

Dari ID Game: <?= $model->tgFromGame->game_name; ?>

Ke ID Game: <?= $model->tgToGame->game_name; ?>

IP Address: <?= $model->ip_address; ?>


Mohon untuk segera di follow up.
Terima kasih.
