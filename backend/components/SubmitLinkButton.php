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
 * The submit button that can be placed at anywhere in a page.
 * It able to trigger submit action by the form ID supplied.
 *
 * @author Joko Hermanto
 */
class SubmitLinkButton extends Widget {
    
    public $formId = '';
    public $backAction = '';
    public $isNewRecord = true;
    public $widget = false;
    
    public function run() {
        return $this->render('submitLinkButton', ['formId' => $this->formId, 'isNewRecord' => $this->isNewRecord, 'backAction' => $this->backAction, 'widget' => $this->widget]);
    }
    
}
