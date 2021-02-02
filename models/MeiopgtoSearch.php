<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Meiopgto;

/**
 * MeiopgtoSearch represents the model behind the search form of `app\models\Meiopgto`.
 */
class MeiopgtoSearch extends Meiopgto
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idmeiopgto'], 'integer'],
            [['meio'], 'safe'],
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
        $query = Meiopgto::find();

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
            'idmeiopgto' => $this->idmeiopgto,
        ]);

        $query->andFilterWhere(['like', 'meio', $this->meio]);

        return $dataProvider;
    }
}
