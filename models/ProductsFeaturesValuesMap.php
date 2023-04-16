<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "products_features_values_map".
 *
 * @property int $id
 * @property int|null $product_id
 * @property int|null $feature_id
 * @property int|null $feature_value_id
 */
class ProductsFeaturesValuesMap extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products_features_values_map';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'feature_id', 'feature_value_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product ID',
            'feature_id' => 'Feature ID',
            'feature_value_id' => 'Feature Value ID',
        ];
    }

    public function getFeature() {
        return $this->hasOne(ProductsFeatures::className(), ['id' => 'feature_id']);
    }

    public function getFeatureValue() {
        return $this->hasOne(ProductsFeaturesValues::className(), ['id' => 'feature_value_id']);
    }
}
