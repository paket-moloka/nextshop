<?php

namespace app\models;

use baibaratsky\yii\behaviors\model\SerializedAttributes;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string|null $login
 * @property string|null $password
 * @property int|null $role
 * @property int|null $create_time
 * @property int|null $status
 * @property string|null $params
 */
class Users extends \yii\db\ActiveRecord implements IdentityInterface
{

    public $new_pass;
    public $repeat_pass;
    public $name;
    public $phone;
    public $agree;

    const STATUS_ACTIVE = '10';
    const STATUS_BAN = '0';

    const STATUSES = [
        self::STATUS_ACTIVE => 'Активный',
        self::STATUS_BAN => 'Заблокирован'
    ];

    const ROLE_CLIENT = '1';
    const ROLE_ADMIN = '2';
    const ROLE_MANAGER = '3';
    const ROLE_MODERATOR = '4';

    const ROLES = [
        self::ROLE_CLIENT => 'Клиент',
        self::ROLE_ADMIN => 'Админ',
        self::ROLE_MODERATOR => 'Модератор',
        self::ROLE_MANAGER => 'Менеджер'
    ];


    public static function tableName()
    {
        return 'users';
    }

    public function rules()
    {
        return [
            [['login'], 'unique', 'targetClass' => Users::class, 'targetAttribute' => 'login', 'message' => 'Пользователь с таким E-mail уже зарегистирован'],
            [['role', 'create_time', 'status'], 'integer'],
            [['params', 'new_pass', 'repeat_pass', 'auth_key'], 'string'],
            [['login', 'password'], 'string', 'max' => 255],
            [['new_pass', 'repeat_pass'], 'required'],
            [['new_pass', 'repeat_pass'], 'string', 'max' => 255],
            [['repeat_pass'], 'compare', 'compareAttribute' => 'new_pass', 'message' => 'Пароли не совпадают.'],
        ];
    }

    public function getParams() {
        return json_decode($this->params, true);
    }

    public function getStatus() {
        return self::STATUSES[$this->status];
    }

    public function getRole() {
        return self::ROLES[$this->role];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'E-mail',
            'password' => 'Password',
            'role' => 'Role',
            'create_time' => 'Create Time',
            'status' => 'Status',
            'params' => 'Params',
            'name' => 'Имя',
            'phone' => 'Телефон',
            'new_pass' => 'Пароль',
            'repeat_pass' => 'Повторите пароль',
        ];
    }

    public function validateAuthKey($authKey) {
        return $this->getAuthKey() === $authKey;
    }

    public function getAuthKey() {
        return $this->auth_key;
    }

    public function generateAuthKey() {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    public function getId() {
        return $this->getPrimaryKey();
    }

    public static function findIdentity($id) {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    public static function findIdentityByAccessToken($token, $type = null) {
        return static::find()
            ->joinWith('tokens t')
            ->andWhere(['t.token' => $token])
            ->andWhere(['>', 't.expired_at', time()])
            ->one();
    }

    public static function findByUsername($username) {
        return static::findOne(['login' => $username]);
    }

    public function validatePassword($password) {
        return Yii::$app->security->validatePassword($password, $this->password);
    }


    public function setPassword($password) {
        $this->password = Yii::$app->security->generatePasswordHash($password);
    }

    public function getUrl() {
        if ($this->role == self::ROLE_CLIENT) {
            return '/cabinet';
        }
        return '/shop/stats/index';
    }

    public function search($params = null)
    {
        $query = Users::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ],
            'pagination' => [
                'pageSize' => 30,
                'route' => 'shop/users'
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'login', $this->login])
            ->andFilterWhere(['like', 'params', $this->params]);

        return $dataProvider;
    }

}
