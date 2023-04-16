<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="wrapper white-bg">
    <!-- Error 404 Area Start -->
    <div class="error404-area ptb-45">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="error-wrapper text-center">
                        <div class="error-text">
                            <h1><?= $exception->getCode()?></h1>
                            <h2><?= $message?></h2>
                        </div>
                        <div class="search-error">
                            <form id="search-form" action="#">
                                <input type="text" placeholder="Поиск по сайту">
                                <button><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                        <div class="error-button">
                            <a href="/">На главную</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Error 404 Area End -->
</div>
