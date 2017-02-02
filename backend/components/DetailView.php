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
 * Description of DetailView
 *
 * @author Joko Hermanto
 */
class DetailView extends Widget {
    
    public $model = null;
    public $options = [];
    
    public function run() {
        return $this->render('detailView', ['model' => $this->model, 'options' => $this->options]);
    }
    
}
