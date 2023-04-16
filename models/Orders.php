<?php

namespace app\models;

use Yii;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "orders".
 *
 * @property int $id
 * @property int|null $uid
 * @property int|null $discount
 * @property string|null $first_name
 * @property string|null $name
 * @property string|null $last_name
 * @property string|null $company
 * @property string|null $email
 * @property string|null $phone
 * @property string|null $comment
 * @property int|null $delivety_type
 * @property int|null $delivery_summ
 * @property string|null $city
 * @property string|null $region
 * @property string|null $zip_code
 * @property string|null $address
 * @property int|null $payment_type
 * @property int|null $payment_summ
 * @property int|null $status
 * @property int|null $created
 * @property int|null $updated
 */
class Orders extends \yii\db\ActiveRecord
{

    const STATUS_CREATED = 100;
    const STATUS_IN_PROGRESS = 200;
    const STATUS_DONE = 300;
    const STATUS_RETURNS = 400;

    const DELIVERY_PICKUP = 'pickup';
    const DELIVERY_POST = 'post';
    const DELIVERY_TRANSPORT = 'transport';

    const PAYMENTS_TYPE_MONEY = 'money';
    const PAYMENTS_TYPE_CARD = 'card';
    const PAYMENTS_TYPE_INVOICE = 'invoice';
    const PAYMENTS_TYPE_MANAGER = 'manager';

    const STATUSES = [
        self::STATUS_CREATED => 'Создан',
        self::STATUS_IN_PROGRESS => 'В обработке',
        self::STATUS_DONE => 'Завершен',
        self::STATUS_RETURNS => 'Возврат',
    ];

    const DELIVERY_TYPES = [
        self::DELIVERY_PICKUP => 'Самовывоз',
        self::DELIVERY_POST => 'Доставка почтой',
        self::DELIVERY_TRANSPORT => 'Транспортной компанией',
    ];

    const PAYMENTS_TYPES = [
        self::PAYMENTS_TYPE_MONEY => 'Наличными или картой при получении',
        self::PAYMENTS_TYPE_CARD => 'Перевод на карту',
        self::PAYMENTS_TYPE_INVOICE => 'Оплата по счёту',
        self::PAYMENTS_TYPE_MANAGER => 'По согласованию',
    ];

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orders';
    }

    public $password;
    public $cbox;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uid', 'discount', 'delivery_summ', 'status', 'created', 'updated'], 'integer'],
            [['comment'], 'string'],
            [['first_name', 'name', 'last_name', 'email', 'phone'], 'required'],
            [['first_name', 'name', 'last_name', 'company', 'email', 'phone', 'city', 'region', 'zip_code', 'address'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'uid' => 'Uid',
            'discount' => 'Купон',
            'cbox' => 'Создать аккаунт?',
            'first_name' => 'Фамилия',
            'name' => 'Имя',
            'last_name' => 'Отчество',
            'company' => 'Компания',
            'email' => 'Email',
            'phone' => 'Телефон',
            'comment' => 'Комментарий к заказу',
            'delivety_type' => 'Тип доставки',
            'delivery_summ' => 'Сумма доставки',
            'city' => 'Город',
            'region' => 'Регион',
            'zip_code' => 'Индекс',
            'address' => 'Адрес',
            'payment_type' => 'Тип оплаты',
            'payment_summ' => 'Процент по счёт',
            'status' => 'Статус',
            'created' => 'Создан',
            'updated' => 'Обновлён',
        ];
    }

    public static function getRegions() {
        $regions = Regions::find()->all();
        $result = [];
        foreach ($regions as $region) {
            $result[$region->id] = $region->name;
        }
        return $result;
    }

    public function getStatus() {
        return self::STATUSES[$this->status];
    }

    public function getProducts() {
        $maps = PoductsOrdersMap::find()->where(['order_id' => $this->id])->all();
        $result = [];
        foreach ($maps as $map) {
            $product = Products::findOne($map->product_id);
            $result[] = [
                'name' => $product->name,
                'count' => $map->count,
                'price' => $map->price,
                'total' => $map->price * $map->count,
            ];
        }
        return $result;
    }
}
