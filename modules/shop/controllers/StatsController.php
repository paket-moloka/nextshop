<?php

namespace app\modules\shop\controllers;

use app\models\Users;
use yii\base\Exception;
use yii\web\Controller;
use Yii;

/**
 * Product controller for the `shop` module
 */
class StatsController extends Controller
{

    public function init()
    {
        parent::init();
        if (!Yii::$app->user->isGuest && Yii::$app->user->identity->role == Users::ROLE_ADMIN) {
            return true;
        }
        $this->redirect('/auth');
    }

    public function beforeAction($action)
    {
        Yii::$app->request->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    public function actionIndex() {
        return $this->render('index');
    }

}
