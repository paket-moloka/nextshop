<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use app\assets\AppAsset;

AppAsset::register($this);

$cookies = $_COOKIE;


if (empty($cookies['tempUserId'])) {
    setcookie("tempUserId", md5(time().rand(5, 3)), time()+(3600 * 1000000), '/');
}
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html class="no-js" lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no, user-scalable=no">
    <link rel="shortcut icon" href="/img/favicon.ico">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <script src="/js/vendor/jquery-3.2.1.min.js"></script>
    <script src="/js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="/js/jquery.countdown.min.js"></script>
    <script src="/js/jquery.meanmenu.min.js"></script>
    <script src="/js/jquery.scrollUp.js"></script>
    <script src="/js/jquery.nivo.slider.js"></script>
    <script src="/js/jquery.fancybox.min.js"></script>
    <script src="/js/jquery.nice-select.min.js"></script>
    <script src="/js/jquery-ui.min.js"></script>
    <script src="/js/owl.carousel.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/plugins.js"></script>
    <script src="/js/main.js"></script>
    <script type="text/javascript">var cat_id = <?= $_GET['id'] ?? 0?>;</script>
    <script type="text/javascript" src="https://vk.com/js/api/openapi.js?168"></script>
    <script type="text/javascript">
        VK.init({
            apiId: 7284878,
            onlyWidgets: true
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.7.0/dist/vue.js"></script>
</head>
<body id="shopApp">
<div id="customPreloader">
    <div class="black-back"></div>
    <div class="customPreloader"><div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div></div>
    <style>
        #customPreloader {
            width: 100%;
            height: 100%;
            position: fixed;
            left: 0;
            top: 0;
            z-index: 9998;
            display: none;
        }
        .black-back {
            width: 100%;
            height: 100%;
            background: #000;
            opacity: 0.7;
            position: relative;
        }
        .customPreloader {
            position: fixed;
            z-index: 9999;
            color: #fff;
            top: 50%;
            left: 50%;
        }
        .lds-ellipsis {
            display: inline-block;
            position: relative;
            width: 80px;
            height: 80px;
        }
        .lds-ellipsis div {
            position: absolute;
            top: 33px;
            width: 13px;
            height: 13px;
            border-radius: 50%;
            background: #fff;
            animation-timing-function: cubic-bezier(0, 1, 1, 0);
        }
        .lds-ellipsis div:nth-child(1) {
            left: 8px;
            animation: lds-ellipsis1 0.6s infinite;
        }
        .lds-ellipsis div:nth-child(2) {
            left: 8px;
            animation: lds-ellipsis2 0.6s infinite;
        }
        .lds-ellipsis div:nth-child(3) {
            left: 32px;
            animation: lds-ellipsis2 0.6s infinite;
        }
        .lds-ellipsis div:nth-child(4) {
            left: 56px;
            animation: lds-ellipsis3 0.6s infinite;
        }
        @keyframes lds-ellipsis1 {
            0% {
                transform: scale(0);
            }
            100% {
                transform: scale(1);
            }
        }
        @keyframes lds-ellipsis3 {
            0% {
                transform: scale(1);
            }
            100% {
                transform: scale(0);
            }
        }
        @keyframes lds-ellipsis2 {
            0% {
                transform: translate(0, 0);
            }
            100% {
                transform: translate(24px, 0);
            }
        }
    </style>
</div>
<?php $this->beginBody() ?>
<!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->

<!-- Main Wrapper Start Here -->
<div class="wrapper" id="myApp">
    <!-- Newsletter Popup Start -->
    <!--<div class="popup_wrapper">
        <div class="test">
            <span class="popup_off">Закрыть</span>
            <div class="subscribe_area text-center mt-60">
                <h2>Подписка на рассылку</h2>
                <p>Для того чтобы получать оповещания о новых поступлениях, подпишитесь на рассылку.</p>
                <div class="subscribe-form-group">
                    <form action="#">
                        <input autocomplete="off" type="text" name="message" id="message" placeholder="Ваш Email">
                        <button type="submit">подписаться</button>
                    </form>
                </div>
                <div class="subscribe-bottom mt-15">
                    <input type="checkbox" id="newsletter-permission">
                    <label for="newsletter-permission">Не показывать больше это сообщение</label>
                </div>
            </div>
        </div>
    </div>-->
    <!-- Newsletter Popup End -->
    <!-- Main Header Area Start Here -->
    <header>
        <!-- Header Top Start Here -->
        <div class="header-top light-blue-bg">
            <div class="container">
                <div class="col-sm-12">
                    <div class="row justify-content-md-between justify-content-center">
                        <!-- Header Top Left Start -->
                        <div class="small-hidden header-top-left">
                            <ul>
                                <li><a href="/pay">Оплата</a></li>
                                <li><a href="/delivery">Доставка</a></li>
                                <li><a href="/guarantee">Гарантия</a></li>
                                <li><a href="/cooperation">Сотрудничество</a></li>
                                <li><a href="/purchase/returns">Возврат товара</a></li>
                            </ul>
                        </div>
                        <!-- Header Top Left End -->
                        <!-- Header Top Right Start -->
                        <div class="header-top-right">
                            <ul>
                                <?php if (Yii::$app->user->isGuest) { ?>
                                        <li><a href="/auth">Вход</a></li>
                                        <li><a href="/register">Регистрация</a></li>
                                <?php } else { ?>
                                    <li><a href="<?= Yii::$app->user->identity->getUrl()?>"><?= Yii::$app->user->identity->login?></a></li>
                                    <li><a href="/logout">Выход</a></li>
                                <?php } ?>
                            </ul>
                        </div>
                        <!-- Header Top Right End -->
                    </div>
                </div>
            </div>
            <!-- Container End -->
        </div>
        <!-- Header Top End Here -->
        <!-- Header Middle Start Here -->
        <div class="header-middle light-blue-bg ptb-35" style="background: #fff">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-12">
                        <div class="logo mb-all-30">
                            <a href="/" style="color: #fff;font-weight: bold;font-size: 30px;"><img src="/img/logo/logo.png" alt=""></a>
                        </div>
                    </div>
                    <!-- Categorie Search Box Start Here -->
                    <div class="col-lg-6 col-md-12">
                        <div class="categorie-search-box">
                            <?php $form = \yii\widgets\ActiveForm::begin(['action' => '/search', 'method' => 'get'])?>
                                <div class="form-group">
                                    <select class="bootstrap-select" name="cat_id">
                                        <?php $cat_id = Yii::$app->request->get('cat_id')?>
                                        <option value="0" <?= $cat_id == 0 ? 'selected' : ''?>>Все категории</option>
                                        <?php
                                            $cats = \app\models\Categories::find()->where(['parent_id' => 0])->all();
                                            foreach ($cats as $cat)  {
                                                $selected = '';
                                                if ($cat->id == $cat_id) {
                                                    $selected = ' selected';
                                                }
                                                echo "<option $selected value='".$cat->id."'>".$cat->name."</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                                <input type="text" value="<?= Yii::$app->request->get('search')?>" name="search" placeholder="Что ищем?">
                                <button type="submit"><i class="ion-ios-search"></i></button>
                            <?php \yii\widgets\ActiveForm::end();?>
                        </div>
                    </div>
                    <!-- Categorie Search Box End Here -->
                    <!-- Cart Box Start Here -->
                    <div class="col-lg-3 col-md-12">
                        <div class="cart-box mt-all-30">
                            <ul class="d-flex justify-content-lg-end justify-content-center align-items-center">
                                <li><a class="wish-list-item" href="#"><i class="ion-android-favorite-outline"></i></a></li>
                                <li id="cartApplication"><a href="#"><i class="ion-bag"></i><span class="total-pro">{{total}}</span><span class="my-cart"><span>корзина</span><span class="total-price">{{totalSumm}} RUB</span></span></a>
                                    <ul class="ht-dropdown cart-box-width">
                                        <li>
                                            <div class="single-cart-box" v-for="product in products">
                                                <div class="cart-img">
                                                    <a href="#"><img :src="product.img" alt="cart-image"></a>
                                                </div>
                                                <div class="cart-content">
                                                    <h6><a href="/">{{product.name}}</a></h6>
                                                    <span class="cart-price">{{product.price}} {{product.currency}}</span>
                                                    <span class="cart-product-total">
                                                        <input type="number" v-model="product.total">
                                                         шт.
                                                    </span>
                                                </div>
                                                <a class="del-icone" @click="removeProduct(product.id)"><i class="ion-close"></i></a>
                                            </div>
                                            <div class="cart-footer">
                                                <ul class="price-content">
                                                    <li>Всего товаров: <span>{{total}}</span></li>
                                                    <li>На сумму: <span>{{totalSumm}} RUB</span></li>
                                                </ul>
                                                <div class="cart-actions text-center">
                                                    <a class="cart-checkout" href="/checkout">Оформить заказ</a>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="small-hidden header-bottom dark-blue-bg header-sticky">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-9 col-lg-9 col-md-12 ">
                        <nav class="d-none d-lg-block">
                            <ul class="header-bottom-list d-flex">
                                <li><a href="/">Главная</a></li>
                                <li><a href="/products">Каталог товаров</a></li>
                                <li><a href="/service">Сервисный центр</a></li>
                                <!--<li><a href="shop.html">магазин<i class="fa fa-angle-down"></i></a>
                                    <ul class="ht-dropdown dropdown-style-two">
                                        <li><a href="product.html">страница товара</a></li>
                                        <li><a href="compare.html">сравнение товара</a></li>
                                        <li><a href="cart.html">корзина</a></li>
                                        <li><a href="checkout.html">заказ</a></li>
                                        <li><a href="wishlist.html">избранное</a></li>
                                    </ul>
                                </li>-->
                            </ul>
                        </nav>
                        <div class="mobile-menu d-block d-lg-none">
                            <nav>
                                <ul>
                                    <li><a href="/">главная</a></li>
                                    <li><a href=".зкщвгсеы">товары</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 text-right">
                        <span class="header-right"><i class="ion-ios-telephone"></i><span class="header-helpline"><a style="color: #fff" href="tel:83822255035">+7 (3822) 255-035</a></span></span>
                    </div>
                </div>
                <!-- Row End -->
            </div>
            <!-- Container End -->
        </div>
        <!-- Header Bottom End Here -->
    </header>
    <!-- Main Header Area End Here -->
    <?= $content?>
    <!-- Support Area Start Here -->
    <div class="support-area pb-45">
        <div class="container">
            <div class="col-sm-12">
                <div class="row justify-content-md-between justify-content-sm-start">
                    <div class="single-support d-flex align-items-center">
                        <div class="support-icon">
                            <i class="ion-android-time"></i>
                        </div>
                        <div class="support-desc">
                            <h6>Томск, ул. Иркутский тр-т, 37/в, оф. 301</h6>
                            <span>Пн-Пт: с 9:00-19:00</span>
                            <span>Сб-Вс: с 11:00-18:00</span>
                        </div>
                    </div>
                    <div class="single-support d-flex align-items-center">
                        <div class="support-icon">
                            <i class="ion-ios-telephone" ></i>
                        </div>
                        <div class="support-desc">
                            <h6>+7 (3822) 255-035</h6>
                            <span>Всегда на связи!</span>
                        </div>
                    </div>
                    <div class="single-support d-flex align-items-center">
                        <div class="support-icon">
                            <i class="ion-help-buoy"></i>
                        </div>
                        <div class="support-desc">
                            <h6>market@nextshop.pro</h6>
                            <span>Напишите нам!</span>
                        </div>
                    </div>
                </div>
                <!-- Row End -->
            </div>
        </div>
        <!-- Container End -->
    </div>
    <!-- Support Area End Here -->
    <!-- Signup Newsletter Start -->
    <!--<div class="newsletter light-blue-bg">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-6">
                    <div class="main-news-desc mb-all-30">
                        <div class="news-desc">
                            <h3>Подпишитесь на рассылку</h3>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-6">
                    <div class="newsletter-box">
                        <form action="#">
                            <input class="subscribe" placeholder="Ваш Email" name="email" id="subscribe" type="text">
                            <button type="submit" class="submit">подписаться!</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>-->
    <!-- Signup-Newsletter End -->
    <!-- Footer Area Start Here -->
    <footer class="white-bg pt-45">
        <!-- Footer Top Start -->
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <!-- Single Footer Start -->
                    <!--<div class="col-xl-2 col-lg-2 col-md-4 col-sm-6">
                        <div class="single-footer mb-sm-40">
                            <h3 class="footer-title">Карта сайта</h3>
                            <div class="footer-content">
                                <ul class="footer-list">
                                    <li><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="contact.html">4</a></li>
                                    <li><a href="account.html">5</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>-->
                    <!-- Single Footer Start -->
                    <!-- Single Footer Start -->
                    <!--<div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                        <div class="single-footer style-change mb-sm-40">
                            <h3 class="footer-title">Другое меню</h3>
                            <div class="footer-content">
                                <ul class="footer-list">
                                    <li><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="contact.html">4</a></li>
                                    <li><a href="account.html">5</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>-->
                    <!-- Single Footer Start -->
                    <!-- Single Footer Start -->
                    <!--<div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                        <div class="single-footer mb-sm-40">
                            <h3 class="footer-title">Еще меню</h3>
                            <div class="footer-content">
                                <ul class="footer-list">
                                    <li><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="contact.html">4</a></li>
                                    <li><a href="account.html">5</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>-->
                    <!-- Single Footer Start -->
                    <!-- Single Footer Start -->
                    <!--<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                        <div class="single-footer">
                            <div class="logo-footer">
                                <a href="index.html">NEXTSHOP.PRO</a>
                            </div>
                            <div class="footer-content">
                                <p>СЛОГАН</p>
                                <h5 class="contact-info mtb-10">СОЦ СЕТИ</h5>
                                <div class="social-footer-list mt-20">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-rss" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>-->
                    <!-- Single Footer Start -->
                </div>
                <!-- Row End -->
            </div>
            <!-- Container End -->
        </div>
        <!-- Footer Top End -->
        <!-- Footer Bottom Start -->
        <div class="footer-bottom off-white-bg ptb-25">
            <div class="container">
                <div class="col-sm-12">
                    <div class="row justify-content-md-between justify-content-center footer-bottom-content">
                        <p>2014-<?= date('Y')?> © NEXT — Интернет-магазин товаров и запчастей к вашим гаджетам.</p>
                        <div class="footer-bottom-nav mt-sm-15">
                            <nav>
                                <ul class="footer-nav-list">
                                    <li><a href="/">главная</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!-- Row End -->
                </div>
            </div>
            <!-- Container End -->
        </div>
        <!-- Footer Bottom End -->
    </footer>
    <!-- Footer Area End Here -->
</div>
<!-- Main Wrapper End Here -->
<?php $this->endBody() ?>
<script src="/js/shopApp.js"></script>
</body>
</html>
<?php $this->endPage() ?>
