<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Statement;

/**
 * StatementSearch represents the model behind the search form of `app\models\Statement`.
 */
class StatementSearch extends Statement
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['statement_id', 'user_id'], 'integer'],
            [['car_number', 'violation_description', 'status'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Statement::find();

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
            'statement_id' => $this->statement_id,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'car_number', $this->car_number])
            ->andFilterWhere(['like', 'violation_description', $this->violation_description])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
