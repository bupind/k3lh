<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Codeset;
use common\vendor\AppConstants;

/**
 * CodesetSearch represents the model behind the search form about `backend\models\Codeset`.
 */
class CodesetSearch extends Codeset {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id'], 'integer'],
            [['cset_name', 'cset_code', 'cset_value', 'cset_description', 'cset_parent_pk', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'safe'],
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
        $query = Codeset::find();
        $sort = ['defaultOrder' => ['cset_name' => SORT_ASC, 'cset_order' => SORT_ASC]];
        $pagination = ['pageSize' => AppConstants::LIMIT_PER_PAGE];

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => $sort,
            'pagination' => $pagination,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'cset_name', $this->cset_name])
                ->andFilterWhere(['like', 'cset_code', $this->cset_code])
                ->andFilterWhere(['like', 'cset_value', $this->cset_value])
                ->andFilterWhere(['like', 'cset_description', $this->cset_description])
                ->andFilterWhere(['like', 'cset_parent_pk', $this->cset_parent_pk]);

        return $dataProvider;
    }
    
    public function searchByCodesetName($params, $csetName) {
        $query = Codeset::find()->where(['cset_name' => $csetName]);
        $sort = ['defaultOrder' => ['cset_order' => SORT_ASC]];

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => $sort
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'cset_name', $this->cset_name])
                ->andFilterWhere(['like', 'cset_code', $this->cset_code])
                ->andFilterWhere(['like', 'cset_value', $this->cset_value])
                ->andFilterWhere(['like', 'cset_description', $this->cset_description])
                ->andFilterWhere(['like', 'cset_parent_pk', $this->cset_parent_pk]);

        return $dataProvider;
    }
    
    public function findAllUpdate($codesetName) {
        if (!empty($codesetName)) {
            return Codeset::find()->where(['cset_name' => $codesetName])->orderBy(['cset_order' => SORT_ASC])->all();
        }
    }

}
