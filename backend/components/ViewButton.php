<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\components;

use Yii;
use yii\base\Widget;

/**
 * Description of ViewButton
 *
 * @author Joko Hermanto
 */
class ViewButton extends Widget {
    
    public $model = null;
    public $options = [];
    
    public function run() {
        return $this->render('viewButton', ['model' => $this->model, 'options' => $this->options]);
    }
    
}
