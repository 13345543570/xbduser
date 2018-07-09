<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta name="renderer" content="webkit">
    <title>白逸后台</title>
    <link href="<?php echo (DOMAIN); ?>/favicon.ico" mce_href="<?php echo (DOMAIN); ?>/favicon.ico" rel="ico">
    <link rel="stylesheet" href="<?php echo (ADMIN_CSS); ?>pintuer.css">
    <link rel="stylesheet" href="<?php echo (ADMIN_CSS); ?>admin.css">
    <script src="<?php echo (ADMIN_JS); ?>jquery.js"></script>
    <script src="<?php echo (ADMIN_JS); ?>pintuer.js"></script>
    <script src="<?php echo (ADMIN_JS); ?>main.js"></script>
    <script src="<?php echo (ADMIN_JS); ?>special.js"></script>
</head>
<body>
    <div class="header bg-main">
        <div class="logo margin-big-left fadein-top">
            <h1><img src="<?php echo (ADMIN_IMAGES); ?>toux.png" class="radius-circle rotate-hover" height="50" title="<?php echo (session('adminname')); ?>"/>后台管理中心</h1>
        </div>
        <div class="head-l">
            <a class="button button-little bg-green" href="/" target="_blank"><span
                    class="icon-home"></span> 前台首页</a>
            <a class="button button-little bg-red" href="<?php echo U('Login/loginOut');?>"><span
                    class="icon-power-off"></span> 退出登录</a>
        </div>
    </div>
    <div class="leftnav">
        <div class="leftnav-title"><strong><span class="icon-list"></span>菜单列表</strong></div>
        <h2><span class="icon-user"></span>基本设置</h2>
        <ul style='display: block'>
            <li><a href="<?php echo U('Index/editpwd');?>" target="right"><span class="icon-caret-right active"></span>修改密码</a></li>
            <li><a href="<?php echo U('Index/baiyi');?>" target="right"><span class="icon-caret-right active"></span>网站设置</a></li>
        </ul>
        <h2><span class=" icon-pencil"></span>内容管理</h2>
        <ul>
          	<li><a href="<?php echo U('Baiyi/index');?>" target="right"><span class="icon-caret-right"></span>栏目管理</a></li>
            <li><a href="<?php echo U('Article/doup');?>" target="right"><span class="icon-caret-right"></span>文章上传</a></li>
            <li><a href="<?php echo U('Image/doup');?>" target="right"><span class="icon-caret-right"></span>图集上传</a></li>
            <li><a href="<?php echo U('Article/index');?>" target="right"><span class="icon-caret-right"></span>文章管理</a></li>
            <li><a href="<?php echo U('Image/index');?>" target="right"><span class="icon-caret-right"></span>图集管理</a></li>
        </ul>
        <h2><span class=" icon-lock"></span>管理员管理</h2>
        <ul>
            <li><a href="<?php echo U('User/index');?>" target="right"><span class="icon-caret-right"></span>管理员管理</a></li>
        </ul>
        <!-- <h2><span class="icon-lock"></span>权限管理</h2> 
        <ul>
            <li><a href="/admin/Home/role" target="right"><span class="icon-caret-right"></span>角色管理</a></li>
            <li><a href="/admin/Home/power" target="right"><span class="icon-caret-right"></span>权限管理</a></li>
            <li><a href="/admin/Home/user" target="right"><span class="icon-caret-right"></span>管理员管理</a></li>
        </ul> -->
    </div>
    <script type="text/javascript">

    </script>
    <ul class="bread">
        <li><a href="javascript://" target="right" class="icon-home"> 首页</a></li>
        <li><a href="javascript://" id="a_leader_txt">love</a></li>
    </ul>
    <div class="admin">
        <iframe scrolling="auto" rameborder="0" src="<?php echo U('Index/editpwd');?>" name="right" width="100%" height="100%"></iframe>
    </div>
<script>
        ashome.left_change();
</script>
</body>
</html>