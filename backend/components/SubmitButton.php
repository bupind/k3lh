<?php

namespace app\components;

use Yii;
use yii\base\Widget;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SubmitButton
 *
 * @author Joko Hermanto
 */
class SubmitButton extends Widget {
    
    public $backAction = '';
    public $isNewRecord = true;
    public $widget = false;
    
    public function run() {
        return $this->render('submitButton', ['isNewRecord' => $this->isNewRecord, 'backAction' => $this->backAction, 'widget' => $this->widget]);
    }
    
}
