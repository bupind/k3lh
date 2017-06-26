<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\vendor\AppConstants;

/**
 * AttachmentSearch represents the model behind the search form about `backend\models\Attachment`.
 */
class AttachmentSearch extends Attachment {
    
    public $owner_pk;
    
    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'atf_filesize', 'created_by'], 'integer'],
            [['atf_filename', 'atf_filetype', 'atf_location', 'created_at'], 'safe'],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function scenarios() {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }
    
    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params) {
        $query = Attachment::find();
        $query->joinWith('attachmentOwners');
        
        // add conditions that should always apply here
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        
        $this->load($params);
        
        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        
        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'created_by' => $this->created_by,
            Yii::t('app', AppConstants::MYSQL_SEARCH_FROM_UNIXTIME, ['field' => 'attachment.created_at']) => !empty($this->created_at) ? \Yii::$app->formatter->asDate($this->created_at, AppConstants::FORMAT_DB_DATE_PHP) : $this->created_at,
            'attachment_owner.atfo_module_pk' => $this->owner_pk,
        ]);
        
        $query->andFilterWhere(['like', 'atf_filename', $this->atf_filename])
            ->andFilterWhere(['like', 'atf_filetype', $this->atf_filetype])
            ->andFilterWhere(['like', 'atf_location', $this->atf_location])
            ->andFilterWhere(['like', 'attachment_owner.atfo_module_code', $this->atf_location]);
        
        return $dataProvider;
    }
}
