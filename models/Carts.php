<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "carts".
 *
 * @property int $id
 * @property int|null $product_id
 * @property string|null $user_id
 * @property int|null $qty
 * @property int|null $price
 * @property int|null $totalSumm
 * @property int|null $discount
 * @property int|null $created
 */
class Carts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'carts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'qty', 'price', 'totalSumm', 'discount', 'created'], 'integer'],
            [['user_id'], 'string', 'max' => 255],
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
            'user_id' => 'User ID',
            'qty' => 'Qty',
            'price' => 'Price',
            'totalSumm' => 'Total Summ',
            'discount' => 'Discount',
            'created' => 'Created',
        ];
    }

    public function getProduct() {
        return Products::findOne($this->product_id);
    }

    public static function getCartProducts($uid) {
        if (empty($uid)) {
            return [];
        }
        $carts = Carts::find()->where(['user_id' => $uid])->all();
        $result = [];
        foreach ($carts as $cart) {
            /** @var Products $product */
            $product = $cart->getProduct();
            if ($product) {
                $result[] = [
                    'id' => $cart->product_id,
                    'img' => $product->getImage(),
                    'name' => $product->name,
                    'price' => $cart->price,
                    'currency' => $product->getCurrency(),
                    'total' => $cart->qty,
                ];
            }
        }
        return $result;
    }

    public static function addToCard($product_id, $qty, $uid) {
        $product = Products::findOne($product_id);
        if (!$product) {
            return [];
        }
        $exist = Carts::find()->where(['user_id' => $uid, 'product_id' => $product_id])->one();
        if (!$exist) {
            $model = new self();
            $model->product_id = $product->id;
            $model->user_id = "$uid";
            $model->qty = $qty;
            $model->price = intval($product->price);
            $model->totalSumm = $product->price * $qty;
            $model->discount = 0;
            $model->created = time();
            $model->save();
        } else {
            $exist->qty += $qty;
            $exist->totalSumm += $product->price * $qty;
            $exist->save();
        }

        return self::getCartProducts($uid);
    }
}
