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
 * The export button that can be placed at anywhere in a page.
 * It able to trigger export action by the form ID supplied.
 *
 * @author Joko Hermanto
 */
class ExportLinkButton extends Widget {
    
    public $formId = '';
    public $backAction = '';
    public $widget = false;
    
    public function run() {
        return $this->render('exportLinkButton', ['formId' => $this->formId, 'backAction' => $this->backAction, 'widget' => $this->widget]);
    }
    
}
