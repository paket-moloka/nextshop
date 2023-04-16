<?php

/*
 * @var $this yii\web\View
 * @var $product Products
 */

$this->title = $product->name;
$this->registerMetaTag(['name' => 'keywords', 'content' => 'купить, в Томске, '.$product->name]);
$this->registerMetaTag(['name' => 'description', 'content' => $product->meta_description]);
?>
<!-- Breadcrumb Start -->
<div class="breadcrumb-area mt-30">
    <div class="container">
        <div class="breadcrumb">
            <ul class="d-flex align-items-center">
                <li><a href="/">Главаня</a></li>
                <li><a href="/products">Товары</a></li>
                <li class="active"><a href="#"><?= $product->name?></a></li>
            </ul>
        </div>
    </div>
    <!-- Container End -->
</div>
<!-- Breadcrumb End -->
<!-- Product Thumbnail Start -->
<div class="main-product-thumbnail ptb-45">
    <div class="container">
        <div class="thumb-bg">
            <div class="row">
                <!-- Main Thumbnail Image Start -->
                <div class="col-lg-5 mb-all-40">
                    <!-- Thumbnail Large Image start -->
                    <div class="tab-content">
                        <?php
                            $i = 1;
                            foreach ($product->getImages() as $image) {
                                if ($i == 1) {
                        ?>
                                    <div id="thumb<?= $i?>" class="tab-pane fade show active">
                                        <a data-fancybox="images" href="<?= $image?>"><img src="<?= $image?>" alt="product-view"></a>
                                    </div>
                        <?php
                                } else {
                        ?>
                                    <div id="thumb<?= $i?>" class="tab-pane fade">
                                        <a data-fancybox="images" href="<?= $image?>"><img src="<?= $image?>" alt="product-view"></a>
                                    </div>
                        <?php
                                }
                                $i++;
                            }
                        ?>
                    </div>
                    <!-- Thumbnail Large Image End -->
                    <!-- Thumbnail Image End -->
                    <div class="product-thumbnail">
                        <div class="thumb-menu owl-carousel nav tabs-area" role="tablist">
                            <?php
                            $i = 1;
                            foreach ($product->getImages() as $image) {
                                if ($i == 1) {
                                    ?>
                                    <a class="active" data-toggle="tab" href="#thumb<?= $i?>"><img src="<?= $image?>" alt="product-thumbnail"></a>

                                    <?php
                                } else {
                                    ?>
                                    <a data-toggle="tab" href="#thumb<?= $i?>"><img src="<?= $image?>" alt="product-thumbnail"></a>
                                    <?php
                                }
                                $i++;
                            }
                            ?>
                        </div>
                    </div>
                    <!-- Thumbnail image end -->
                </div>
                <!-- Main Thumbnail Image End -->
                <!-- Thumbnail Description Start -->
                <div class="col-lg-7">
                    <div class="thubnail-desc fix">
                        <h3 class="product-header"><?= $product->name?></h3>
                        <div class="rating-summary fix mtb-10">
                            <div class="rating-feedback">
                                <!--<a href="#">(1 review)</a>-->
                                <a href="#">Добавить в избранное</a>
                            </div>
                        </div>
                        <div class="pro-price mtb-30">
                            <p class="d-flex align-items-center"><!--<span class="prev-price">16.51</span>--><span class="price"><?= $product->getPrice()?> <?= $product->getCurrency()?></span><!--<span class="saving-price">save 8%</span>--></p>
                        </div>
                        <p class="mb-20 pro-desc-details"><?= $product->summary?></p>
                        <div class="box-quantity d-flex">
                            <form action="#" id="quantityCart">
                                <input class="quantity mr-40" type="number" min="1" value="1">
                            </form>
                            <a class="add-cart" @click="addToCart(<?= $product->id?>, 'single')">в корзину</a>
                        </div>
                        <div class="pro-ref mt-15">
                            <p><span class="in-stock"><i class="ion-checkmark-round"></i> В КОРЗИНЕ</span></p>
                        </div>
                    </div>
                </div>
                <!-- Thumbnail Description End -->
            </div>
            <!-- Row End -->
        </div>
    </div>
    <!-- Container End -->
