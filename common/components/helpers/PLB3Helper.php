<?php
/**
 * Created by PhpStorm.
 * User: Joko Hermanto
 * Date: 20/04/2017
 * Time: 10:23
 */

namespace common\components\helpers;

use yii\widgets\ActiveForm;
use yii\base\Component;
use yii\helpers\Html;
use common\vendor\AppConstants;
use common\vendor\AppLabels;

class PLB3Helper extends Component {
    
    public static function generateSAInput($model, $inputTypeCode, $index) {
        switch ($inputTypeCode) {
            case AppConstants::FORMAT_TYPE_YES_NO:
                echo Html::beginTag('table', ['class' => AppConstants::TABLE_CLASS_DEFAULT_SMALL]);
                    echo Html::beginTag('tr');
                        echo Html::beginTag('td');
                        echo Html::activeDropDownList($model, "[$index]plb3safd_yes_no", AppConstants::$yesNoList, ['class' => 'form-control']);
                        echo Html::endTag('td');
                        
                        echo Html::beginTag('td');
                        echo Html::activeTextarea($model, "[$index]plb3safd_description", ['class' => 'form-control']);
                        echo Html::endTag('td');
                    echo Html::endTag('tr');
                echo Html::endTag('table');
                break;
            case AppConstants::FORMAT_TYPE_PERCENTAGE:
                echo Html::beginTag('table', ['class' => AppConstants::TABLE_CLASS_DEFAULT_SMALL]);
                    echo Html::beginTag('tr');
                        echo Html::beginTag('td');
                            echo Html::activeTextInput($model, "[$index]plb3safd_percentage", ['class' => 'form-control text-right numbersOnly', 'maxlength' => 3]);
                        echo Html::endTag('td');
            
                        echo Html::beginTag('td');
                        echo Html::label('%');
                        echo Html::endTag('td');
                        echo Html::endTag('tr');
                    echo Html::endTag('table');
                break;
        }
    }
    
    public static function generateSALabel($model, $inputTypeCode) {
        switch ($inputTypeCode) {
            case AppConstants::FORMAT_TYPE_YES_NO:
                echo Html::beginTag('table', ['class' => AppConstants::TABLE_CLASS_DEFAULT_SMALL]);
                    echo Html::beginTag('tr');
                        echo Html::beginTag('td');
                        echo Converter::format($model->plb3safd_yes_no, AppConstants::FORMAT_TYPE_YES_NO);
                        echo Html::endTag('td');
                        
                        echo Html::beginTag('td');
                        echo \Yii::$app->formatter->asHtml($model->plb3safd_description);
                        echo Html::endTag('td');
                    echo Html::endTag('tr');
                echo Html::endTag('table');
                break;
            case AppConstants::FORMAT_TYPE_PERCENTAGE:
                echo Html::beginTag('table', ['class' => AppConstants::TABLE_CLASS_DEFAULT_SMALL]);
                    echo Html::beginTag('tr');
                        echo Html::beginTag('td');
                        echo $model->plb3safd_percentage . '%';
                        echo Html::endTag('td');
                    echo Html::endTag('tr');
                echo Html::endTag('table');
                break;
        }
    }
    
    public static function generateSALabelExcel($model, $inputTypeCode) {
        switch ($inputTypeCode) {
            case AppConstants::FORMAT_TYPE_YES_NO:
                return sprintf('%s. %s', Converter::format($model->plb3safd_yes_no, AppConstants::FORMAT_TYPE_YES_NO), \Yii::$app->formatter->asHtml($model->plb3safd_description));
                break;
            case AppConstants::FORMAT_TYPE_PERCENTAGE:
                return $model->plb3safd_percentage . '%';
                break;
        }
    }
    
}