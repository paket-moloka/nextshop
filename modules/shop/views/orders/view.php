<?php

use app\models\Orders;
use kartik\select2\Select2;
use yii\widgets\DetailView;
/** @var \app\models\Orders $model */
$title = "Заказ №". $model->id.' '.$model->first_name.' '.$model->name.' '.$model->last_name;
$this->title = $title;
?>
<div class="container-fluid" style="background: #fff">
    <div class="row">
        <div class="col-md-12">
            <br>
            <h4 style="float: left"><?= $title?></h4>
            <h4 style="float: right"><?= $model->getStatus() . ' ' . date('d.m.Y H:i', $model->created)?></h4>
            <div style="clear: both"></div>
        </div>
    </div>
    <?php
    $form = \yii\widgets\ActiveForm::begin(['action' => 'edit?id='.$model->id]);
    ?>
    <div class="row">
        <div class="col-md-12">
            <button class="btn btn-success">Сохранить изменения</button>
            <br>
            <br>
        </div>
    </div>
    <div class="row">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-tabs card-header-primary">
                            <div class="nav-tabs-navigation">
                                <div class="nav-tabs-wrapper">
                                    <span class="nav-tabs-title"><?= $this->title?>:</span>
                                    <ul class="nav nav-tabs" data-tabs="tabs">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#user" data-toggle="tab">Данные клиента</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#products" data-toggle="tab">Товары в заказе</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#delivery" data-toggle="tab">Доставка и оплата</a>
                                        </li>
                                        <li class="nav-item item-comment">
                                            <a class="nav-link <?= $model->comment !== '' ? 'animate__animated animate__heartBeat' : ''?>" href="#comment" data-toggle="tab">Коментарий к заказу</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="user">
                                    <br><br>
                                    <div class="row">
                                        <div class="col-md-4 col-lg-4">
                                            <?= $form->field($model, 'first_name')->textInput();?>
                                            <?= $form->field($model, 'company')->textInput();?>
                                        </div>
                                        <div class="col-md-4 col-lg-4">
                                            <?= $form->field($model, 'name')->textInput(); ?>
                                            <?= $form->field($model, 'email')->textInput(); ?>
                                        </div>
                                        <div class="col-md-4 col-lg-4">
                                            <?= $form->field($model, 'last_name')->textInput();?>
                                            <?= $form->field($model, 'phone')->textInput();?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4" style="padding-top: 35px">
                                            <?= $form->field($model, 'discount')->textInput();?>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="products">
                                    <table class="table table-striped table-hover" style="font-size: 14px">
                                        <tbody>
                                        <?php foreach ($model->getProducts() as $product) {?>
                                            <tr>
                                                <td><strong><?= $product['name']?></strong></td>
                                                <td width="100"><?= $product['count']?> шт.</td>
                                                <td><?= $product['price']?> RUB</td>
                                                <td><?= $product['price'] * $product['count']?> RUB</td>
                                            </tr>
                                        <?php }?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane" id="delivery">
                                    <h4>Оплата</h4>
                                    <p><b>Тип оплаты: <?= Orders::PAYMENTS_TYPES[$model->payment_type]?></b></p>
                                    <hr>
                                    <h4>Доставка:</h4>
                                    <p><b>Тип доставки: </b> <b><?= Orders::DELIVERY_TYPES[$model->delivety_type]?></b></p>
                                    <?php if ($model->delivety_type !== Orders::DELIVERY_PICKUP) {?>
                                        <p><b>Сумма доставки:</b> <b><?= $model->delivery_summ?></b></p>
                                        <p><b>Регион:</b> <b><?= Orders::getRegions()[$model->region]?></b></p>
                                        <p><b>Город:</b> <b><?= $model->city?></b></p>
                                        <p><b>Индекс:</b> <b><?= $model->zip_code?></b></p>
                                        <p><b>Адрес доставки:</b> <b><?= $model->address?></b></p>
                                    <?php }?>
                                </div>
                                <div class="tab-pane" id="comment">
                                    <blockquote>
                                        <?= $model->comment?>
                                    </blockquote>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    \yii\widgets\ActiveForm::end();
    ?>
</div>
<script>
    setInterval(function() {
        $('.item-comment a').removeClass('animate__heartBeat')
        setTimeout(function() {
            $('.item-comment a').addClass('animate__heartBeat')
        }, 1000)
    }, 3000)
</script>
