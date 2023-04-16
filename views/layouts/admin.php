<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;

\app\assets\AdminAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html class="no-js" lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="/img/favicon.ico">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="/admin/img/sidebar-1.jpg">
        <div class="logo"><a href="/" class="simple-text logo-normal">
                NEXTSHOP.PRO
            </a></div>
        <div class="sidebar-wrapper">
            <?php
                $active = 'stats';
                if (strpos($_SERVER['REQUEST_URI'], 'product') !== false) {
                    $active = 'product';
                }
                if (strpos($_SERVER['REQUEST_URI'], 'cats') !== false) {
                    $active = 'cats';
                }
                if (strpos($_SERVER['REQUEST_URI'], 'users') !== false) {
                    $active = 'users';
                }
                if (strpos($_SERVER['REQUEST_URI'], 'orders') !== false) {
                    $active = 'orders';
                }
            ?>
            <ul class="nav">
                <li class="nav-item <?= $active == 'stats' ? 'active' : ''?>">
                    <a class="nav-link" href="/shop/stats/index">
                        <i class="material-icons">dashboard</i>
                        <p>Статистика</p>
                    </a>
                </li>
                <li class="nav-item <?= $active == 'orders' ? 'active' : ''?>">
                    <a class="nav-link" href="/shop/orders/index">
                        <i class="material-icons">payments</i>
                        <p>Заказы</p>
                    </a>
                </li>
                <li class="nav-item <?= $active == 'product' ? 'active' : ''?>">
                    <a class="nav-link" href="/shop/product/index">
                        <i class="material-icons">content_paste</i>
                        <p>Товары</p>
                    </a>
                </li>
                <li class="nav-item <?= $active == 'cats' ? 'active' : ''?>">
                    <a class="nav-link" href="/shop/cats/index">
                        <i class="material-icons">library_books</i>
                        <p>Категории</p>
                    </a>
                </li>
                <li class="nav-item <?= $active == 'users' ? 'active' : ''?>">
                    <a class="nav-link" href="/shop/users/index">
                        <i class="material-icons">person</i>
                        <p>Пользователи</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                    <a class="navbar-brand" href="javascript:;">Админ панель</a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="sr-only">Навигация</span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end">
                   <!-- <form class="navbar-form">
                        <div class="input-group no-border">
                            <input type="text" value="" class="form-control" placeholder="Поиск товара...">
                            <button type="submit" class="btn btn-white btn-round btn-just-icon">
                                <i class="material-icons">search</i>
                                <div class="ripple-container"></div>
                            </button>
                        </div>
                    </form>-->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="/shop/stats/index">
                                <i class="material-icons">dashboard</i>
                                <p class="d-lg-none d-md-block">
                                    Статистика
                                </p>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">notifications</i>
                                <span class="notification">5</span>
                                <p class="d-lg-none d-md-block">
                                    Уведомления
                                </p>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="#">Поступил новый заказ</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">person</i>
                                <p class="d-lg-none d-md-block">
                                    Аккаунт
                                </p>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                                <a class="dropdown-item" href="#">Настройки</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="/logout">Выход</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="content">
            <style>
                .pagination{height:36px;margin:0;padding: 0;}
                .pager,.pagination ul{margin-left:0;*zoom:1}
                .pagination ul{padding:0;display:inline-block;*display:inline;margin-bottom:0;-webkit-border-radius:3px;-moz-border-radius:3px;border-radius:3px;-webkit-box-shadow:0 1px 2px rgba(0,0,0,.05);-moz-box-shadow:0 1px 2px rgba(0,0,0,.05);box-shadow:0 1px 2px rgba(0,0,0,.05)}
                .pagination li{display:inline}
                .pagination a{float:left;padding:0 12px;line-height:30px;text-decoration:none;border:1px solid #ddd;border-left-width:0}
                .pagination .active a,.pagination a:hover{background-color:#f5f5f5;color:#94999E}
                .pagination .active a{color:#94999E;cursor:default}
                .pagination .disabled a,.pagination .disabled a:hover,.pagination .disabled span{color:#94999E;background-color:transparent;cursor:default}
                .pagination li:first-child a,.pagination li:first-child span{border-left-width:1px;-webkit-border-radius:3px 0 0 3px;-moz-border-radius:3px 0 0 3px;border-radius:3px 0 0 3px}
                .pagination li:last-child a{-webkit-border-radius:0 3px 3px 0;-moz-border-radius:0 3px 3px 0;border-radius:0 3px 3px 0}
                .pagination-centered{text-align:center}
                .pagination-right{text-align:right}
                .pager{margin-bottom:18px;text-align:center}
                .pager:after,.pager:before{display:table;content:""}
                .pager li{display:inline}
                .pager a{display:inline-block;padding:5px 12px;background-color:#fff;border:1px solid #ddd;-webkit-border-radius:15px;-moz-border-radius:15px;border-radius:15px}
                .pager a:hover{text-decoration:none;background-color:#f5f5f5}
                .pager .next a{float:right}
                .pager .previous a{float:left}
                .pager .disabled a,.pager .disabled a:hover{color:#999;background-color:#fff;cursor:default}
                .pagination .prev.disabled span{float:left;padding:0 12px;line-height:30px;text-decoration:none;border:1px solid #ddd;border-left-width:1}
                .pagination .next.disabled span{float:left;padding:0 12px;line-height:30px;text-decoration:none;border:1px solid #ddd;border-left-width:0}
                .pagination li.active, .pagination li.disabled {
                    float:left;line-height:30px;text-decoration:none;border:1px solid #ddd;border-left-width:0
                }
                .pagination li.active {
                    background: #364E63;
                    color: #fff;
                }
                .pagination li:first-child {
                    border-left-width: 1px;
                }
            </style>
            <?= $content?>
        </div>
        <footer class="footer">
            <div class="container-fluid">

            </div>
        </footer>
    </div>
</div>
<?php $this->endBody() ?>
<script>
    var editor = ClassicEditor.create(document.getElementById("editor"), {
        // https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format
        toolbar: {
            items: [
                'selectAll', '|',
                'heading', '|',
                'bold', 'italic', '|',
                'bulletedList', 'numberedList', '|',
                'outdent', 'indent', '|',
                'undo', 'redo',
                '-',
                'link', 'blockQuote', 'insertTable', 'mediaEmbed', '|',
            ],
            shouldNotGroupWhenFull: true
        },
        // Changing the language of the interface requires loading the language file using the <script> tag.
        // language: 'es',
        list: {
            properties: {
                styles: true,
                startIndex: true,
                reversed: true
            }
        },
        // https://ckeditor.com/docs/ckeditor5/latest/features/headings.html#configuration
        heading: {
            options: [
                { model: 'paragraph', title: 'Параграф', class: 'ck-heading_paragraph' },
                { model: 'heading1', view: 'h1', title: 'Заголовок уровень 1', class: 'ck-heading_heading1' },
                { model: 'heading2', view: 'h2', title: 'Заголовок уровень 2', class: 'ck-heading_heading2' },
                { model: 'heading3', view: 'h3', title: 'Заголовок уровень 3', class: 'ck-heading_heading3' },
                { model: 'heading4', view: 'h4', title: 'Заголовок уровень 4', class: 'ck-heading_heading4' },
                { model: 'heading5', view: 'h5', title: 'Заголовок уровень 5', class: 'ck-heading_heading5' },
                { model: 'heading6', view: 'h6', title: 'Заголовок уровень 6', class: 'ck-heading_heading6' }
            ]
        },
        // https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
        placeholder: 'Введите описание товара',
        // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-family-feature
        fontFamily: {
            options: [
                'default',
                'Arial, Helvetica, sans-serif',
                'Courier New, Courier, monospace',
                'Georgia, serif',
                'Lucida Sans Unicode, Lucida Grande, sans-serif',
                'Tahoma, Geneva, sans-serif',
                'Times New Roman, Times, serif',
                'Trebuchet MS, Helvetica, sans-serif',
                'Verdana, Geneva, sans-serif'
            ],
            supportAllValues: true
        },
        // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-size-feature
        fontSize: {
            options: [ 10, 12, 14, 'default', 18, 20, 22 ],
            supportAllValues: true
        },
        // Be careful with the setting below. It instructs CKEditor to accept ALL HTML markup.
        // https://ckeditor.com/docs/ckeditor5/latest/features/general-html-support.html#enabling-all-html-features
        htmlSupport: {
            allow: [
                {
                    name: /.*/,
                    attributes: true,
                    classes: true,
                    styles: true
                }
            ]
        },
        // Be careful with enabling previews
        // https://ckeditor.com/docs/ckeditor5/latest/features/html-embed.html#content-previews
        htmlEmbed: {
            showPreviews: true
        },
        // https://ckeditor.com/docs/ckeditor5/latest/features/link.html#custom-link-attributes-decorators
        link: {
            decorators: {
                addTargetToExternalLinks: true,
                defaultProtocol: 'https://',
                toggleDownloadable: {
                    mode: 'manual',
                    label: 'Downloadable',
                    attributes: {
                        download: 'file'
                    }
                }
            }
        },
        // https://ckeditor.com/docs/ckeditor5/latest/features/mentions.html#configuration
        mention: {
            feeds: [
                {
                    marker: '@',
                    feed: [
                        '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes', '@chocolate', '@cookie', '@cotton', '@cream',
                        '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread', '@gummi', '@ice', '@jelly-o',
                        '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding', '@sesame', '@snaps', '@soufflé',
                        '@sugar', '@sweet', '@topping', '@wafer'
                    ],
                    minimumCharacters: 1
                }
            ]
        },
        // The "super-build" contains more premium features that require additional configuration, disable them below.
        // Do not turn them on unless you read the documentation and know how to configure them and setup the editor.
        removePlugins: [
            // These two are commercial, but you can try them out without registering to a trial.
            // 'ExportPdf',
            // 'ExportWord',
            'CKBox',
            'CKFinder',
            'EasyImage',
            // This sample uses the Base64UploadAdapter to handle image uploads as it requires no configuration.
            // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/base64-upload-adapter.html
            // Storing images as Base64 is usually a very bad idea.
            // Replace it on production website with other solutions:
            // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/image-upload.html
            // 'Base64UploadAdapter',
            'RealTimeCollaborativeComments',
            'RealTimeCollaborativeTrackChanges',
            'RealTimeCollaborativeRevisionHistory',
            'PresenceList',
            'Comments',
            'TrackChanges',
            'TrackChangesData',
            'RevisionHistory',
            'Pagination',
            'WProofreader',
            // Careful, with the Mathtype plugin CKEditor will not load when loading this sample
            // from a local file system (file://) - load this site via HTTP server if you enable MathType
            'MathType'
        ]
    });

</script>
<script>
    var selectedProducts = [];
    jQuery('#products table :checkbox').change(function() {
        selectedProducts = [];
        jQuery('#products table tbody input[type=checkbox]:checked').each(function(key, item) {
            var val = jQuery(item).val();
            selectedProducts.push(val);
        })
        if (selectedProducts.length > 0) {
            jQuery('.actions button').prop('disabled', false)
        } else {
            jQuery('.actions button').prop('disabled', true)
        }
    });
    function deleteProducts() {
        var ids = '?ids=' + selectedProducts.join(',');
        window.location.href = '/shop/product/delete' + ids
    }
    function archiveProducts() {
        var ids = '?ids=' + selectedProducts.join(',');
        window.location.href = '/shop/product/archive' + ids
    }
    function unArchiveProducts() {
        var ids = '?ids=' + selectedProducts.join(',');
        window.location.href = '/shop/product/unarchive' + ids
    }
</script>
</body>
</html>
<?php $this->endPage() ?>
