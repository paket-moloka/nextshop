<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>
<!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->

<!-- Main Wrapper Start Here -->
<div class="wrapper">
    <!-- Newsletter Popup Start -->
    <div class="popup_wrapper">
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
    </div>
    <!-- Newsletter Popup End -->
    <!-- Main Header Area Start Here -->
    <header>
        <!-- Header Top Start Here -->
        <div class="header-top light-blue-bg">
            <div class="container">
                <div class="col-sm-12">
                    <div class="row justify-content-md-between justify-content-center">
                        <!-- Header Top Left Start -->
                        <div class="header-top-left">
                            <ul>

                            </ul>
                        </div>
                        <!-- Header Top Left End -->
                        <!-- Header Top Right Start -->
                        <div class="header-top-right">
                            <ul>
                                <li><a href="account.html">Мой аккаунт</a></li>
                                <li><a href="checkout.html">Заказ</a></li>
                                <li><a href="login.html">Вход / Регистрация</a></li>
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
        <div class="header-middle light-blue-bg ptb-35">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-12">
                        <div class="logo mb-all-30">
                            <a href="index.html" style="color: #fff;font-weight: bold;font-size: 30px;">NEXTSHOP.PRO</a>
                        </div>
                    </div>
                    <!-- Categorie Search Box Start Here -->
                    <div class="col-lg-6 col-md-12">
                        <div class="categorie-search-box">
                            <form action="#">
                                <div class="form-group">
                                    <select class="bootstrap-select" name="poscats">
                                        <option value="0">Все категории</option>
                                        <option value="2">Смартфоны</option>
                                        <option value="3">Apple</option>
                                    </select>
                                </div>
                                <input type="text" name="search" placeholder="Что ищем?">
                                <button><i class="ion-ios-search"></i></button>
                            </form>
                        </div>
                    </div>
                    <!-- Categorie Search Box End Here -->
                    <!-- Cart Box Start Here -->
                    <div class="col-lg-3 col-md-12">
                        <div class="cart-box mt-all-30">
                            <ul class="d-flex justify-content-lg-end justify-content-center align-items-center">
                                <li><a class="wish-list-item" href="wishlist.html"><i class="ion-android-favorite-outline"></i></a></li>
                                <li><a href="#"><i class="ion-bag"></i><span class="total-pro">2</span><span class="my-cart"><span>корзина</span><span class="total-price">100 р.</span></span></a>
                                    <ul class="ht-dropdown cart-box-width">
                                        <li>
                                            <!-- Cart Box Start -->
                                            <div class="single-cart-box">
                                                <div class="cart-img">
                                                    <a href="#"><img src="img/products/1.jpg" alt="cart-image"></a>
                                                    <span class="pro-quantity">1X</span>
                                                </div>
                                                <div class="cart-content">
                                                    <h6><a href="product.html">Принтер </a></h6>
                                                    <span class="cart-price">50р.</span>
                                                </div>
                                                <a class="del-icone" href="#"><i class="ion-close"></i></a>
                                            </div>
                                            <!-- Cart Box End -->
                                            <!-- Cart Box Start -->
                                            <div class="single-cart-box">
                                                <div class="cart-img">
                                                    <a href="#"><img src="img/products/1.jpg" alt="cart-image"></a>
                                                    <span class="pro-quantity">1X</span>
                                                </div>
                                                <div class="cart-content">
                                                    <h6><a href="product.html">Принтер </a></h6>
                                                    <span class="cart-price">50р.</span>
                                                </div>
                                                <a class="del-icone" href="#"><i class="ion-close"></i></a>
                                            </div>
                                            <!-- Cart Box End -->
                                            <!-- Cart Footer Inner Start -->
                                            <div class="cart-footer">
                                                <ul class="price-content">

                                                    <li>Total <span>100р.</span></li>
                                                </ul>
                                                <div class="cart-actions text-center">
                                                    <a class="cart-checkout" href="checkout.html">Заказать</a>
                                                </div>
                                            </div>
                                            <!-- Cart Footer Inner End -->
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Cart Box End Here -->
                </div>
                <!-- Row End -->
            </div>
            <!-- Container End -->
        </div>
        <!-- Header Middle End Here -->
        <!-- Header Bottom Start Here -->
        <div class="header-bottom dark-blue-bg header-sticky">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-9 col-lg-9 col-md-12 ">
                        <nav class="d-none d-lg-block">
                            <ul class="header-bottom-list d-flex">
                                <li class="active"><a href="index.html">Главная</a></li>
                                <li class="active"><a href="service.html">Сервисный центр</a></li>
                                <li><a href="shop.html">магазин<i class="fa fa-angle-down"></i></a>
                                    <!-- Home Version Dropdown Start -->
                                    <ul class="ht-dropdown dropdown-style-two">
                                        <li><a href="product.html">страница товара</a></li>
                                        <li><a href="compare.html">сравнение товара</a></li>
                                        <li><a href="cart.html">корзина</a></li>
                                        <li><a href="checkout.html">заказ</a></li>
                                        <li><a href="wishlist.html">избранное</a></li>
                                    </ul>
                                    <!-- Home Version Dropdown End -->
                                </li>
                                <li><a href="blog.html">статьи<i class="fa fa-angle-down"></i></a>
                                    <!-- Home Version Dropdown Start -->
                                    <ul class="ht-dropdown dropdown-style-two">
                                        <li><a href="single-blog.html">статья детально</a></li>
                                    </ul>
                                    <!-- Home Version Dropdown End -->
                                </li>
                                <li><a href="#">страницы<i class="fa fa-angle-down"></i></a>
                                    <!-- Home Version Dropdown Start -->
                                    <ul class="ht-dropdown dropdown-style-two">
                                        <li><a href="contact.html">контакты</a></li>
                                        <li><a href="register.html">регистрация</a></li>
                                        <li><a href="login.html">авторизация</a></li>
                                        <li><a href="forgot-password.html">восстановление пароля</a></li>
                                        <li><a href="404.html">404</a></li>
                                    </ul>
                                    <!-- Home Version Dropdown End -->
                                </li>
                                <li><a href="about.html">о нас</a></li>
                            </ul>
                        </nav>
                        <div class="mobile-menu d-block d-lg-none">
                            <nav>
                                <ul>
                                    <li><a href="index.html">главная</a></li>
                                    <li><a href="shop.html">магазин</a>
                                        <!-- Mobile Menu Dropdown Start -->
                                        <ul>
                                            <li><a href="product.html">страница товара</a></li>
                                            <li><a href="compare.html">сравнение</a></li>
                                            <li><a href="cart.html">корзина</a></li>
                                            <li><a href="checkout.html">заказ</a></li>
                                            <li><a href="wishlist.html">избранное</a></li>
                                        </ul>
                                        <!-- Mobile Menu Dropdown End -->
                                    </li>
                                    <li><a href="blog.html">блог</a>
                                        <!-- Mobile Menu Dropdown Start -->
                                        <ul>
                                            <li><a href="single-blog.html">детали</a></li>
                                        </ul>
                                        <!-- Mobile Menu Dropdown End -->
                                    </li>
                                    <li><a href="#">страницы</a>
                                        <!-- Mobile Menu Dropdown Start -->
                                        <ul>
                                            <li><a href="register.html">регистрация</a></li>
                                            <li><a href="login.html">авторизация</a></li>
                                            <li><a href="forgot-password.html">посстановить пароль</a></li>
                                            <li><a href="404.html">404</a></li>
                                        </ul>
                                        <!-- Mobile Menu Dropdown End -->
                                    </li>
                                    <li><a href="about.html">о нас</a></li>
                                    <li><a href="contact.html">контакты</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 text-right">
                        <span class="header-right"><i class="ion-ios-telephone"></i>Горячая линия: <span class="header-helpline">+7777 777 77 77</span></span>
                    </div>
                </div>
                <!-- Row End -->
            </div>
            <!-- Container End -->
        </div>
        <!-- Header Bottom End Here -->
        <!-- Mobile Vertical Menu Start Here -->
        <div class="container d-block d-lg-none">
            <div class="vertical-menu mt-30">
                <span class="categorie-title mobile-categorei-menu">Все категории <i class="fa fa-angle-down"></i></span>
                <nav>
                    <div id="cate-mobile-toggle" class="category-menu sidebar-menu sidbar-style mobile-categorei-menu-list menu-hidden ">
                        <ul>
                            <li class="has-sub"><a href="#">Электроника</a></li>
                            <li class="has-sub"><a href="#">Телефоны и планшеты</a>
                                <ul class="category-sub">
                                    <li><a href="shop.html">Телефон 1</a></li>
                                    <li><a href="shop.html">Планшет 1</a></li>
                                    <li><a href="shop.html">Телефон 2</a></li>
                                    <li><a href="shop.html">Телефон 3</a></li>
                                </ul>
                                <!-- category submenu end-->
                            </li>
                        </ul>
                    </div>
                    <!-- category-menu-end -->
                </nav>
            </div>
        </div>
        <!-- Mobile Vertical Menu Start End -->
    </header>
    <!-- Main Header Area End Here -->
    <!-- Categorie Menu & Slider Area Start Here -->
    <div class="main-page-banner ptb-30">
        <div class="container">
            <div class="row">
                <!-- Vertical Menu Start Here -->
                <div class="col-xl-3 col-lg-4 d-none d-lg-block">
                    <div class="vertical-menu mb-all-30">
                        <span class="categorie-title">Все категории <i class="fa fa-angle-down"></i></span>
                        <nav>
                            <ul class="vertical-menu-list">
                                <li><a href="shop.html"><span><img src="img/vertical-menu/1.png" alt="menu-icon"></span>Электроника</a></li>
                                <li><a href="shop.html"><span><img src="img/vertical-menu/4.png" alt="menu-icon"></span>Телефоны и планшеты<i class="fa fa-angle-right" aria-hidden="true"></i>
                                    </a>
                                    <!-- Vertical Mega-Menu Start -->
                                    <ul class="ht-dropdown megamenu megamenu-two">
                                        <!-- Single Column Start -->
                                        <li class="single-megamenu">
                                            <ul>
                                                <li class="menu-tile">Планшеты</li>
                                                <li><a href="shop.html">Планшет 1</a></li>
                                                <li><a href="shop.html">Планшет 2</a></li>
                                                <li><a href="shop.html">Планшет 3</a></li>
                                                <li><a href="shop.html">Планшет 4</a></li>
                                            </ul>
                                        </li>
                                        <!-- Single Column End -->
                                        <!-- Single Column Start -->
                                        <li class="single-megamenu">
                                            <ul>
                                                <li class="menu-tile">Смартфон</li>
                                                <li><a href="shop.html">Смартфон 1</a></li>
                                                <li><a href="shop.html">Смартфон 2</a></li>
                                                <li><a href="shop.html">Смартфон 3</a></li>
                                                <li><a href="shop.html">Смартфон 4</a></li>
                                            </ul>
                                        </li>
                                        <!-- Single Column End -->
                                    </ul>
                                    <!-- Vertical Mega-Menu End -->
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- Vertical Menu End Here -->
                <!-- Slider Area Start Here -->
                <div class="col-xl-6 col-lg-8">
                    <div class="slider-wrapper theme-default">
                        <!-- Slider Background  Image Start-->
                        <div id="slider" class="nivoSlider">
                            <a href="shop.html"><img src="img/slider/1.jpg" data-thumb="img/slider/1.jpg" alt="" title="#htmlcaption" /></a>
                            <a href="shop.html"><img src="img/slider/2.jpg" data-thumb="img/slider/2.jpg" alt="" title="#htmlcaption2" /></a>
                        </div>
                        <!-- Slider Background  Image Start-->
                        <div class="slider-progress"></div>
                    </div>
                </div>
                <!-- Slider Area End Here -->
                <!-- Right Slider Banner Start Here -->
                <div class="col-xl-3 col-lg-12">
                    <div class="right-sider-banner">
                        <div class="single-banner">
                            <a href="shop.html"><img src="img/banner/1.jpg" alt=""></a>
                        </div>
                        <div class="single-banner">
                            <a href="shop.html"><img src="img/banner/2.jpg" alt=""></a>
                        </div>
                        <div class="single-banner">
                            <a href="shop.html"><img src="img/banner/3.jpg" alt=""></a>
                        </div>
                    </div>
                </div>
                <!-- Right Slider Banner End Here -->
            </div>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </div>
    <!-- Categorie Menu & Slider Area End Here -->
    <!-- Brand Banner Area Start Here -->
    <div class="main-brand-banner pb-30">
        <div class="container">
            <!-- Brand Banner Start -->
            <div class="brand-banner owl-carousel">
                <div class="single-brand">
                    <a href="#"><img class="img" src="img/brand/1.jpg" alt="brand-image"></a>
                </div>
                <div class="single-brand">
                    <a href="#"><img src="img/brand/2.jpg" alt="brand-image"></a>
                </div>
                <div class="single-brand">
                    <a href="#"><img src="img/brand/3.jpg" alt="brand-image"></a>
                </div>
                <div class="single-brand">
                    <a href="#"><img src="img/brand/4.jpg" alt="brand-image"></a>
                </div>
                <div class="single-brand">
                    <a href="#"><img src="img/brand/5.jpg" alt="brand-image"></a>
                </div>
                <div class="single-brand">
                    <a href="#"><img src="img/brand/6.jpg" alt="brand-image"></a>
                </div>
                <div class="single-brand">
                    <a href="#"><img src="img/brand/7.jpg" alt="brand-image"></a>
                </div>
            </div>
            <!-- Brand Banner End -->
        </div>
        <!-- Container End -->
    </div>
    <!-- Brand Banner Area End Here -->
    <!-- Hot Deal Products Start Here -->
    <div class="hot-deal-products pb-45">
        <div class="container">
            <!-- Post Title Start -->
            <div class="post-title">
                <h2>ГОРЯЧИЕ СДЕЛКИ</h2>
            </div>
            <!-- Post Title End -->
            <div class="row">
                <!-- Hot Deal Left Banner Start -->
                <div class="col-xl-3 col-lg-4 col-md-5">
                    <div class="single-banner">
                        <a href="shop.html"><img src="img/banner/4.jpg" alt=""></a>
                    </div>
                </div>
                <!-- Hot Deal Left Banner End -->
                <!-- Hot Deal Product Activation Start -->
                <div class="col-xl-9 col-lg-8 col-md-7">
                    <div class="main-hot-deal">
                        <!-- Hot Deal Product Active Start -->
                        <div class="hot-deal-active owl-carousel">
                            <!-- Single Product Start -->
                            <div class="single-product">
                                <!-- Product Image Start -->
                                <div class="pro-img">
                                    <a href="product.html">
                                        <img class="primary-img" src="img/products/1.jpg" alt="single-product">
                                        <img class="secondary-img" src="img/products/7.jpg" alt="single-product">
                                    </a>
                                    <div class="countdown" data-countdown="2020/03/01"></div>
                                </div>
                                <!-- Product Image End -->
                                <!-- Product Content Start -->
                                <div class="pro-content">
                                    <div class="pro-info">
                                        <h4><a href="product.html">дисплей Apple iPhone 6</a></h4>
                                        <div class="product-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <p><span class="price">1000р.</span><del class="prev-price">1200р.</del></p>
                                    </div>
                                    <div class="pro-actions">
                                        <div class="actions-primary">
                                            <a href="cart.html" title="В корзину">В корзину</a>
                                        </div>
                                        <div class="actions-secondary">
                                            <a href="#" data-toggle="modal" data-target="#myModal" title="Быстрый просмотр"><i class="fa fa-heart-o"></i></a>
                                            <a href="product.html" title="Детали"><i class="fa fa-signal"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product Content End -->
                                <span class="sticker-new">новый</span>
                                <span class="sticker-sale">-10%</span>
                            </div>
                            <!-- Single Product End -->
                            <!-- Single Product Start -->
                            <div class="single-product">
                                <!-- Product Image Start -->
                                <div class="pro-img">
                                    <a href="product.html">
                                        <img class="primary-img" src="img/products/1.jpg" alt="single-product">
                                        <img class="secondary-img" src="img/products/7.jpg" alt="single-product">
                                    </a>
                                    <div class="countdown" data-countdown="2020/03/01"></div>
                                </div>
                                <!-- Product Image End -->
                                <!-- Product Content Start -->
                                <div class="pro-content">
                                    <div class="pro-info">
                                        <h4><a href="product.html">дисплей Apple iPhone 6</a></h4>
                                        <div class="product-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <p><span class="price">1000р.</span><del class="prev-price">1200р.</del></p>
                                    </div>
                                    <div class="pro-actions">
                                        <div class="actions-primary">
                                            <a href="cart.html" title="В корзину">В корзину</a>
                                        </div>
                                        <div class="actions-secondary">
                                            <a href="#" data-toggle="modal" data-target="#myModal" title="Быстрый просмотр"><i class="fa fa-heart-o"></i></a>
                                            <a href="product.html" title="Детали"><i class="fa fa-signal"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product Content End -->
                                <span class="sticker-new">новый</span>
                                <span class="sticker-sale">-10%</span>
                            </div>
                            <!-- Single Product End -->
                            <!-- Single Product Start -->
                            <div class="single-product">
                                <!-- Product Image Start -->
                                <div class="pro-img">
                                    <a href="product.html">
                                        <img class="primary-img" src="img/products/1.jpg" alt="single-product">
                                        <img class="secondary-img" src="img/products/7.jpg" alt="single-product">
                                    </a>
                                    <div class="countdown" data-countdown="2020/03/01"></div>
                                </div>
                                <!-- Product Image End -->
                                <!-- Product Content Start -->
                                <div class="pro-content">
                                    <div class="pro-info">
                                        <h4><a href="product.html">дисплей Apple iPhone 6</a></h4>
                                        <div class="product-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <p><span class="price">1000р.</span><del class="prev-price">1200р.</del></p>
                                    </div>
                                    <div class="pro-actions">
                                        <div class="actions-primary">
                                            <a href="cart.html" title="В корзину">В корзину</a>
                                        </div>
                                        <div class="actions-secondary">
                                            <a href="#" data-toggle="modal" data-target="#myModal" title="Быстрый просмотр"><i class="fa fa-heart-o"></i></a>
                                            <a href="product.html" title="Детали"><i class="fa fa-signal"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product Content End -->
                                <span class="sticker-new">новый</span>
                                <span class="sticker-sale">-10%</span>
                            </div>
                            <!-- Single Product End -->
                            <!-- Single Product Start -->
                            <div class="single-product">
                                <!-- Product Image Start -->
                                <div class="pro-img">
                                    <a href="product.html">
                                        <img class="primary-img" src="img/products/1.jpg" alt="single-product">
                                        <img class="secondary-img" src="img/products/7.jpg" alt="single-product">
                                    </a>
                                    <div class="countdown" data-countdown="2020/03/01"></div>
                                </div>
                                <!-- Product Image End -->
                                <!-- Product Content Start -->
                                <div class="pro-content">
                                    <div class="pro-info">
                                        <h4><a href="product.html">дисплей Apple iPhone 6</a></h4>
                                        <div class="product-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <p><span class="price">1000р.</span><del class="prev-price">1200р.</del></p>
                                    </div>
                                    <div class="pro-actions">
                                        <div class="actions-primary">
                                            <a href="cart.html" title="В корзину">В корзину</a>
                                        </div>
                                        <div class="actions-secondary">
                                            <a href="#" data-toggle="modal" data-target="#myModal" title="Быстрый просмотр"><i class="fa fa-heart-o"></i></a>
                                            <a href="product.html" title="Детали"><i class="fa fa-signal"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product Content End -->
                                <span class="sticker-new">новый</span>
                                <span class="sticker-sale">-10%</span>
                            </div>
                            <!-- Single Product End -->
                            <!-- Single Product Start -->
                            <div class="single-product">
                                <!-- Product Image Start -->
                                <div class="pro-img">
                                    <a href="product.html">
                                        <img class="primary-img" src="img/products/1.jpg" alt="single-product">
                                        <img class="secondary-img" src="img/products/7.jpg" alt="single-product">
                                    </a>
                                    <div class="countdown" data-countdown="2020/03/01"></div>
                                </div>
                                <!-- Product Image End -->
                                <!-- Product Content Start -->
                                <div class="pro-content">
                                    <div class="pro-info">
                                        <h4><a href="product.html">дисплей Apple iPhone 6</a></h4>
                                        <div class="product-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <p><span class="price">1000р.</span><del class="prev-price">1200р.</del></p>
                                    </div>
                                    <div class="pro-actions">
                                        <div class="actions-primary">
                                            <a href="cart.html" title="В корзину">В корзину</a>
                                        </div>
                                        <div class="actions-secondary">
                                            <a href="#" data-toggle="modal" data-target="#myModal" title="Быстрый просмотр"><i class="fa fa-heart-o"></i></a>
                                            <a href="product.html" title="Детали"><i class="fa fa-signal"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product Content End -->
                                <span class="sticker-new">новый</span>
                                <span class="sticker-sale">-10%</span>
                            </div>
                            <!-- Single Product End -->
                        </div>
                        <!-- Hot Deal Product Active End -->
                    </div>
                </div>
                <!-- Hot Deal Product Activation End -->
            </div>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </div>
    <!-- Hot Deal Products End Here -->
    <!-- Big Banner Start Here -->
    <div class="big-banner pb-45">
        <div class="container">
            <div class="single-banner">
                <img src="img/banner/5.jpg" alt="">
            </div>
        </div>
        <!-- Container End -->
    </div>
    <!-- Big Banner End Here -->
    <!-- Second Electronics Products Area Start Here -->
    <div class="second-electronics-product pb-45">
        <div class="container">
            <div class="row">
                <!-- Electronics Banner Start -->
                <div class="col-xl-3 col-lg-4 col-md-5">
                    <!-- Post Title Start -->
                    <div class="post-title">
                        <h2><i class="ion-ios-game-controller-b-outline"></i>электроника</h2>
                    </div>
                    <!-- Post Title End -->
                    <div class="single-banner">
                        <a href="shop.html"><img src="img/banner/8.jpg" alt=""></a>
                    </div>
                </div>
                <!-- Electronics Banner End -->
                <div class="col-xl-9 col-lg-8 col-md-7">
                    <div class="main-product-tab-area">
                        <!-- Nav tabs -->
                        <ul class="nav tabs-area" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#cameras">Камеры</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#g-pad">Смартфоны</a>
                            </li>
                        </ul>
                        <!-- Tab Contetn Start -->
                        <div class="tab-content">
                            <div id="cameras" class="tab-pane fade show active">
                                <!-- Electronics Product Activation Start Here -->
                                <div class="electronics-pro-active owl-carousel">
                                    <!-- Double Product Start -->
                                    <div class="double-product">
                                        <!-- Single Product Start -->
                                        <div class="single-product">
                                            <!-- Product Image Start -->
                                            <div class="pro-img">
                                                <a href="product.html">
                                                    <img class="primary-img" src="img/products/8.jpg" alt="single-product">
                                                    <img class="secondary-img" src="img/products/7.jpg" alt="single-product">
                                                </a>
                                                <span class="sticker-new">new</span>
                                            </div>
                                            <!-- Product Image End -->
                                            <!-- Product Content Start -->
                                            <div class="pro-content">
                                                <h4><a href="product.html">1</a></h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <p><span class="price">100р.</span></p>
                                                <div class="pro-actions">
                                                    <div class="actions-primary">
                                                        <a href="cart.html" title="В корзину">В корзину</a>
                                                    </div>
                                                    <div class="actions-secondary">
                                                        <a href="#" data-toggle="modal" data-target="#myModal" title="Быстрый просмотр"><i class="fa fa-heart-o"></i></a>
                                                        <a href="product.html" title="детально"><i class="fa fa-signal"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Product Content End -->
                                        </div>
                                        <!-- Single Product End -->
                                    </div>
                                    <!-- Double Product End -->
                                </div>
                                <!-- Electronics Product Activation End Here -->
                            </div>
                            <!-- #cameras End Here -->
                            <div id="g-pad" class="tab-pane fade">
                                <!-- Electronics Product Activation Start Here -->
                                <div class="electronics-pro-active owl-carousel">
                                    <!-- Double Product Start -->
                                    <div class="double-product">
                                        <!-- Single Product Start -->
                                        <div class="single-product">
                                            <!-- Product Image Start -->
                                            <div class="pro-img">
                                                <a href="product.html">
                                                    <img class="primary-img" src="img/products/8.jpg" alt="single-product">
                                                    <img class="secondary-img" src="img/products/7.jpg" alt="single-product">
                                                </a>
                                                <span class="sticker-new">new</span>
                                            </div>
                                            <!-- Product Image End -->
                                            <!-- Product Content Start -->
                                            <div class="pro-content">
                                                <h4><a href="product.html">1</a></h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <p><span class="price">100р.</span></p>
                                                <div class="pro-actions">
                                                    <div class="actions-primary">
                                                        <a href="cart.html" title="В корзину">В корзину</a>
                                                    </div>
                                                    <div class="actions-secondary">
                                                        <a href="#" data-toggle="modal" data-target="#myModal" title="Быстрый просмотр"><i class="fa fa-heart-o"></i></a>
                                                        <a href="product.html" title="детально"><i class="fa fa-signal"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Product Content End -->
                                        </div>
                                        <!-- Single Product End -->
                                    </div>
                                    <!-- Double Product End -->
                                    <!-- Double Product Start -->
                                </div>
                                <!-- Electronics Product Activation End Here -->
                            </div>
                        </div>
                        <!-- Tab Content End -->
                    </div>
                    <!-- main-product-tab-area-->
                </div>
            </div>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </div>
    <!-- Second Electronics Products Area End Here -->
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
                            <h6>ПН - ВС / 8:00 - 18:00</h6>
                            <span>Работаем без выходных!</span>
                        </div>
                    </div>
                    <div class="single-support d-flex align-items-center">
                        <div class="support-icon">
                            <i class="ion-ios-telephone" ></i>
                        </div>
                        <div class="support-desc">
                            <h6>+77777777777</h6>
                            <span>Всегда на связи!</span>
                        </div>
                    </div>
                    <div class="single-support d-flex align-items-center">
                        <div class="support-icon">
                            <i class="ion-help-buoy"></i>
                        </div>
                        <div class="support-desc">
                            <h6>Support@nextshop.pro</h6>
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
    <div class="newsletter light-blue-bg">
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
    </div>
    <!-- Signup-Newsletter End -->
    <!-- Footer Area Start Here -->
    <footer class="white-bg pt-45">
        <!-- Footer Top Start -->
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <!-- Single Footer Start -->
                    <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6">
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
                    </div>
                    <!-- Single Footer Start -->
                    <!-- Single Footer Start -->
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
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
                    </div>
                    <!-- Single Footer Start -->
                    <!-- Single Footer Start -->
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
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
                    </div>
                    <!-- Single Footer Start -->
                    <!-- Single Footer Start -->
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
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
                    </div>
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
                        <p>Copyright © <a target="_blank" href="#">vladimir22092012@mail.ru</a> Все права защищены.</p>
                        <div class="footer-bottom-nav mt-sm-15">
                            <nav>
                                <ul class="footer-nav-list">
                                    <li><a href="index.html">главная</a></li>
                                    <li><a href="about.html">о нас</a></li>
                                    <li><a href="shop.html">магазин</a></li>
                                    <li><a href="contact.html">контакты</a></li>
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
    <!-- Quick View Content Start -->
    <div class="main-product-thumbnail quick-thumb-content">
        <div class="container">
            <!-- The Modal -->
            <div class="modal fade" id="myModal">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class="row">
                                <!-- Main Thumbnail Image Start -->
                                <div class="col-lg-5 col-md-6 col-sm-5">
                                    <!-- Thumbnail Large Image start -->
                                    <div class="tab-content">
                                        <div id="thumb1" class="tab-pane fade show active">
                                            <a data-fancybox="images" href="img/products/35.jpg"><img src="img/products/35.jpg" alt="product-view"></a>
                                        </div>
                                        <div id="thumb2" class="tab-pane fade">
                                            <a data-fancybox="images" href="img/products/13.jpg"><img src="img/products/13.jpg" alt="product-view"></a>
                                        </div>
                                        <div id="thumb3" class="tab-pane fade">
                                            <a data-fancybox="images" href="img/products/15.jpg"><img src="img/products/15.jpg" alt="product-view"></a>
                                        </div>
                                        <div id="thumb4" class="tab-pane fade">
                                            <a data-fancybox="images" href="img/products/4.jpg"><img src="img/products/4.jpg" alt="product-view"></a>
                                        </div>
                                        <div id="thumb5" class="tab-pane fade">
                                            <a data-fancybox="images" href="img/products/5.jpg"><img src="img/products/5.jpg" alt="product-view"></a>
                                        </div>
                                    </div>
                                    <!-- Thumbnail Large Image End -->
                                    <!-- Thumbnail Image End -->
                                    <div class="product-thumbnail">
                                        <div class="thumb-menu owl-carousel nav tabs-area" role="tablist">
                                            <a class="active" data-toggle="tab" href="#thumb1"><img src="img/products/35.jpg" alt="product-thumbnail"></a>
                                            <a data-toggle="tab" href="#thumb2"><img src="img/products/13.jpg" alt="product-thumbnail"></a>
                                            <a data-toggle="tab" href="#thumb3"><img src="img/products/15.jpg" alt="product-thumbnail"></a>
                                            <a data-toggle="tab" href="#thumb4"><img src="img/products/4.jpg" alt="product-thumbnail"></a>
                                            <a data-toggle="tab" href="#thumb5"><img src="img/products/5.jpg" alt="product-thumbnail"></a>
                                        </div>
                                    </div>
                                    <!-- Thumbnail image end -->
                                </div>
                                <!-- Main Thumbnail Image End -->
                                <!-- Thumbnail Description Start -->
                                <div class="col-lg-7 col-md-6 col-sm-7">
                                    <div class="thubnail-desc fix mt-sm-40">
                                        <h3 class="product-header">1</h3>
                                        <div class="pro-price mtb-30">
                                            <p class="d-flex align-items-center"><span class="prev-price">16.51</span><span class="price">100р.</span><span class="saving-price">скидка 8%</span></p>
                                        </div>
                                        <p class="mb-20 pro-desc-details">Описание</p>
                                        <div class="box-quantity d-flex">
                                            <form action="#">
                                                <input class="quantity mr-40" type="number" min="1" value="1">
                                            </form>
                                            <a class="add-cart" href="cart.html">добавить в корзину</a>
                                        </div>
                                        <div class="pro-ref mt-15">
                                            <p><span class="in-stock"><i class="ion-checkmark-round"></i> ОТЛИЧНЫЙ ВЫБОР</span></p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Thumbnail Description End -->
                            </div>
                        </div>
                        <!-- Modal footer -->
                        <div class="custom-footer">
                            <div class="socila-sharing">
                                <ul class="d-flex">
                                    <li>поделится</li>
                                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus-official" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Quick View Content End -->
</div>
<!-- Main Wrapper End Here -->