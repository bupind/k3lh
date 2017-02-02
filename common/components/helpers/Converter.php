<?php
namespace common\components\helpers;

use yii\helpers\Html;
use yii\base\Component;
use common\vendor\AppConstants;

/**
 * Description of Converter
 *
 * @author Joko Hermanto
 */
class Converter extends Component {
    
    public static function format($value, $formatType) {
        
        if (!empty($value)) {
            switch ($formatType) {
                case AppConstants::FORMAT_TYPE_YES_NO:
                    return isset(AppConstants::$yesNoList[$value]) ? AppConstants::$yesNoList[$value] : '-';
            }
        }
        
    }
    
    public static function cleanDecimal($value) {
        
        if (!is_null($value) && !empty($value)) {
            $temp = $value;
            $decimalStartPos = strpos($value, ',');
            $decimalVal = '';
            if ($decimalStartPos > 0) {
                $decimalVal = substr($value, $decimalStartPos+1, strlen($value));
                $temp = substr($value, 0, strpos($value, ','));
            }

            $value = preg_replace(AppConstants::PATTERN_REGEX_NUMBER_ONLY, '', $temp);
            $value = !empty($decimalVal) ? $value . '.' . $decimalVal : $value;
            
            return $value;
        }
        
        return null;
    }
    
    public static function validationErrors($errors) {
        $errStr = '';
        
        if (!empty($errors)) {
            $errStr = "Terdapat kesalahan saat penyimpanan data:\n";
            foreach ($errors as $error) {
                $errStr .= sprintf("- %s\n", $error[0]);
            }
        }
        
        return $errStr;
    }
    
    public static function modelName($fullPathModel) {
        $extracted = explode('\\', $fullPathModel);
        return $extracted[count($extracted) - 1];
    }
    
    public static function indonesianMonthName($month) {
        if (empty($month)) return false;
        
        $months = [
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember'
        ];
        
        return $months[$month];
    }
    
    public static function extractDays($days) {
        $daysName = AppConstants::$daysList;
        $daysArr = explode(',', $days);
        $result = '';
        foreach ($daysArr as $day) {
            $result .= sprintf('%s, ', $daysName[$day]);
        }
                
        return substr($result, 0, strlen($result)-2);
    }
    
    public static function attachmentImage($attachmentOwner) {
        if (!is_null($attachmentOwner)) {
            return Html::img(sprintf('%s%s%s/%s', (AppConstants::APP_FRONTEND_BASE_URL != '/') ? AppConstants::APP_FRONTEND_BASE_URL : '', AppConstants::THEME_UPLOADED_IMG_PATH, strtolower($attachmentOwner->attachment->atf_location), $attachmentOwner->attachment->atf_filename), ['style' => 'max-width: 150px;']);
        } else {
            return AppConstants::MSG_DATA_NOT_FOUND;
        }
    }
    
    public static function attachment($attachmentOwner, $options = []) {
        if (!is_null($attachmentOwner)) {
            return Html::a($attachmentOwner->attachment->atf_filename, sprintf('%s/uploads/%s/%s', \Yii::getAlias(AppConstants::THEME_BASE_URL), strtolower($attachmentOwner->attachment->atf_location), $attachmentOwner->attachment->atf_filename), ['target' => '_blank']);
        } else {
            
            if (isset($options['show_file_upload']) && $options['show_file_upload'] == true) {
                $index = $options['index'];
                $input = Html::hiddenInput("Attachment[$index][file]");
                $input .= Html::fileInput("Attachment[$index][file]");
                
                return $input;
            } else {
                return AppConstants::MSG_DATA_NOT_FOUND;
            }
        }
    }
    
}
