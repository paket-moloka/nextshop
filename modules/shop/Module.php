<?php

namespace app\modules\shop;


/**
 * shop module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\shop\controllers';

    public $layout = "@app/views/layouts/admin";

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
    }
}
