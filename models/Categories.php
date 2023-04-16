<?php

namespace app\models;

use Yii;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "categories".
 *
 * @property int $id
 * @property int|null $parent_id
 * @property string|null $name
 * @property string|null $meta_title
 * @property string|null $meta_keywords
 * @property string|null $meta_description
 * @property string|null $description
 * @property int|null $status
 */
class Categories extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categories';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id', 'status'], 'integer'],
            [['meta_title', 'meta_keywords', 'meta_description', 'description'], 'string'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Parent ID',
            'name' => 'Name',
            'meta_title' => 'Meta Title',
            'meta_keywords' => 'Meta Keywords',
            'meta_description' => 'Meta Description',
            'description' => 'Description',
            'status' => 'Status',
        ];
    }

    public function getParent() {
        return self::find()->where(['id' => $this->parent_id])->one();
    }

    public function getParents() {
        return self::findAll(['status' => 1, 'parent_id' => $this->id]);
    }

    public function getAllIds(){
        $ids[] = $this->id;
        $parents = $this->getParents();
        if ($parents) {
            foreach ($parents as $parent) {
                $ids[] = $parent->id;
                $preparents = $parent->getParents();
                if ($preparents) {
                    foreach ($preparents as $preparent) {
                        $ids[] = $preparent->id;
                    }
                }
            }
        }
        return $ids;
    }

    public static function cats() {
        $result = [];
        foreach (Categories::find()->all() as $cat) {
            $result[$cat->id] = $cat->name;
        }
        return $result;
    }

    public function search($params = null)
    {
        $query = Categories::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ],
            'pagination' => [
                'pageSize' => 30,
                'route' => 'shop/cats'
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'meta_description', $this->meta_description])
            ->andFilterWhere(['like', 'meta_title', $this->meta_title])
            ->andFilterWhere(['like', 'meta_keywords', $this->meta_keywords])
            ->andFilterWhere(['like', 'meta_description', $this->meta_description])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
