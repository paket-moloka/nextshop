<?php

namespace app\controllers;

use app\components\Common;
use app\models\Carts;
use app\models\Categories;
use app\models\Orders;
use app\models\PoductsOrdersMap;
use app\models\Products;
use app\models\ProductsFeatures;
use app\models\ProductsFeaturesValues;
use app\models\ProductsFeaturesValuesMap;
use app\models\Regions;
use app\models\Users;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\sphinx\Query;


class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['get'],
                ],
            ],
        ];
    }

    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $cats = Categories::findAll(['status' => 1, 'parent_id' => 0]);
        return $this->render('index', [
            'cats' => $cats,
        ]);
    }

    public function actionProduct($id) {
        if (!$id) {
            $this->redirect('/');
        }
        $product = Products::findOne($id);
        if ($product) {
            return $this->render('product', [
               'product' => $product
            ]);
        }
        $this->redirect('/');
    }

    public function actionCheckout() {
        return $this->render('checkout');
    }

    public function actionTestsearch() {
        $query = new Query();
        $rows = $query->from('products')
            ->match('samsung')
            ->all();
        echo "<pre>";
        print_r($rows);
        echo "</pre>";
    }

    public function actionProducts($id = 0) {
        if ($id == 0) {
            $main = new \stdClass();
            $main->id = 0;
            $main->name = 'Все категории';
            $main->meta_title = 'Товары компании Next';
            $main->meta_keywords = 'купить запчасти, запчасти для телефона, запчасти для ноутбука';
            $main->meta_description = 'Компания Next занимается продажей запчастей и ремонтом.';
            $allIds = [];
            $allCats = Categories::find()->all();
            $cats = Categories::findAll(['status' => 1, 'parent_id' => 0]);
            foreach ($allCats as $cat) {
                $allIds[] = $cat->id;
            }
        } else {
            $main = Categories::findOne($id);
            $allIds = $main->getAllIds();
            $cats = $main->getParents();
        }
        $page = Yii::$app->request->get('page', 1);
        $offset = 0;
        if ($page > 1) {
            $offset = $page * 15;
        }
        $limit = 15;
        $countProducts = Products::find()
            ->where(['status' => 1, 'cat_id' => $allIds])
            ->count();
        $products = Products::find()
            ->where(['status' => 1, 'cat_id' => $allIds])
            ->limit($limit)
            ->offset($offset)
            ->all();
        $pagination = Common::getPagination($countProducts, $page);
        return $this->render('products', [
            'cats' => $cats,
            'mainCat' => $main,
            'products' => $products,
            'pagination' => $pagination,
        ]);
    }

    public function actionCreateOrder() {
        $model = new Orders();
        $post = Yii::$app->request->post('Orders');
        $products = $post['products'];
        unset($post['products']);
        $post['created'] = time();
        $post['updated'] = time();
        $post['status'] = Orders::STATUS_CREATED;
        foreach (array_keys($post) as $key) {
            $model->{$key} = $post[$key];
        }
        if ($model->cbox == 1 && !empty($model->password)) {
            $user = new Users();
            $params = [
                'phone' => $model->phone,
                'agree' => 1,
                'name' => $model->first_name.' '.$model->name.' '.$model->last_name,
            ];
            $user->login = $model->email;
            $user->new_pass = $model->password;
            $user->repeat_pass = $model->password;
            $user->setPassword($model->password);
            $user->generateAuthKey();
            $user->name = $model->name;
            $user->phone = $model->phone;
            $user->role = Users::ROLE_CLIENT;
            $user->create_time = time();
            $user->status = Users::STATUS_ACTIVE;
            $user->params = json_encode($params);
            $user->save();
            if ($user->save()) {
                Yii::$app->user->login($user, 3600*24*30);
                $model->uid = $user->id;
            }
        }
        if ($model->save()) {
            if (Yii::$app->user->isGuest) {
                $cookies = $_COOKIE;
                $uid = $cookies['tempUserId'];
            } else {
                $uid = Yii::$app->user->identity->id;
            }
            foreach ($products as $product_id) {
                $cart = Carts::find()->where([
                    'user_id' => $uid,
                    'product_id' => $product_id
                ])->one();
                if ($cart) {
                    $modelMap = new PoductsOrdersMap();
                    $modelMap->product_id = $product_id;
                    $modelMap->order_id = $model->id;
                    $modelMap->count = $cart->qty;
                    $modelMap->price = $cart->price;
                    $modelMap->save();
                }
            }
            Carts::deleteAll(['user_id' => $uid]);
            $this->redirect('/cabinet');
        }
        $this->render('checkout');
    }

    public function actionGetCartProducts() {
        if (Yii::$app->user->isGuest) {
            $cookies = $_COOKIE;
            $uid = $cookies['tempUserId'];
        } else {
            $uid = Yii::$app->user->identity->id;
        }

        Yii::$app->response->format = Response::FORMAT_JSON;
        return ['products' => Carts::getCartProducts($uid)];
    }

    public function actionAddToCart() {

        $id = Yii::$app->request->get('id');
        $qty = Yii::$app->request->get('qty');
        if (Yii::$app->user->isGuest) {
            $cookies = $_COOKIE;
            $uid = $cookies['tempUserId'];
        } else {
            $uid = Yii::$app->user->identity->id;
        }

        Yii::$app->response->format = Response::FORMAT_JSON;

        return ['products' => Carts::addToCard($id, $qty, $uid)];
    }

    public function actionSearch() {
        $id = Yii::$app->request->get('cat_id');
        $search = Yii::$app->request->get('search');
        if ($id == 0) {
            $main = new \stdClass();
            $main->id = 0;
            $main->name = 'Все категории';
            $main->meta_title = 'Товары компании Next';
            $main->meta_keywords = 'купить запчасти, запчасти для телефона, запчасти для ноутбука';
            $main->meta_description = 'Компания Next занимается продажей запчастей и ремонтом.';
            $allIds = [];
            $allCats = Categories::find()->all();
            $cats = Categories::findAll(['status' => 1, 'parent_id' => 0]);
            foreach ($allCats as $cat) {
                $allIds[] = $cat->id;
            }
        } else {
            $main = Categories::findOne($id);
            $allIds = $main->getAllIds();
            $cats = $main->getParents();
        }
        $page = Yii::$app->request->get('page', 1);
        $offset = 0;
        if ($page > 1) {
            $offset = $page * 15;
        }
        $limit = 15;
        $queryCount = Products::find()->where(['status' => 1, 'cat_id' => $allIds]);
        foreach (explode(' ', $search) as $value) {
            $queryCount->andFilterWhere(['or like', 'name', $value]);
        }
        $countProducts = $queryCount->count();
        $queryProduct = Products::find()->where(['status' => 1, 'cat_id' => $allIds]);
        foreach (explode(' ', $search) as $value) {
            $queryProduct->andFilterWhere(['or like', 'lower(name)', $value]);
        }
        $products = $queryProduct->limit($limit)
            ->offset($offset)
            ->all();
        $pagination = Common::getPagination($countProducts, $page);
        return $this->render('products', [
            'cats' => $cats,
            'mainCat' => $main,
            'products' => $products,
            'pagination' => $pagination,
        ]);
    }

    public function actionFilters($cat_id) {

        Yii::$app->response->format = Response::FORMAT_JSON;


        $result = [];
        $result['products'] = [];
        $result['cats'] = $cats;
        $result['features'] = [];
        $result['prices'] = [];
        $result['prices']['min'] = 99999999999999;
        $result['prices']['max'] = 0;
        $productIds = [];
        foreach ($products as $product) {
            $productIds[] = $product->id;

            $features_map = ProductsFeaturesValuesMap::findAll(['product_id' => $product->id]);

            /** Фильтр по цене min и max */
            if ($result['prices']['min'] > $product->price) {
                $result['prices']['min'] = $product->price;
            }
            if ($result['prices']['max'] < $product->price) {
                $result['prices']['max'] = $product->price;
            }

            $result['products'][] = [
                'name' => $product->name,
                'price' => $product->price,
                'summary' => $product->summary,
                'id' => $product->id,
                'cat_id' => $product->cat_id,
                'features' => $features_map,
                'show' => $cat_id == $product->cat_id ? 1 : 0,
            ];
        }

        $features_map = ProductsFeaturesValuesMap::findAll(['product_id' => $productIds]);
        $featuresValues = [];
        foreach ($features_map as $item) {
            if (!isset($result['features'][$item->feature_id])) {
                $feature = ProductsFeatures::findOne($item->feature_id);
                $result['features'][$item->feature_id] = [
                    'name' => $feature->name,
                    'id' => $feature->id,
                    'scroll' => 0,
                    'values' => [],
                ];
            }
            if (!isset($featuresValues[$item->feature_id])) {
                $featuresValues[$item->feature_id] = [];
            }
            if (!in_array($item->feature_value_id, $featuresValues[$item->feature_id])) {
                $fv = ProductsFeaturesValues::findOne($item->feature_value_id);
                $result['features'][$item->feature_id]['values'][$fv->id] = [
                    'value' => $fv->value,
                    'id' => $fv->id,
                    'hId' => 'fVal'.$fv->id,
                ];
            }
            if (count($result['features'][$item->feature_id]['values']) > 40) {
                $result['features'][$item->feature_id]['scroll'] = 1;
            }

        }
        $result['prices']['min'] = round($result['prices']['min'] ,0);
        $result['prices']['max'] = round($result['prices']['max'] ,0);

        return $result;

    }

    public function actionFilterProducts() {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $filters = Yii::$app->request->post('filters');

        $params = [
            'status' => 1
        ];
        if (isset($filters['mainCat'])) {
            $catsCriteria = [];
            $main = Categories::findOne($filters['mainCat']);
            $catsCriteria[] = $main->id;
            if ($main->getParents()) {
                foreach ($main->getParents() as $parent) {
                    $catsCriteria[] = $parent->id;
                    if ($parent->getParents()) {
                        $cats[$parent->id]['has_sub'] = 1;
                        foreach ($parent->getParents() as $parent_parent) {
                            $catsCriteria[] = $parent_parent->id;
                        }
                    }
                }
            }
            $params['cat_id'] = $catsCriteria;
        }

        if (isset($filters['cat_id'])) {
            $params['cat_id'] = $filters['cat_id'];
        }


        $featureIds = [];
        $featureValueIds = [];
        if (isset($filters['features'])) {
            foreach ($filters['features'] as $feature_id => $values) {
                $featureIds[] = $feature_id;
                foreach ($filters['features'][$feature_id] as $features_value_id => $value) {
                    $featureValueIds[] = $features_value_id;
                }
            }
        }

        $productIds = [];
        if (count($featureIds) && $featureValueIds) {
            $featuresMap = ProductsFeaturesValuesMap::findAll([
                'feature_id' => $featureIds,
                'feature_value_id' => $featureValueIds
            ]);
            foreach ($featuresMap as $map) {
                $productIds[$map->product_id] = $map->product_id;
            }
        }

        if (count($productIds) > 0) {
            $params['id'] = $productIds;
        }

        $DBProducts = Products::find()->where($params)->all();
        $products = [];
        foreach ($DBProducts as $product) {

            if (isset($filters['price'])) {
                if ($product->price >= $filters['price']['max']) {
                    continue;
                }
                if ($product->price <= $filters['price']['min']) {
                    continue;
                }
            }

            $products[] = [
                'name' => $product->name,
                'price' => $product->price,
                'summary' => $product->summary,
                'id' => $product->id,
                'cat_id' => $product->cat_id,
                'features' => ProductsFeaturesValuesMap::findAll(['product_id' => $product->id]),
                'show' => 1,
            ];
        }

        return ['status' => 'ok', 'products' => $products, '$productIds' => $productIds];
    }

    public function actionTest() {
        $cats = [];
        $catsCriteria = [];
        $main = Categories::findOne(17);
        $catsCriteria[] = $main->id;
        if ($main->getParents()) {
            foreach ($main->getParents() as $parent) {
                $cats[$parent->id] = [
                    'name' => $parent->name,
                    'id' => $parent->id,
                    'has_sub' => 0,
                    'parents' => [],
                ];
                $catsCriteria[] = $parent->id;
                if ($parent->getParents()) {
                    $cats[$parent->id]['has_sub'] = 1;
                    foreach ($parent->getParents() as $parent_parent) {
                        $cats[$parent->id]['parents'][$parent_parent->id] = [
                            'name' => $parent_parent->name,
                            'id' => $parent_parent->id,
                        ];
                        $catsCriteria[] = $parent_parent->id;
                    }
                }
            }
        }
        $result = [];
        $result['features'] = [];
        $products = Products::findAll(['status' => 1, 'cat_id' => $catsCriteria]);
        $productIds = [];
        foreach ($products as $product) {
            $productIds[] = $product->id;
        }

        $features_map = ProductsFeaturesValuesMap::findAll(['product_id' => $productIds]);
        $featuresValues = [];
        foreach ($features_map as $item) {
            if (!isset($result['features'][$item->feature_id])) {
                $feature = ProductsFeatures::findOne($item->feature_id);
                $result['features'][$item->feature_id] = [
                    'name' => $feature->name,
                    'id' => $feature->id,
                    'values' => [],
                ];
            }
            if (!isset($featuresValues[$item->feature_id])) {
                $featuresValues[$item->feature_id] = [];
            }
            if (!in_array($item->feature_value_id, $featuresValues[$item->feature_id])) {
                $fv = ProductsFeaturesValues::findOne($item->feature_value_id);
                $result['features'][$item->feature_id]['values'][$fv->id] = [
                    'value' => $fv->value,
                    'id' => $fv->id,
                    'hId' => 'fVal'.$fv->id,
                ];
            }
        }
        var_dump($result['features'][5]);
    }

    public function actionHots() {

        if (!Yii::$app->request->isAjax) {
            return $this->redirect('/');
        }

        $ids = [];
        for ($i = 0; $i <= 20; $i++) {
            $ids[] = rand(5, 5000);
        }
        $products = Products::findAll(['status' => 1, 'id' => $ids]);
        Yii::$app->response->format == Response::FORMAT_JSON;
        return Json::encode(['products' => $products]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionRegister() {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new Users();
        if ($model->load(Yii::$app->request->post())) {
            $post = Yii::$app->request->post()['Users'];
            $params = [
                'phone' => $post['phone'],
                'agree' => $post['agree'],
                'name' => $post['name']
            ];
            $model->setPassword($post['new_pass']);
            $model->generateAuthKey();
            $model->name = $post['name'];
            $model->phone = $post['phone'];
            $model->role = Users::ROLE_CLIENT;
            $model->create_time = time();
            $model->status = Users::STATUS_ACTIVE;
            $model->params = json_encode($params);
            if ($model->save()) {
                return $this->redirect('/auth');
            }
        }
        return $this->render('register', [
            'model' => $model
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
    public function actionService()
    {
        return $this->render('service');
    }
    public function actionPay()
    {
        return $this->render('pay');
    }
    public function actionDelivery()
    {
        return $this->render('delivery');
    }
    public function actionGuarantee()
    {
        return $this->render('guarantee');
    }
    public function actionCooperation()
    {
        return $this->render('cooperation');
    }
    public function actionPurchaseReturns()
    {
        return $this->render('purchaseReturns');
    }


}
