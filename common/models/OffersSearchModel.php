<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Offers;

/**
 * OffersSearchModel represents the model behind the search form of `common\models\Offers`.
 */
class OffersSearchModel extends Offers
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['admin_id', 'rooms_count', 'price'], 'integer'],
            [['city_name', 'street_name'], 'safe'],
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
        $query = Offers::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize'=> 10,
                ],
            'sort'=> [
                    'defaultOrder'=>[
                        'rooms_count'=>SORT_DESC
                    ]
                ],

        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'admin_id' => $this->admin_id,
            'rooms_count' => $this->rooms_count,
            'price' => $this->price,
        ]);

        $query->andFilterWhere(['like', 'city', $this->city_name])
            ->andFilterWhere(['like', 'street', $this->street_name]);

        return $dataProvider;
    }
}
