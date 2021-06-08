<?php

namespace app\models;

use app\models\Request;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * RequestSearch represents the model behind the search form of `app\models\Request`.
 */
class RequestSearch extends Request
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'idUser', 'idCategory', 'maxprice'], 'integer'],
            [['name', 'description', 'timestamp', 'status', 'photoBefore', 'photoAfter', 'reason', 'address'], 'safe'],
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
        $query = Request::find();

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
            'timestamp' => $this->timestamp,
            'idUser' => $this->idUser,
            'idCategory' => $this->idCategory,
            'maxprice' => $this->maxprice,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'photoBefore', $this->photoBefore])
            ->andFilterWhere(['like', 'photoAfter', $this->photoAfter])
            ->andFilterWhere(['like', 'reason', $this->reason])
            ->andFilterWhere(['like', 'address', $this->address]);

        $query->orderBy(['timestamp' => SORT_DESC]);

        return $dataProvider;
    }

    ######################################
    ######################################
    public function searchForUser($params, $idUser)
    {
        $query = Request::find();

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

        $query->andWhere(['idUser' => $idUser]);
        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'timestamp' => $this->timestamp,
            'idCategory' => $this->idCategory,
            'maxprice' => $this->maxprice,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'photoBefore', $this->photoBefore])
            ->andFilterWhere(['like', 'photoAfter', $this->photoAfter])
            ->andFilterWhere(['like', 'reason', $this->reason])
            ->andFilterWhere(['like', 'address', $this->address]);

        $query->orderBy(['timestamp' => SORT_DESC]);
        return $dataProvider;
    }
}