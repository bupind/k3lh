<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\PpuEmissionLoadGrk;

/**
 * PpuEmissionLoadGrkSearch represents the model behind the search form about `backend\models\PpuEmissionLoadGrk`.
 */
class PpuEmissionLoadGrkSearch extends PpuEmissionLoadGrk
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'ppu_emission_source_id', 'created_by', 'created_at', 'updated_by', 'updated_at'], 'integer'],
            [['ppuelg_parameter'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
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
    public function search($params)
    {
        $query = PpuEmissionLoadGrk::find();

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
            'ppu_emission_source_id' => $this->ppu_emission_source_id,
            'created_by' => $this->created_by,
            'created_at' => $this->created_at,
            'updated_by' => $this->updated_by,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'ppuelg_parameter', $this->ppuelg_parameter]);

        return $dataProvider;
    }

    public function searchPpu($params, $ppuId)
    {
        $query = PpuEmissionLoadGrk::find();

        // add conditions that should always apply here

        $query->joinWith(['ppuEmissionSource es'], true, 'INNER JOIN')
            ->where(['es.ppu_id' => $ppuId]);

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
            'ppu_emission_source_id' => $this->ppu_emission_source_id,
            'created_by' => $this->created_by,
            'created_at' => $this->created_at,
            'updated_by' => $this->updated_by,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'ppuelg_parameter', $this->ppuelg_parameter]);

        return $dataProvider;
    }
}
