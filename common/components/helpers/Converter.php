<?php
namespace common\components\helpers;

use Yii;
use backend\models\AttachmentOwner;
use yii\helpers\Html;
use yii\base\Component;
use common\vendor\AppConstants;
use yii\helpers\Url;

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
                case AppConstants::FORMAT_TYPE_OPEN_CLOSE:
                    return isset(AppConstants::$openCloseList[$value]) ? AppConstants::$openCloseList[$value] : '-';
                case AppConstants::FORMAT_TYPE_HIGH_LOW:
                    return isset(AppConstants::$lowHighList[$value]) ? AppConstants::$lowHighList[$value] : '-';
            }
        }
        
        return true;
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
    
    public static function attachmentExtLink($label, $attachmentOwner, $options = []) {
        if (!is_null($attachmentOwner)) {
            $link = Html::beginTag('div');
            $link .= $label;
            $link .= ' ';
            $link .= Html::a('<i class="ace-icon fa fa-external-link  bigger-110 icon-only"></i>', sprintf('%s/uploads/%s/%s', \Yii::getAlias(AppConstants::THEME_BASE_URL), strtolower($attachmentOwner->attachment->atf_location), $attachmentOwner->attachment->atf_filename), ['target' => '_blank', 'class' => 'btn btn-minier btn-info']);
            $link .= Html::endTag('div');
    
            return $link;
        } else {
            return AppConstants::MSG_DATA_NOT_FOUND;
        }
    }
    
    /* @var $attachmentOwner AttachmentOwner */
    public static function attachment($attachmentOwner, $options = []) {
        $index = isset($options['index']) ? $options['index'] : null;
        
        if (!is_null($attachmentOwner)) {
            $link = Html::beginTag('div', ['id' => "att_$index"]);
            $link .= Html::a($attachmentOwner->attachment->atf_filename, sprintf('%s/uploads/%s/%s', \Yii::getAlias(AppConstants::THEME_BASE_URL), strtolower($attachmentOwner->attachment->atf_location), $attachmentOwner->attachment->atf_filename), ['target' => '_blank']);
            
            if (isset($options['show_delete_file']) && $options['show_delete_file'] == true) {
                $link .= ' ';
                $link .= Html::button('<i class="ace-icon fa fa-trash bigger-110 icon-only"></i>', ['class' => 'btn btn-minier btn-danger btn-delete-attachment', 'data-id' => $attachmentOwner->attachment_id, 'data-upload' => 'true', 'data-index' => $index]);
            }
            $link .= Html::endTag('div');
            
            return $link;
        } else {
            $inputName = !is_null($index) ? "Attachment[$index][file]" : "Attachment[file]";
            
            if (isset($options['show_file_upload']) && $options['show_file_upload'] == true) {
                $input = Html::hiddenInput($inputName);
                $input .= Html::fileInput($inputName, null, ['class' => AppConstants::CLASS_FILE_SINGLE]);
                
                return $input;
            } else {
                return AppConstants::MSG_DATA_NOT_FOUND;
            }
        }
    }
    
    /* @var $attachmentOwners AttachmentOwner[] */
    public static function attachments($attachmentOwners, $options = []) {
        $index = isset($options['index']) ? $options['index'] : null;
        $name = isset($options['name']) ? $options['name'] : 'Attachment';
        $inputName = !is_null($index) ? "[$index][files][]" : "[files][]";
        $inputName = $name . $inputName;
    
        if (!empty($attachmentOwners)) {
            $link = '';
            foreach ($attachmentOwners as $key => $attachmentOwner) {
                $link .= Html::beginTag('div', ['id' => "att_$index$key"]);
                $link .= Html::a($attachmentOwner->attachment->atf_filename, sprintf('%s/uploads/%s/%s', \Yii::getAlias(AppConstants::THEME_BASE_URL), strtolower($attachmentOwner->attachment->atf_location), $attachmentOwner->attachment->atf_filename), ['target' => '_blank']);
        
                if (isset($options['show_delete_file']) && $options['show_delete_file'] == true) {
                    $link .= ' ';
                    $link .= Html::button('<i class="ace-icon fa fa-trash bigger-110 icon-only"></i>', ['class' => 'btn btn-minier btn-danger btn-delete-attachment', 'data-id' => $attachmentOwner->attachment_id, 'data-index' => $index . $key]);
                }
                $link .= Html::endTag('div');
            }
    
            if (isset($options['show_file_upload']) && $options['show_file_upload'] == true) {
                $input = Html::hiddenInput($inputName);
                $input .= Html::fileInput($inputName, null, ['multiple' => true, 'class' => AppConstants::CLASS_FILE_MULTIPLE]);
    
                return $link . $input;
            } else {
                return $link;
            }
        } else {
            if (isset($options['show_file_upload']) && $options['show_file_upload'] == true) {
                $input = Html::hiddenInput($inputName);
                $input .= Html::fileInput($inputName, null, ['multiple' => true, 'class' => AppConstants::CLASS_FILE_MULTIPLE]);
    
                return $input;
            } else {
                return AppConstants::MSG_DATA_NOT_FOUND;
            }
        }
    }
    
    public static function attachmentsFullPath($attachmentOwners) {
        $result = null;
        if (!empty($attachmentOwners)) {
            if(is_array($attachmentOwners)){
                $result = [];
                foreach ($attachmentOwners as $key => $attachmentOwner) {
                    $result[] = [
                        'label' => $attachmentOwner->attachment->atf_filename,
                        'path' => sprintf('http://%s%s/uploads/%s/%s', Yii::$app->getRequest()->serverName, \Yii::getAlias(AppConstants::THEME_BASE_URL), strtolower($attachmentOwner->attachment->atf_location), $attachmentOwner->attachment->atf_filename)
                    ];
                }
            }else{
                $result[] = [
                    'label' => $attachmentOwners->attachment->atf_filename,
                    'path' => sprintf('http://%s%s/uploads/%s/%s', Yii::$app->getRequest()->serverName, \Yii::getAlias(AppConstants::THEME_BASE_URL), strtolower($attachmentOwners->attachment->atf_location), $attachmentOwners->attachment->atf_filename)
                ];
            }
        }
        return $result;
    }
    
    public static function toRoman($number) {
        $lookup = [
            1000 => 'M',
            900 => 'CM',
            500 => 'D',
            400 => 'CD',
            100 => 'C',
            90 => 'XC',
            50 => 'L',
            40 => 'XL',
            10 => 'X',
            9 => 'IX',
            5 => 'V',
            4 => 'IV',
            1 => 'I',
        ];
    
        $result = '';
        foreach($lookup as $limit => $glyph){
            while ($number >= $limit) {
                 $result .= $glyph;
                $number -= $limit;
            }
        }
        
        return $result;
    }
    
    public static function toHtmlList($sources, $listType = null) {
        switch ($listType) {
            case AppConstants::HTML_ORDERED_LIST:
            case AppConstants::HTML_UNORDERED_LIST:
    
                $tags = Html::beginTag($listType);
        
                foreach ($sources as $source) {
                    $tags .= Html::beginTag('li');
                    $tags .= $source;
                    $tags .= Html::endTag('li');
                }
        
                $tags .= Html::endTag($listType);
                
                break;
            default:
                $tags = '';
                foreach ($sources as $key => $source) {
                    $tags .= sprintf("%s. %s\n", $key+1, $source);
                }
        }
        
        
        return \Yii::$app->formatter->asHtml($tags);
    }
    
    public static function calx($value, $tag, $options) {
        $tags = Html::beginTag($tag, $options);
        $tags .= $value;
        $tags .= Html::endTag($tag);
    
        return $tags;
    }
    
}
