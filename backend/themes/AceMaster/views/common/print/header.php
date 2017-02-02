<?php
use common\vendor\AppLabels;
use common\vendor\AppConstants;

$setting = Yii::$app->session->get(AppConstants::SES_WEB_PROFILE);
?>

<table>
    <tr>
        <td width="30%"><?= $setting[AppConstants::WEB_PROFILE_NAME]; ?></td>
        <td width="40%">&nbsp;</td>
        <td width="30%"><?= sprintf('%s: %s', $setting[AppConstants::WEB_PROFILE_CITY], date('d-m-Y')); ?></td>
    </tr>
    <tr>
        <td width="30%"><?= $setting[AppConstants::WEB_PROFILE_ADDRESS]; ?></td>
        <td width="40%">&nbsp;</td>
        <td width="30%"><?= AppLabels::PRINT_TO; ?></td>
    </tr>
    <tr>
        <td width="30%"><?= sprintf('%s: %s', AppLabels::PHONE, $setting[AppConstants::WEB_PROFILE_PHONE]); ?></td>
        <td width="40%">&nbsp;</td>
        <td width="30%"><?= isset($print_to) ? $print_to : '-'; ?></td>
    </tr>
    <tr>
        <td colspan="3"><?= $setting[AppConstants::WEB_PROFILE_NAME]; ?></td>
    </tr>
</table>