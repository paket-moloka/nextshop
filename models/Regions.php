<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "regions".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $okrug
 * @property string|null $autocod
 * @property string|null $capital
 * @property string|null $english
 * @property string|null $iso
 * @property string|null $country
 * @property string|null $vid
 * @property string|null $wiki
 */
class Regions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'regions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'okrug', 'autocod', 'capital', 'english', 'iso', 'country', 'vid', 'wiki'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'okrug' => 'Okrug',
            'autocod' => 'Autocod',
            'capital' => 'Capital',
            'english' => 'English',
            'iso' => 'Iso',
            'country' => 'Country',
            'vid' => 'Vid',
            'wiki' => 'Wiki',
        ];
    }

}
