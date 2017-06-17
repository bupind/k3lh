<?php

namespace backend\models;

use common\vendor\AppConstants;
use common\vendor\AppLabels;
use Yii;

/**
 * This is the model class for table "fcd_detail".
 *
 * @property integer $id
 * @property integer $fd_check_date_id
 * @property string $fcd_date
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $updated_at
 *
 * @property FdCheckDate $fdCheckDate
 */
class FcdDetail extends AppModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fcd_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fd_check_date_id'], 'required', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['fd_check_date_id'], 'integer', 'message' => AppConstants::VALIDATE_REQUIRED],
            [['fcd_date'], 'safe'],
            [['fd_check_date_id'], 'exist', 'skipOnError' => true, 'targetClass' => FdCheckDate::className(), 'targetAttribute' => ['fd_check_date_id' => 'id']],
        ];
    }

    public function beforeSave($insert) {
        parent::beforeSave($insert);

        if(!$this->fcd_date == '') {
            $this->fcd_date = Yii::$app->formatter->asDate($this->fcd_date, AppConstants::FORMAT_DB_DATE_PHP);
        }

        return true;
    }

    public function afterFind() {

        if(!$this->fcd_date == '') {
            $this->fcd_date = Yii::$app->formatter->asDate($this->fcd_date, AppConstants::FORMAT_DATE_PHP_SHOW_MONTH);
        }

        return true;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fd_check_date_id' => AppLabels::DATE,
            'fcd_date' => AppLabels::DATE,
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFdCheckDate()
    {
        return $this->hasOne(FdCheckDate::className(), ['id' => 'fd_check_date_id']);
    }
}
