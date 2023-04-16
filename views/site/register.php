<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\Users */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="register-account ptb-45">
    <div class="container">
        <!-- Row End -->
        <div class="row">
            <div class="col-sm-12">
                <?php $form = ActiveForm::begin([
                    'class' => 'form-register',
                    'layout' => 'horizontal',
                    'fieldConfig' => [
                        'template' => "<div class=\"form-group d-md-flex align-items-md-center\">{label}<div class=\"col-md-6\">{input}</div><div class=\"col-md-6\">{error}</div></div>",
                        'labelOptions' => ['class' => 'control-label col-md-2'],
                    ],
                ]); ?>

                <fieldset>
                    <legend>Персональные данные</legend>
                    <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>
                    <?= $form->field($model, 'login')->textInput() ?>
                    <?= $form->field($model, 'phone')->textInput() ?>
                </fieldset>
                <fieldset>
                    <legend>Пароль</legend>
                    <?= $form->field($model, 'new_pass')->passwordInput() ?>
                    <?= $form->field($model, 'repeat_pass')->passwordInput() ?>
                </fieldset>
                <div class="terms">
                    <div class="float-md-right">
                        <span>Ознакомьтесь <a href="#" class="agree"><b>С правилами пользования сайта</b></a></span>
                        <?= $form->field($model, 'agree')->checkbox()?>&nbsp;
                        <?= Html::submitButton('Зарегистрироваться', ['class' => 'return-customer-btn', 'name' => 'register-button']) ?>
                    </div>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
        <!-- Row End -->
    </div>
    <!-- Container End -->
</div>