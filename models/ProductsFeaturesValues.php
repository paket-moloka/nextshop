<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "products_features_values".
 *
 * @property int $id
 * @property int|null $feature_id
 * @property string|null $value
 */
class ProductsFeaturesValues extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products_features_values';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['feature_id'], 'integer'],
            [['value'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'feature_id' => 'Feature ID',
            'value' => 'Value',
        ];
    }
}
