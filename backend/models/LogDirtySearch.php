<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\LogDirty;
use common\vendor\AppConstants;

/**
 * LogDirtySearch represents the model behind the search form about `backend\models\LogDirty`.
 */
class LogDirtySearch extends LogDirty
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'data_id', 'created_by'], 'integer'],
            [['controller', 'model', 'label', 'original_value', 'changed_value', 'created_at'], 'safe'],
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
        $query = LogDirty::find();
        $sort = ['defaultOrder' => ['id' => SORT_DESC]];

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => $sort,
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
            'data_id' => $this->data_id,
            'created_by' => $this->created_by,
            Yii::t('app', AppConstants::MYSQL_SEARCH_FROM_UNIXTIME, ['field' => 'created_at']) => !empty($this->created_at) ? \Yii::$app->formatter->asDate($this->created_at, 'php:Y-m-d') : $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'controller', $this->controller])
            ->andFilterWhere(['like', 'model', $this->model])
            ->andFilterWhere(['like', 'label', $this->label])
            ->andFilterWhere(['like', 'original_value', $this->original_value])
            ->andFilterWhere(['like', 'changed_value', $this->changed_value]);

        return $dataProvider;
    }
}
