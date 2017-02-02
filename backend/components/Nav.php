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
 * Description of Nav
 *
 * @author Joko Hermanto
 */
class Nav extends Widget {
    
    public $navs = null;
    public $options = [];
    
    public function run() {
        return $this->render('nav', ['navs' => $this->navs, 'options' => $this->options]);
    }
    
}
