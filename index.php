<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2014 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
//测试git1
// 应用入口文件
header("content-type:textml;charset=utf8");
// 检测PHP环境
// if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0 !');

// 开启调试模式 建议开发阶段开启 部署阶段注释或者设为false
define('APP_DEBUG',True);

// 定义应用目录
define('APP_PATH','./Application/');
//定义网站域名
define('DOMAIN','http://www.xbduser.cc');
// 定义文件访问路径 - 前端
define('HOME_CSS',DOMAIN.'/Public/home/css/');
define('HOME_JS',DOMAIN.'/Public/home/js/');
define('HOME_IMAGES',DOMAIN.'/Public/home/images/');
define('HOME_IMG',DOMAIN.'/Public/home/img/');

// 定义文件访问路径 - 后台
define('ADMIN_CSS',DOMAIN.'/Public/admin/css/');
define('ADMIN_JS',DOMAIN.'/Public/admin/js/');
define('ADMIN_IMAGES',DOMAIN.'/Public/admin/images/');
define('ADMIN_IMG',DOMAIN.'/Public/admin/img/');
define('ADMIN_KENDEDITOR',DOMAIN.'/Public/admin/kendeditor/');
define('ADMIN_UEDITOR',DOMAIN.'/Public/admin/ueditor/');

// 引入ThinkPHP入口文件
require './ThinkPHP/ThinkPHP.php';

// 亲^_^ 后面不需要任何代码了 就是如此简单
