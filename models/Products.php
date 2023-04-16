<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $summary
 * @property string|null $meta_description
 * @property string|null $description
 * @property int|null $status
 * @property string|null $price
 * @property string|null $currency
 * @property int|null $count
 * @property string|null $total_sales
 * @property int|null $cat_id
 * @property string|null $article
 */
class Products extends \yii\db\ActiveRecord
{

    public $files;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * {@inheritdoc}
     */
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
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Наименование',
            'summary' => 'Краткое описание',
            'meta_description' => 'Мета описание (для продвижения)',
            'description' => 'Описание товара',
            'status' => 'Статус',
            'price' => 'Цена',
            'currency' => 'Валюта',
            'count' => 'Кол-во на складе',
            'total_sales' => 'Продано на самму',
            'cat_id' => 'Категория',
            'article' => 'Артикул',
            'files' => "Загрузить файлы"
        ];
    }

    public static function setLinkPath($product_id, $image) {
        $idArrCount = str_split($product_id);
        $id = $product_id;
        if (count($idArrCount) == 3) {
            $id = "0".$product_id;
        }
        if (count($idArrCount) == 2) {
            $id = "00".$product_id;
        }
        if (count($idArrCount) == 1) {
            $id = "000".$product_id;
        }
        $idArr = str_split($id, 2);
        $path = Yii::getAlias('@app').'/web/shop/products';
        if (!file_exists($path)) {
            mkdir($path);
        }
        $path = $path . '/' . $idArr[1];
        if (!file_exists($path)) {
            mkdir($path);
        }
        $path = $path . '/' . $idArr[0];
        if (!file_exists($path)) {
            mkdir($path);
        }
        $path = $path . '/' . $product_id;
        if (!file_exists($path)) {
            mkdir($path);
        }
        $path = $path . '/images';
        if (!file_exists($path)) {
            mkdir($path);
        }
        $path = $path . '/' . $image->id;
        if (!file_exists($path)) {
            mkdir($path);
        }
        $path = $path.'/'.$image->id.'.650.'.$image->ext;
        return $path;
    }

    public static function getLinkPath($product_id, $image) {
        $idArrCount = str_split($product_id);
        $id = $product_id;
        if (count($idArrCount) == 3) {
            $id = "0".$product_id;
        }
        if (count($idArrCount) == 2) {
            $id = "00".$product_id;
        }
        if (count($idArrCount) == 1) {
            $id = "000".$product_id;
        }
        $idArr = str_split($id, 2);
        $sizes = [
            '750x0',
            '650',
            '200x0',
            '0x340',
            '0x340@2x'
        ];
        $imagePath = '';
        foreach ($sizes as $size) {
            $path = '/shop/products/'.$idArr[1].'/'.$idArr[0].'/'.$product_id.'/images/'.$image->id.'/'.$image->id.'.'.$size.'.'.$image->ext;
            $checkPath = Yii::getAlias('@app').'/web'.$path;
            if (file_exists($checkPath)) {
                $imagePath = $path;
                break;
            }
        }
        return $imagePath;
    }

    public function getImage() {
        $image = Images::find()->where(['product_id' => $this->id])->one();
        if ($image) {
            return self::getLinkPath($this->id, $image);
        }
        return '/img/products/1.jpg';
    }

    public function getImages() {
        $images = Images::find()->where(['product_id' => $this->id])->all();
        $result = [];
        if ($images) {
            foreach ($images as $image) {
                $result[] = self::getLinkPath($this->id, $image);
            }
        } else {
            $result[] = '/img/products/1.jpg';
        }
        return $result;
    }

    public function getPrice() {
        return round($this->price - $this->getSale(), 2);
    }

    public function getOriginalPrice() {
        return round($this->price, 2) . ' '.$this->getCurrency();
    }

    public function getSale() {
        return 100;
    }

    public function getCurrency() {
        if ($this->currency == 'RUB') {
            return '₽';
        }
        return '';
    }

    public function getFeatures() {
        $maps = ProductsFeaturesValuesMap::find()->where(['product_id' => $this->id])->all();
        $result = [];
        foreach ($maps as $map) {
            $result[] = [
                'map' => $map,
                'feature' => $map->feature,
                'value' => $map->featureValue,
            ];
        }
        return $result;
    }

    public static function getCats() {
        $cats = Categories::find()->all();
        $result = [];
        foreach ($cats as $cat) {
            $result[$cat->id] = $cat->name;
        }
        return $result;
    }

    public static function getFeaturesList() {
        $features = ProductsFeatures::find()->all();
        $result = [];
        foreach ($features as $feature) {
            $result[$feature->id] = $feature->name;
        }
        return $result;
    }

    public static function getFeatureValuesList() {
        $features = ProductsFeaturesValues::find()->all();
        $result = [];
        foreach ($features as $feature) {
            $result[$feature->id] = $feature->value;
        }
        return $result;
    }

}
