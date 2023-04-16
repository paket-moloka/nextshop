<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/font-awesome.min.css',
        'css/ionicons.min.css',
        'css/nice-select.css',
        'css/jquery.fancybox.css',
        'css/jquery-ui.min.css',
        'css/meanmenu.min.css',
        'css/nivo-slider.css',
        'css/owl.carousel.min.css',
        'css/bootstrap.min.css',
        'css/default.css',
        'css/style.css',
        'css/responsive.css',
    ];
    public $js = [

    ];
    public $depends = [
        /*'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',*/
    ];
}
