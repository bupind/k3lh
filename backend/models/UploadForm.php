<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace backend\models;

use yii\base\Model;
use yii\web\UploadedFile;
use common\vendor\AppConstants;
use moonland\phpexcel\Excel;

/**
 * Description of UploadForm
 *
 * @author Joko Hermanto
 */
class UploadForm extends Model {
    
    /**
     * @var UploadedFile[]
     */
    public $excel_files;
    
    public function rules() {
        return [
            [
                ['excel_files'], 
                'file', 
                'skipOnEmpty' => false, 
                'uploadRequired' => AppConstants::VALIDATE_UPLOAD_REQUIRED, 
                'extensions' => ['xlsx', 'xls'], 
                'wrongExtension' => AppConstants::VALIDATE_WRONG_EXTENSION, 
                'checkExtensionByMimeType' => false, 
                'maxFiles' => 4, 
                'tooMany' => AppConstants::VALIDATE_TOO_MANY
            ]
        ];
    }
    
    public function attributeLabels() {
        return [
            'excel_files' => 'Silahkan pilih file excel'
        ];
    }
    
    public function upload() {
        if ($this->validate()) {
            $uploadDir = \Yii::getAlias(AppConstants::THEME_UPLOAD_DIR);
            foreach ($this->excel_files as $file) {                
                $newFilename = sprintf('%s_%s', strtotime('now'), str_replace(' ', '_', $file->name));
                $file->saveAs($uploadDir . $newFilename);
                $this->import($uploadDir . $newFilename);
            }
            
            return true;
        } else {
            return false;
        }
    }
    
    public function import($filename) {
        try {
            $dataset = Excel::import($filename, ['setFirstRecordAsKeys' => false]);
            
            // remove header text
            unset($dataset[1]);
            
            // clean all null data 
            foreach ($dataset as $key => $data) {
                // check primary key is not null
                if (is_null($data['A'])) {
                    unset($dataset[$key]);
                }
            }
            
            \Yii::$app->db->createCommand()->batchInsert('player', ['company_bank_id', 'ply_name', 'ply_handphone', 'ply_email', 'ply_notes'], $dataset)->execute();
            
            return true;
        } catch (Exception $ex) {
            return false;
        }
    }
    
}
