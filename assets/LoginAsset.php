<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class LoginAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/bootstrap.min.css',
		'//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css',
		'css/AdminLTE.min.css',
		'plugins/iCheck/flat/blue.css',
    ];
    public $js = [
		'plugins/iCheck/icheck.min.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
