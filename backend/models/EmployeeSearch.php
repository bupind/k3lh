<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Employee;

/**
 * EmployeeSearch represents the model behind the search form about `backend\models\Employee`.
 */
class EmployeeSearch extends Employee {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'salary'], 'integer'],
            [['joined_date', 'name', 'address', 'phone', 'note', 'status'], 'safe'],
            [['commission'], 'number'],
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
        $query = Employee::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'joined_date' => $this->joined_date,
            'salary' => $this->salary,
            'commission' => $this->commission,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
                ->andFilterWhere(['like', 'address', $this->address])
                ->andFilterWhere(['like', 'phone', $this->phone])
                ->andFilterWhere(['like', 'note', $this->note])
                ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }

}
