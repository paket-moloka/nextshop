<?php
use app\models\Images;
/* @var $this yii\web\View */

$this->title = $mainCat->meta_title;
$this->registerMetaTag(['name' => 'keywords', 'content' => $mainCat->meta_keywords]);
$this->registerMetaTag(['name' => 'description', 'content' => $mainCat->meta_description]);
?>
<div class="breadcrumb-area mt-30">
    <div class="container">
        <div class="breadcrumb">
            <ul class="d-flex align-items-center">
                <li><a href="/">Главаня</a></li>
                <li><a href="/products">Товары</a></li>
                <?php
                    try{
                        if ($mainCat instanceof \app\models\Categories && $parent = $mainCat->getParent()) {
                            if ($parent->getParent()) {
                                ?>
                                <li><a href="/products/<?=$parent->getParent()->id?>"><?= $parent->getParent()->name?></a></li>
                                <li><a href="/products/<?=$parent->id?>"><?= $parent->name?></a></li>
                                <?php
                            } else {
                                ?>
                                <li><a href="/products/<?=$mainCat->getParent()->id?>"><?= $mainCat->getParent()->name?></a></li>
                                <?php
                            }
                        }
                    } catch (Exception $exception) {}
                ?>
                <li class="active"><a href="#"><?= $mainCat->name?></a></li>
            </ul>
        </div>
    </div>
    <!-- Container End -->
</div>
<div class="main-shop-page ptb-45">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 order-2 order-lg-1">
                <div class="sidebar">
                    <?php if (count($cats) > 0) {
                        echo $this->render('_cats', [
                            'title' => $mainCat->name,
                            'cats' => $cats,
                        ]);
                    }?>
                    <!-- Price Filter Options Start -->
                    <div class="search-filter mb-30">
                        <h3 class="sidebar-title">filter by price</h3>
                        <form action="#" class="sidbar-style">
                            <div id="slider-range"></div>
                            <input type="text" id="amount" class="amount-range" readonly>
                        </form>
                    </div>
                    <!-- Price Filter Options End -->
                    <!-- Sidebar Categorie Start -->
                    <div class="sidebar-categorie mb-30">
                        <h3 class="sidebar-title">categories</h3>
                        <ul class="sidbar-style">
                            <li class="form-check">
                                <input class="form-check-input" value="#" id="camera" type="checkbox">
                                <label class="form-check-label" for="camera">Cameras (8)</label>
                            </li>
                            <li class="form-check">
                                <input class="form-check-input" value="#" id="GamePad" type="checkbox">
                                <label class="form-check-label" for="GamePad">GamePad (8)</label>
                            </li>
                            <li class="form-check">
                                <input class="form-check-input" value="#" id="Digital" type="checkbox">
                                <label class="form-check-label" for="Digital">Digital Cameras (8)</label>
                            </li>
                            <li class="form-check">
                                <input class="form-check-input" value="#" id="Virtual" type="checkbox">
                                <label class="form-check-label" for="Virtual"> Virtual Reality (8) </label>
                            </li>
                        </ul>
                    </div>
                    <!-- Sidebar Categorie Start -->
                </div>
            </div>

            <!-- Product Categorie List Start -->
            <div class="col-lg-9 order-1 order-lg-2">
                <div class="grid-list-top border-default universal-padding d-md-flex justify-content-md-between align-items-center mb-30">
                    <div class="grid-list-view  mb-sm-15">
                        <ul class="nav tabs-area d-flex align-items-center">
                            <li><a data-toggle="tab" href="#grid-view"><i class="fa fa-th"></i></a></li>
                            <li><a class="active" data-toggle="tab" href="#list-view"><i class="fa fa-list-ul"></i></a></li>
                            <li><span class="grid-item-list"><?= $pagination['count']?> товаров по выбранному фильтру</span></li>
                        </ul>
                    </div>
                    <div class="main-toolbar-sorter clearfix">
                        <div class="toolbar-sorter d-md-flex align-items-center">
                            <label>Сортировать:</label>
                            <select class="sorter wide">
                                <option>название, от а до я</option>
                                <option>название, от я до а</option>
                                <option>цена, по убыванию</option>
                                <option>цена, по возврастанию</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="main-categorie mb-all-40">
                    <div class="tab-content border-default fix">
                        <div id="grid-view" class="tab-pane fade ">
                            <div class="row">
                                <?php foreach ($products as $product):?>
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                        <div class="single-product">
                                            <div class="pro-img">
                                                <a href="/product/<?= $product->id?>">
                                                    <img class="primary-img" src="<?= $product->getImage()?>" alt="single-product">
                                                </a>
                                                <!--<span class="sticker-new">new</span>-->
                                            </div>
                                            <div class="pro-content">
                                                <div class="pro-info">
                                                    <h4><a href="/product/<?= $product->id?>"><?= $product->name?></a></h4>
                                                    <!--<div class="product-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>-->
                                                    <p><span class="price"><?= $product->getPrice()?> р.</span></p>
                                                </div>
                                                <div class="pro-actions">
                                                    <div class="actions-primary">
                                                        <a title=""  @click="addToCart(<?= $product->id?>)" data-original-title="В корзину">В корзину</a>
                                                    </div>
                                                    <div class="actions-secondary">
                                                        <a href="/product/<?= $product->id?>" data-original-title="Детали"><i class="fa fa-signal"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach;?>
                            </div>
                        </div>

                        <div id="list-view" class="tab-pane fade show active">
                            <?php foreach ($products as $product):?>
                                <div class="row single-product">
                                    <div class="col-xl-3 col-lg-4 col-md-4 col-sm-5 col-4">
                                        <div class="pro-img">
                                            <a href="/product/<?= $product->id?>">
                                                <img class="primary-img" src="<?= $product->getImage()?>" alt="single-product">
                                            </a>
                                            <!--<span class="sticker-new">new</span>
                                            <span class="sticker-sale">-8%</span>-->
                                        </div>
                                    </div>
                                    <div class="col-xl-9 col-lg-8 col-md-8 col-sm-7 col-8">
                                        <div class="pro-content">
                                            <h4><a href="/product/<?= $product->id?>"><?= $product->name?></a></h4>
                                            <p><span class="price"><?= $product->getPrice()?> р.</span><del class="prev-price"></del></p>
                                            <p><?= mb_substr($product->summary, 0, 150)?>...</p>
                                            <div class="pro-actions">
                                                <div class="actions-primary">
                                                    <a  @click="addToCart(<?= $product->id?>)" title="В корзину">В корзину</a>
                                                </div>
                                                <div class="actions-secondary">
                                                    <a href="/product/<?= $product->id?>" title="Подробнее"><i class="fa fa-signal"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach;?>
                        </div>
                        <?php
                            \app\components\Common::renderPagination($pagination['count'], $pagination['current']);
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>