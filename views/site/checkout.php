<?php
use yii\widgets\ActiveForm;
use app\models\Orders;
use kartik\select2\Select2;
$model = new \app\models\LoginForm();
$this->title = 'Оформление заказа';
?>
<!-- Breadcrumb Start -->
<div class="breadcrumb-area mt-30">
    <div class="container">
        <div class="breadcrumb">
            <ul class="d-flex align-items-center">
                <li><a href="/">Главная</a></li>
                <li><a href="/products">Товары</a></li>
                <li class="active"><a href="/checkout">Оформление заказа</a></li>
            </ul>
        </div>
    </div>
    <!-- Container End -->
</div>
<!-- Breadcrumb End -->
<!-- coupon-area start -->
<div class="coupon-area pt-45">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="coupon-accordion">
                    <!-- ACCORDION START -->
                    <?php
                        if (Yii::$app->user->isGuest) {
                    ?>
                        <h3>Являетесь постоянным клиентом? <span id="showlogin">Войдите на сайт</span></h3>
                        <div id="checkout-login" class="coupon-content">
                            <div class="coupon-info">
                                <?php $form = ActiveForm::begin([
                                    'id' => 'login-form',
                                ]); ?>
                                <p class="form-row-first">
                                    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
                                </p>
                                <p class="form-row-last">
                                    <?= $form->field($model, 'password')->passwordInput() ?>
                                </p>
                                <p class="form-row">
                                    <input type="submit" value="Войти" /><br>
                                    <?= $form->field($model, 'rememberMe')->checkbox([
                                        'template' => "{input}{label}{error}</div>",
                                    ]) ?>
                                </p>
                                <?php ActiveForm::end(); ?>
                            </div>
                        </div>
                    <?php
                        }
                    ?>
                    <!-- ACCORDION END -->
                    <!-- ACCORDION START -->
                    <h3><span id="showcoupon">У меня есть купон</span></h3>
                    <div id="checkout_coupon" class="coupon-checkout-content">
                        <div class="coupon-info">
                            <form action="#">
                                <p class="checkout-coupon">
                                    <input type="text" class="code" placeholder="Код купона:" />
                                    <input type="submit" value="Применить купон" />
                                </p>
                            </form>
                        </div>
                    </div>
                    <!-- ACCORDION END -->
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$form = ActiveForm::begin([
    'action' => 'createOrder',
    //'type' => 'post',
    'id' => 'order-form',
    'fieldConfig' => [
        'template' => "{input}{error}",
    ],
]);
$order = new Orders();
$form->field($order, 'discount')->hiddenInput()

