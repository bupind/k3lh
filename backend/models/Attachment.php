<?php

namespace backend\models;

use Yii;
use yii\base\Exception;
use Yii\web\UploadedFile;
use common\vendor\AppConstants;
use common\vendor\AppLabels;

/**
 * This is the model class for table "attachment".
 *
 * @property integer $id
 * @property string $atf_filename
 * @property integer $atf_filesize
 * @property string $atf_filetype
 * @property string $atf_location
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property AttachmentOwner[] $attachmentOwners
 */
class Attachment extends AppModel {
    
    /**
     * @var UploadedFile
     */
    public $image_file;
    
    /**
     * @var UploadedFile[]
     */
    public $image_files;
    
    /**
     * @var UploadedFile
     */
    public $file;
    
    /**
     * @var UploadedFile[]
     */
    public $files;
    
    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'attachment';
    }
    
    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['atf_filename', 'atf_filetype', 'atf_location'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['atf_filesize'], 'integer', 'message' => AppConstants::VALIDATE_INTEGER],
            [['atf_filename', 'atf_location'], 'string', 'max' => 255],
            [['atf_filetype'], 'string', 'max' => 50],
                        
            [['image_file'], 'file', 'skipOnEmpty' => true,
                'extensions' => 'png, jpg, jpeg',
                'wrongExtension' => AppConstants::VALIDATE_WRONG_EXTENSION,
                'checkExtensionByMimeType' => false,
            ],
            [['image_files'], 'file', 'skipOnEmpty' => true,
                'extensions' => 'png, jpg, jpeg',
                'wrongExtension' => AppConstants::VALIDATE_WRONG_EXTENSION,
                'checkExtensionByMimeType' => false,
                'maxFiles' => 5,
                'tooMany' => AppConstants::VALIDATE_TOO_MANY
            ],

            [['file'], 'file', 'skipOnEmpty' => true,
                'extensions' => ['pdf', 'xlsx', 'xls', 'doc', 'docx'],
                'wrongExtension' => AppConstants::VALIDATE_WRONG_EXTENSION,
                'checkExtensionByMimeType' => false,
                'maxSize' => 1024000,
                'tooBig' => AppConstants::VALIDATE_TOO_BIG,
            ],
            [['files'], 'file', 'skipOnEmpty' => true,
                'extensions' => ['pdf', 'xlsx', 'xls', 'doc', 'docx'],
                'wrongExtension' => AppConstants::VALIDATE_WRONG_EXTENSION,
                'checkExtensionByMimeType' => false,
                'maxSize' => 1024000,
                'tooBig' => AppConstants::VALIDATE_TOO_BIG,
                'maxFiles' => 5,
                'tooMany' => AppConstants::VALIDATE_TOO_MANY
            ],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'atf_filename' => AppLabels::FILENAME,
            'atf_filesize' => AppLabels::FILESIZE,
            'atf_filetype' => AppLabels::FILETYPE,
            'atf_location' => AppLabels::LOCATION,
            'image_file' => AppLabels::IMAGE_FILE,
            'file' => AppLabels::FILE,
            'image_files' => AppLabels::IMAGE_FILES,
            'files' => AppLabels::FILES,
        ];
    }
    
    public function beforeDelete() {
        parent::beforeDelete();
    
        $uploadDir = \Yii::getAlias(AppConstants::THEME_UPLOAD_DIR);
        $uploadDir .= strtolower($this->atf_location) . '/';

        if (is_dir($uploadDir)) {
            unlink($uploadDir . $this->atf_filename);
        }
        
        return true;
    }
    
    public function saveAttachment($moduleCode, $modulePk, $attachmentType = AppConstants::ATTACHMENT_TYPE_FILE) {
        $file = $attachmentType == AppConstants::ATTACHMENT_TYPE_FILE ? $this->file : $this->image_file;
        
        if (!is_null($file)) {
            $this->atf_filename = $file->name;
            $this->atf_filetype = $file->extension;
            $this->atf_location = $moduleCode;
                
            if (($newFilename = $this->upload($attachmentType)) !== false) {
                $this->atf_filename = $newFilename;
                $this->save();
        
                $mdlOwner = new AttachmentOwner();
                $mdlOwner->attachment_id = $this->id;
                $mdlOwner->atfo_module_code = $moduleCode;
                $mdlOwner->atfo_module_pk = $modulePk;
                $mdlOwner->save();
        
                return true;
            }
        }
        
        return false;
    }
    
    public function saveMultipleAttachments($moduleCode, $modulePk, $attachmentType = AppConstants::ATTACHMENT_TYPE_FILE) {
        $files = $attachmentType == AppConstants::ATTACHMENT_TYPE_FILE ? $this->files : $this->image_files;
        $validated = $attachmentType == AppConstants::ATTACHMENT_TYPE_FILE ? $this->validate(['files']) : $this->validate(['image_files']);
        
        if ($validated && !empty($files)) {
            foreach ($files as $file) {
                $attachment = new Attachment();
                $attachment->file = $file;
                if (!$attachment->saveAttachment($moduleCode, $modulePk, $attachmentType)) {
                    return false;
                }
            }
            
            return true;
        }
    
        return false;
    }
    
    public function upload($attachmentType) {
        if ($this->validate()) {
            $uploadDir = \Yii::getAlias(AppConstants::THEME_UPLOAD_DIR);
            $uploadDir .= strtolower($this->atf_location) . '/';
            
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
            
            if ($attachmentType == AppConstants::ATTACHMENT_TYPE_FILE) {
                $newFilename = sprintf('%s_%s', strtotime('now'), str_replace(' ', '_', $this->file->name));
                $this->file->saveAs($uploadDir . $newFilename);
            } else {
                $newFilename = sprintf('%s_%s', strtotime('now'), str_replace(' ', '_', $this->file->name));
                $this->file->saveAs($uploadDir . $newFilename);
            }
            
            sleep(1);
            
            return $newFilename;
        } else {
            return false;
        }
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttachmentOwners() {
        return $this->hasMany(AttachmentOwner::className(), ['attachment_id' => 'id']);
    }
}
