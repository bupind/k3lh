<?php
/**
 * Created by PhpStorm.
 * User: Joko Hermanto
 * Date: 27/09/2016
 * Time: 14:58
 */

namespace app\components;
use yii\helpers\ArrayHelper;
use iutbay\yii2kcfinder\KCFinderAsset;

class CKEditor extends \dosamigos\ckeditor\CKEditor {
    
    public $enableKCFinder = true;
    
    protected function registerPlugin() {
        
        if ($this->enableKCFinder) {
            $register = KCFinderAsset::register($this->view);
            $kcfinderUrl = $register->baseUrl;
            
            $browserOptions = [
                'filebrowserBrowseUrl' => $kcfinderUrl . '/browse.php?opener=ckeditor&type=files',
                'filebrowserUploadUrl' => $kcfinderUrl . '/upload.php?opener=ckeditor&type=files',
            ];
            
            $this->clientOptions = ArrayHelper::merge($browserOptions, $this->clientOptions);
        }
        
        parent::registerPlugin();
    }
    
}