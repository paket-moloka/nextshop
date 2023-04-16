<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use app\models\Categories;
use app\models\Images;
use app\models\Products;
use app\models\ProductsFeatures;
use app\models\ProductsFeaturesValues;
use app\models\ProductsFeaturesValuesMap;
use yii\console\Controller;
use Yii;

class DumpController extends Controller
{

    public function actionCategories()
    {
        $file = Yii::getAlias('@data').'cats.json';
        $catsArray = file_get_contents($file);
        $errors = 0;
        foreach (json_decode($catsArray, true) as $item) {
            $model = new Categories();
            $model->id = $item['id'];
            $model->parent_id = $item['parent_id'];
            $model->name = $item['name'];
            $model->meta_title = $item['meta_title'];
            $model->meta_keywords = $item['meta_keywords'];
            $model->meta_description = $item['meta_description'];
            $model->description = $item['description'];
            $model->status = $item['status'];
            if (!$model->save()) {
                $errors++;
                $this->log('Cat '.$model->id.' not saved');
            } else {
                $this->log('Cat '.$model->id.' saved');
            }
        }
    }

    public function actionFeatures() {
        $file = Yii::getAlias('@data').'features_values.json';
        $featuresValuesArray = file_get_contents($file);
        foreach (json_decode($featuresValuesArray, true) as $item) {
            $feature = new ProductsFeatures();
            $feature->id = $item['id'];
            $feature->parent_id = $item['parent_id'];
            $feature->name = $item['name'];
            if ($feature->save()) {
                foreach ($item['values'] as $value) {
                    $featureValue = new ProductsFeaturesValues();
                    $featureValue->id = $value['id'];
                    $featureValue->feature_id = $value['feature_id'];
                    $featureValue->value = $value['value'];
                    try {
                        if (!$featureValue->save()) {
                            $this->log('feature value not saved');
                        }
                    } catch (\Exception $exception) {
                        $this->log($exception->getMessage());
                    }
                }
            } else {
                $this->log('feature not saved');
            }
        }
    }

    public function actionProducts() {
        $file = Yii::getAlias('@data').'products.json';
        $productsArr = file_get_contents($file);
        foreach (json_decode($productsArr, true) as $item) {
            /*$product = new Products();
            $product->id = $item['id'];
            $product->name = $item['name'];
            $product->summary = $item['summary'];
            $product->meta_description = $item['meta_description'];
            $product->description = $item['description'];
            $product->status = $item['status'];
            $product->price = $item['price'];
            $product->currency = $item['currency'];
            $product->count = $item['count'];
            $product->total_sales = $item['total_sales'];
            $product->cat_id = $item['category_id'];
            $product->article = $item['article'];
            if ($product->save()) {
                foreach ($item['images'] as $image) {
                    $modelImage = new Images();
                    $modelImage->id = $image['id'];
                    $modelImage->product_id = $image['product_id'];
                    $modelImage->filename = $image['filename'];
                    $modelImage->original_filename = $image['original_filename'];
                    $modelImage->ext = $image['ext'];
                    $modelImage->save();
                }
                foreach ($item['features'] as $feature) {
                    $modelFeature = new ProductsFeaturesValuesMap();
                    $modelFeature->id = $feature['id'];
                    $modelFeature->product_id = $feature['product_id'];
                    $modelFeature->feature_id = $feature['feature_id'];
                    $modelFeature->feature_value_id = $feature['feature_value_id'];
                    $modelFeature->save();
                }
            }*/
            foreach ($item['features'] as $feature) {
                $modelFeature = new ProductsFeaturesValuesMap();
                $modelFeature->id = $feature['id'];
                $modelFeature->product_id = $feature['product_id'];
                $modelFeature->feature_id = $feature['feature_id'];
                $modelFeature->feature_value_id = $feature['feature_value_id'];
                $modelFeature->save();
            }
        }
    }

    public function actionTest() {
        $pages = 30;
        $current = 1;
        if ($pages >= 30) {
            echo '< 1 ';
            for ($i = 1; $i <= $pages; $i++) {
                if ($current < $i || $current > $pages) {
                    echo "$i ";
                }
            }
            echo '30 >';
        }
    }

    public function log($message) {
        echo date('d-m-Y H:i:s').' '.$message.PHP_EOL;
    }
}
