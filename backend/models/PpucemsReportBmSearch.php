<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * PpucemsReportBmSearch represents the model behind the search form about `backend\models\PpucemsReportBm`.
 */
class PpucemsReportBmSearch extends PpucemsReportBm
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'ppu_emission_source_id'], 'integer'],
            [['ppucemsrb_parameter_code', 'ppucemsrb_ref'], 'safe'],
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
        $query = PpucemsReportBm::find();

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
        ]);

        $query->andFilterWhere(['like', 'ppucemsrb_parameter_code', $this->ppucemsrb_parameter_code])
            ->andFilterWhere(['like', 'ppucemsrb_ref', $this->ppucemsrb_ref]);

        return $dataProvider;
    }

    public function searchPpuEmissionSource($params, $ppuId)
    {
        $query = PpucemsReportBm::find();

        // add conditions that should always apply here

        $query->joinWith(['ppuEmissionSource pes'], true, 'INNER JOIN')
            ->where(['pes.ppu_id' => $ppuId]);

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
        ]);

        $query->andFilterWhere(['like', 'ppucemsrb_parameter_code', $this->ppucemsrb_parameter_code])
            ->andFilterWhere(['like', 'ppucemsrb_ref', $this->ppucemsrb_ref])
            ->andFilterWhere(['like', 'ppucemsrb_sec_ref', $this->ppucemsrb_sec_ref]);

        return $dataProvider;
    }
}