</div>
<!-- Product Thumbnail End -->
<!-- Product Thumbnail Description Start -->
<div class="thumnail-desc pb-45">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <ul class="main-thumb-desc nav tabs-area" role="tablist">
                    <li><a class="active" data-toggle="tab" href="#dtail">Описание товара</a></li>
                    <li><a data-toggle="tab" href="#prodFeatures">Характеристики</a></li>
                    <li><a data-toggle="tab" href="#review">Отзывы</a></li>
                </ul>
                <!-- Product Thumbnail Tab Content Start -->
                <div class="tab-content thumb-content border-default">
                    <div id="dtail" class="tab-pane fade show active">
                        <p><?= $product->description?></p>
                    </div>
                    <div id="prodFeatures" class="tab-pane fade">
                        <div class="review border-default universal-padding">
                            <?php foreach ($product->getFeatures() as $feature) { ?>
                                  <p><b><?= $feature['feature']->name?>: </b> <?= $feature['value']->value?></p>
                            <?php } ?>
                        </div>
                    </div>
                    <div id="review" class="tab-pane fade">
                        <!-- Reviews Start -->
                        <div class="review border-default universal-padding mt-30">
                            <p class="review-mini-title">Ваш отзыв</p>
                            <ul class="review-list">
                                <!-- Single Review List Start -->
                                <li>
                                    <span>Качество</span>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                </li>
                                <!-- Single Review List End -->
                                <!-- Single Review List Start -->
                                <li>
                                    <span>Цена</span>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                </li>
                                <!-- Single Review List End -->
                            </ul>
                            <!-- Reviews Field Start -->
                            <div class="riview-field mt-40">
                                <form autocomplete="off" action="#">
                                    <div class="form-group">
                                        <label class="req" for="sure-name">Имя</label>
                                        <input type="text" class="form-control" id="sure-name" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label class="req" for="subject">Email</label>
                                        <input type="text" class="form-control" id="subject" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label class="req" for="comments">Отзыв</label>
                                        <textarea class="form-control" rows="5" id="comments" required="required"></textarea>
                                    </div>
                                    <button type="submit" class="customer-btn">Отправить отзыв</button>
                                </form>
                            </div>
                            <!-- Reviews Field Start -->
                        </div>
                        <!-- Reviews End -->
                    </div>
                </div>
                <!-- Product Thumbnail Tab Content End -->
            </div>
        </div>
        <!-- Row End -->
    </div>
    <!-- Container End -->
</div>
<!-- Product Thumbnail Description End -->
<!-- Realted Products Start Here -->
<div class="second-featured-products related-pro pb-45">
    <div class="container">
        <!-- Post Title Start -->
        <div class="post-title">
            <h2><i class="fa fa-trophy" aria-hidden="true"></i>Похожие товары</h2>
        </div>
        <!-- Post Title End -->
        <!-- New Pro Tow Activation Start -->
        <div class="featured-pro-active owl-carousel">
            <?php $product = \app\models\Products::findOne(TEMP_PRODUCT_ID);?>
            <?php
                for ($i = 0; $i <= 10; $i++) {
                    ?>
                    <!-- Single Product Start -->
                    <div class="single-product">
                        <!-- Product Image Start -->
                        <div class="pro-img">
                            <a href="/product/<?= $product->id?>">
                                <img class="primary-img" src="<?= $product->getImage()?>" alt="single-product">
                            </a>
                            <span class="sticker-new">новый</span>
                        </div>
                        <!-- Product Image End -->
                        <!-- Product Content Start -->
                        <div class="pro-content">
                            <div class="pro-info">
                                <h4><a href="/product/<?= $product->id?>"><?= $product->name?></a></h4>

                                <p><span class="price"><?= $product->getPrice()?> <?= $product->getCurrency()?></span></p>
                            </div>
                            <div class="pro-actions">
                                <div class="actions-primary">
                                    <a href="#" title="Добавть в корзину">Добавть в корзину</a>
                                </div>
                                <div class="actions-secondary">
                                    <a href="/product/<?= $product->id?>" title="Подробнее"><i class="fa fa-signal"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- Product Content End -->
                    </div>
                    <!-- Single Product End -->
                    <?php
                }
            ?>

        </div>
        <!-- New Pro Tow Activation End -->
    </div>
    <!-- Container End -->
</div>
<!-- Realated Products End Here -->