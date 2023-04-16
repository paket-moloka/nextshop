<?php


namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;


class ProductsSearch extends Products
{

    public function rules()
    {
        return [
            [['summary', 'meta_description', 'description'], 'string'],
            [['status', 'count', 'cat_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['price', 'currency', 'total_sales', 'article'], 'string', 'max' => 64],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params = null)
    {
        $query = Products::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ],
            'pagination' => [
                'pageSize' => 30,
                'route' => 'shop/product'
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'meta_description', $this->meta_description])
            ->andFilterWhere(['like', 'summary', $this->summary])
            ->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }

    public function searchAdmin($params = null)
    {
        $query = Products::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ],
            'pagination' => [
                'pageSize' => 30,
                'route' => 'shop/product'
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'meta_description', $this->meta_description])
            ->andFilterWhere(['like', 'summary', $this->summary])
            ->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
