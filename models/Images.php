<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "images".
 *
 * @property int $id
 * @property int|null $product_id
 * @property string|null $filename
 * @property string|null $original_filename
 * @property string|null $ext
 */
class Images extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'images';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id'], 'integer'],
            [['filename', 'original_filename'], 'string', 'max' => 255],
            [['ext'], 'string', 'max' => 64],
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
            'filename' => 'Filename',
            'original_filename' => 'Original Filename',
            'ext' => 'Ext',
        ];
    }
}
