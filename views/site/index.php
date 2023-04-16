<?php

/* @var $this yii\web\View */

use yii\db\Expression;

$this->title = 'Главная || Интернет-магазин nextshop.pro';
?>
<br><br>
<div class="hot-deal-products pb-45">
    <div class="container">
        <!-- Post Title Start -->
        <div class="post-title">
            <h2>Популярные товары</h2>
        </div>
        <!-- Post Title End -->
        <div class="row">
            <!-- Hot Deal Product Activation Start -->
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="main-hot-deal">
                    <!-- Hot Deal Product Active Start -->
                    <div class="hot-deal-active owl-carousel">
                        <?php $products = \app\models\Products::find()->where(['cat_id' => CAT_IDS])->orderBy(new Expression('rand()'))->limit(30)->all();?>
                        <?php foreach ($products as $product):?>
                            <div class="single-product">
                                <!-- Product Image Start -->
                                <div class="pro-img">
                                    <a href="/product/<?= $product->id?>">
                                        <img class="primary-img" src="<?= $product->getImage()?>" alt="single-product">
                                    </a>
                                    <!--<div class="countdown" data-countdown="2020/03/01"></div>-->
                                </div>
                                <div class="pro-content">
                                    <div class="pro-info">
                                        <h4><a href="/product/<?= $product->id?>"><?= $product->name?></a></h4>
                                        <p><span class="price"><?= $product->getPrice()?> <?= $product->getCurrency()?></span>
                                            <?php if ($product->getSale() > 1) {?><del class="prev-price"><?= $product->getOriginalPrice()?> <?= $product->getCurrency()?></del><?php }?>
                                        </p>
                                    </div>
                                    <div class="pro-actions">
                                        <div class="actions-primary">
                                            <a @click="addToCart(<?= $product->id?>)" title="В корзину">В корзину</a>
                                        </div>
                                        <div class="actions-secondary">
                                            <a href="/product/<?= $product->id?>" title="Детали"><i class="fa fa-signal"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach;?>
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
<div class="small-hidden main-page-banner ptb-30">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-4 d-none d-lg-block">
                <?php echo $this->render('_cats', [
                    'title' => 'Все категории',
                    'cats' => $cats,
                ])?>
            </div>
            <div class="col-xl-6 col-lg-8">
                <div class="slider-wrapper theme-default">
                    <!-- Slider Background  Image Start-->
                    <div id="slider" class="nivoSlider">
                        <a href="#"><img src="img/slider/1.jpg" data-thumb="img/slider/1.jpg" alt="" title="#htmlcaption" /></a>
                        <a href="#"><img src="img/slider/2.jpg" data-thumb="img/slider/2.jpg" alt="" title="#htmlcaption2" /></a>
                    </div>
                    <!-- Slider Background  Image Start-->
                    <div class="slider-progress"></div>
                </div>
            </div>
            <!-- Slider Area End Here -->
            <!-- Right Slider Banner Start Here -->
            <div class="col-xl-3 col-lg-12">
                <div class="right-sider-banner">
                    <img width="100%" src="/img/sidebar_banner_1.png" alt="">
                    <div id="vk_groups"></div>
                    <script type="text/javascript">
                        VK.Widgets.Group("vk_groups", {mode: 3, height: 250, color1: "FFFFFF", color2: "000000", color3: "5181B8"}, 77412021);
                    </script>
                    <p><b>Внимание!!! За подписку скидка 5%</b></p>
                </div>
            </div>
            <!-- Right Slider Banner End Here -->
        </div>
        <!-- Row End -->
    </div>
    <!-- Container End -->
</div>

<style>
    .pro-img {
        position: relative;
        width: 300px;
        height: 300px;
        overflow: hidden;
    }
</style>
