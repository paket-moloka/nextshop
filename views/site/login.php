<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Вход на сайт';
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- LogIn Page Start -->
<div class="log-in ptb-45">
    <div class="container">
        <div class="row">
            <!-- New Customer Start -->
            <div class="col-md-6">
                <div class="well mb-sm-30">
                    <div class="new-customer">
                        <h3 class="custom-title">новый пользователь</h3>
                        <p>Если у Вас еще нет аккаунта, зарегистрируйтесь</p>
                        <a class="customer-btn" href="/register">Продолжить</a>
                    </div>
                </div>
            </div>
            <!-- New Customer End -->
            <!-- Returning Customer Start -->
            <div class="col-md-6">
                <div class="well">
                    <div class="return-customer">
                        <h3 class="mb-10 custom-title">Есть аккаунт</h3>
                        <?php $form = ActiveForm::begin([
                            'id' => 'login-form',
                            'layout' => 'horizontal',
                            'fieldConfig' => [
                                'template' => "<div class=\"form-group\">{label}{input}{error}</div>",
                            ],
                        ]); ?>
                        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                        <?= $form->field($model, 'password')->passwordInput() ?>

                        <?= $form->field($model, 'rememberMe')->checkbox([
                            'template' => "<div class=\"col-lg-offset-1 col-lg-8\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
                        ]) ?>
                        <?= Html::submitButton('Войти', ['class' => 'return-customer-btn', 'name' => 'login-button']) ?>

                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
            <!-- Returning Customer End -->
        </div>
        <!-- Row End -->
    </div>
    <!-- Container End -->
</div>
<!-- LogIn Page End -->