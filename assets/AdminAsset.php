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
class AdminAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'admin/css/material-dashboard.min.css',
    ];
    public $js = [
        'admin/js/core/popper.min.js',
        'admin/js/core/bootstrap-material-design.min.js',
        'admin/js/plugins/perfect-scrollbar.jquery.min.js',
        'admin/js/material-dashboard.min.js',
        'https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/ckeditor.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        /*'yii\bootstrap\BootstrapAsset',*/
    ];
}