?>
<!-- coupon-area end -->
<!-- checkout-area start -->
<div class="checkout-area pb-45 pt-15">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="checkbox-form mb-sm-40">
                    <h3>Данные для заказа</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="checkout-form-list mb-sm-30">
                                <label>Фамилия <span class="required">*</span></label>
                                <?= $form->field($order, 'first_name')->textInput() ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="checkout-form-list mb-30">
                                <label>Имя <span class="required">*</span></label>
                                <?= $form->field($order, 'name')->textInput() ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkout-form-list mb-30">
                                <label>Отчество <span class="required">*</span></label>
                                <?= $form->field($order, 'last_name')->textInput() ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkout-form-list mb-30">
                                <label>Компания</label>
                                <?= $form->field($order, 'company')->textInput() ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="checkout-form-list mb-30">
                                <label>Email <span class="required">*</span></label>
                                <?= $form->field($order, 'email')->textInput() ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="checkout-form-list mb-30">
                                <label>Телефон  <span class="required">*</span></label>
                                <?= $form->field($order, 'phone')->textInput() ?>
                            </div>
                        </div>
                        <?php
                            if (Yii::$app->user->isGuest) {
                        ?>
                            <div class="col-md-12">
                                <div class="checkout-form-list create-acc mb-30">
                                    <?= $form->field($order, 'cbox')->checkbox(['id' => 'cbox','template' => '{input}{label}']) ?>
                                </div>
                                <div id="cbox_info" class="checkout-form-list create-accounts mb-25">
                                    <p class="mb-10">Придумайте пароль для создания аккаунта, оставьте пустым, мы сами сгенерируем и отправим на Ваш email.</p>
                                    <label>Пароль</label>
                                    <?= $form->field($order, 'password')->textInput() ?>
                                </div>
                            </div>
                        <?php
                            }
                        ?>
                    </div>
                    <div class="different-address">
                        <div class="order-notes">
                            <div class="checkout-form-list">
                                <label>Комментарий к заказу</label>
                                <?= $form->field($order, 'comment')->textarea(['id' => 'checkout-mess', 'cols' => 30, 'rows' => 30, 'placeholder' => "Ваши пожелания по заказу."]) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="your-order">
                    <h3>Ваш заказ</h3>
                    <div class="your-order-table table-responsive">
                        <table>
                            <thead>
                            <tr>
                                <th class="product-name">Товар</th>
                                <th class="product-total">Общая сумма</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="cart_item" v-for="product in products">
                                <td class="product-name">
                                    {{product.name}} <span class="product-quantity"> × {{product.total}}</span>
                                </td>
                                <td class="product-total">
                                    <span class="amount">{{product.price * product.total}} {{product.currency}}</span>
                                </td>
                            </tr>
                            </tbody>
                            <tfoot>
                            <tr class="cart-subtotal">
                                <th>Сумма товаров</th>
                                <td><span class="amount">{{totalSumm}} ₽</span></td>
                            </tr>
                            <tr class="cart-subtotal">
                                <th>Доставка (<b>{{deliveryTypeName}}</b>)</th>
                                <td><span class="amount">{{deliverySumm}} ₽</span></td>
                                <?= $form->field($order, 'delivery_summ')->hiddenInput(['v-model' => 'deliverySumm']) ?>
                            </tr>
                            <tr class="cart-subtotal">
                                <th>Наценка на оплату</th>
                                <td><span class="amount">{{paymentSumm}} ₽</span></td>
                            </tr>
                            <tr class="order-total">
                                <th>Сумма заказа</th>
                                <td><span class=" total amount">{{orderSumm}} ₽</span>
                                </td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="payment-method">
                        <div id="accordion">
                            <div class="card">
                                <div class="card-header" id="headingone">
                                    <h5 class="mb-0">
                                        <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Условия доставки
                                        </button>
                                    </h5>
                                </div>

                                <div id="collapseOne" class="collapse show" aria-labelledby="headingone" data-parent="#accordion">
                                    <div class="card-body row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12" @click="setDeliveryType('pickup')">
                                            <div class="deliveryTypeBlock">
                                                <span class="deliveryLeft">
                                                    <input v-model='deliveryType' name="Orders[delivety_type]" value='pickup' type="radio">
                                                </span>
                                                <span class="deliveryLeft">
                                                    <p>Самовывоз из магазина</p>
                                                    <p>Иркутский тракт, 37/В, офис 301</p>
                                                </span>
                                                <span class="deliveryRight">
                                                    Бесплатно
                                                </span>
                                                <div style="clear: both"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12" @click="setDeliveryType('post')">
                                            <div class="deliveryTypeBlock">
                                                <span class="deliveryLeft">
                                                    <input v-model='deliveryType' name="Orders[delivety_type]" value='post' type="radio">
                                                </span>
                                                <span class="deliveryLeft">
                                                    <p>Почта России</p>
                                                    <p>1 класс, от 3-х дней</p>
                                                </span>
                                                <span class="deliveryRight">
                                                    {{deliveryTypes.post.price}}₽
                                                </span>
                                                <div style="clear: both"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12" @click="setDeliveryType('transport')">
                                            <div class="deliveryTypeBlock last">
                                                <span class="deliveryLeft">
                                                    <input v-model='deliveryType' name="Orders[delivety_type]" value='transport' type="radio">
                                                </span>
                                                <span class="deliveryLeft">
                                                    <p>Транспортной компанией СДЭК</p>
                                                    <p>от 3-х рабочих дней</p>
                                                </span>
                                                <span class="deliveryRight">
                                                    {{deliveryTypes.transport.price}}₽
                                                </span>
                                                <div style="clear: both"></div>
                                            </div>
                                        </div>
                                        <br><br><br><br>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12" v-show="deliveryType != 'pickup'">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="checkout-form-list mb-30">
                                                        <label>Регион <span class="required">*</span></label>
                                                        <?= $form->field($order, 'region')->widget(Select2::classname(), [
                                                            'data' => Orders::getRegions(),
                                                            'options' => ['placeholder' => 'Выберите регион'],
                                                            'pluginOptions' => [
                                                                'allowClear' => true
                                                            ],
                                                        ]);?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="checkout-form-list mb-30">
                                                        <label>Город <span class="required">*</span></label>
                                                        <?= $form->field($order, 'city')->textInput() ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="checkout-form-list mb-30">
                                                        <label>Индекс <span class="required">*</span></label>
                                                        <?= $form->field($order, 'zip_code')->textInput() ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="checkout-form-list">
                                                        <label>Адрес доставки <span class="required">*</span></label>
                                                        <?= $form->field($order, 'address')->textInput() ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingtwo">
                                    <h5 class="mb-0">
                                        <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            Способ оплаты
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingtwo" data-parent="#accordion">
                                    <div class="card-body row">
                                        <div v-show="deliveryType == 'pickup'" class="col-lg-12 col-md-12 col-sm-12 col-12" @click="setPaymentType('money')">
                                            <div class="deliveryTypeBlock">
                                                <span class="deliveryLeft">
                                                    <input v-model='paymentType' name="Orders[payment_type]" value='money' type="radio">
                                                </span>
                                                <span class="deliveryLeft">
                                                    <p>Наличными при получении</p>
                                                </span>
                                                <div class="backOpac">
                                                    <img src="/img/paymentTypes/money.png" alt="Наличными при получении" class="type-money">
                                                </div>
                                                <div style="clear: both"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12" @click="setPaymentType('card')">
                                            <div class="deliveryTypeBlock">
                                                <span class="deliveryLeft">
                                                    <input v-model='paymentType' name="Orders[payment_type]" value='card' type="radio">
                                                </span>
                                                <span class="deliveryLeft">
                                                    <p>Перевод на карту</p>
                                                </span>
                                                <div class="backOpac">
                                                    <img src="/img/paymentTypes/card.png" alt="Перевод на карту" class="type-card">
                                                    <span class="card-number">4276&nbsp;&nbsp;&nbsp;1609&nbsp;&nbsp;&nbsp;4351&nbsp;&nbsp;&nbsp;8432</span>
                                                    <span class="card-date"><?= date('m').'/'.(date('y') + 10)?></span>
                                                    <span class="card-owner">Денис Викторович Кербер</span>
                                                </div>
                                                <div style="clear: both"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12" @click="setPaymentType('invoice')">
                                            <div :class="{'deliveryTypeBlock': true, 'last': deliveryType == 'pickup'}">
                                                <span class="deliveryLeft">
                                                    <input v-model='paymentType' name="Orders[payment_type]" value='invoice' type="radio">
                                                </span>
                                                <span class="deliveryLeft">
                                                    <p>Оплата по счёту</p>
                                                </span>
                                                <span class="deliveryRight">
                                                    <input v-model='paymentSumm' name="Orders[payment_summ]" type="hidden">
                                                    {{paymentSumm}}₽
                                                </span>
                                                <div class="backOpac">
                                                    <img src="/img/paymentTypes/invoice.png" alt="Оплата по счёту" class="type-invoice">
                                                </div>
                                                <div style="clear: both"></div>
                                            </div>
                                        </div>
                                        <div v-show="showManager" class="col-lg-12 col-md-12 col-sm-12 col-12" @click="setPaymentType('manager')">
                                            <div class="deliveryTypeBlock last">
                                                <span class="deliveryLeft">
                                                    <input v-model='paymentType' name="Orders[payment_type]" value='manager' type="radio">
                                                </span>
                                                <span class="deliveryLeft">
                                                    <p>По согласованию</p>
                                                </span>
                                                <div class="backOpac">
                                                    <img src="/img/paymentTypes/manager.png" alt="Оплата по счёту" class="type-manager">
                                                </div>
                                                <div style="clear: both"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" v-for="product in products" :value="product.id" name="Orders[products][]">
                    <button type="submit" name="order-button" class="return-customer-btn">Создать заказ</button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php ActiveForm::end()?>
<!-- checkout-area end -->