<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Departments;

/**
 * DepartmentsSearch represents the model behind the search form of `backend\models\Departments`.
 */
class DepartmentsSearch extends Departments
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'branches_branch_id', 'companies_company_id'], 'integer'],
            [['departments_name', 'departments_created_dat', 'departments_status'], 'safe'],
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
        $query = Departments::find();

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
            'branches_branch_id' => $this->branches_branch_id,
            'companies_company_id' => $this->companies_company_id,
            'departments_created_dat' => $this->departments_created_dat,
        ]);

        $query->andFilterWhere(['like', 'departments_name', $this->departments_name])
            ->andFilterWhere(['like', 'departments_status', $this->departments_status]);

        return $dataProvider;
    }
}
