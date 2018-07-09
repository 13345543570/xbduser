<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta name="renderer" content="webkit">
    <title>小扁担用户后台</title>
    <link href="<?php echo (DOMAIN); ?>/favicon.ico" mce_href="<?php echo (DOMAIN); ?>/favicon.ico" rel="ico">
    <link rel="stylesheet" href="<?php echo (ADMIN_CSS); ?>pintuer.css">
    <link rel="stylesheet" href="<?php echo (ADMIN_CSS); ?>admin.css">
    <script src="<?php echo (ADMIN_JS); ?>jquery.js"></script>
    <script src="<?php echo (ADMIN_JS); ?>pintuer.js"></script>
    <script src="<?php echo (ADMIN_JS); ?>main.js"></script>
    <script src="<?php echo (ADMIN_JS); ?>special.js"></script>
</head>
<body>
<link rel="stylesheet" href="<?php echo (ADMIN_CSS); ?>supersized.css">
<link rel="stylesheet" href="<?php echo (ADMIN_CSS); ?>login.css">
<link href="<?php echo (ADMIN_CSS); ?>bootstrap.min.css" rel="stylesheet">
<script type="text/javascript" src="<?php echo (ADMIN_JS); ?>jquery.form.js"></script>
<script type="text/javascript" src="<?php echo (ADMIN_JS); ?>tooltips.js"></script>
<script type="text/javascript" src="<?php echo (ADMIN_JS); ?>login.js"></script>
<script src="<?php echo (ADMIN_JS); ?>supersized.3.2.7.min.js"></script>
<script src="<?php echo (ADMIN_JS); ?>supersized-init.js"></script>
<script src="<?php echo (ADMIN_JS); ?>scripts.js"></script>

<div class="page-container">
	<div class="main_box">
		<div class="login_box">
			<div class="login_logo">
				<font size="6.5px">小扁担客户系统</font>
			</div>
		
			<div class="login_form">
				<form action="<?php echo U('Login/checkLogin');?>" id="login_form" method="post">
					<div class="form-group">
						<label for="j_username" class="t">账　号：</label> 
						<input id="email" value="" name="name" type="text" class="form-control x319 in" 
						autocomplete="off" placeholder="请输入手机号码">
					</div>
					<div class="form-group">
						<label for="j_password" class="t">密　码：</label> 
						<input id="password" value="" name="pwd" type="password" 
						class="password form-control x319 in" placeholder="请输入密码">
					</div>
					<div class="form-group">
						<label for="j_captcha" class="t">验证码：</label>
						 <input id="j_captcha" name="code" type="text" class="form-control x164 in" placeholder="请输入右侧验证码">
						<img id="captcha_img" alt="点击更换" title="点击更换" src="<?php echo U('Login/verify');?>" class="m" onclick="this.src=this.src+'?'+Math.random()">
					</div>
					
					<div class="form-group space">
						<label class="t"></label>　　　
						<button type="button"  id="submit_btn" 
						class="btn btn-primary btn-lg">&nbsp;登&nbsp;录&nbsp </button>&nbsp&nbsp&nbsp&nbsp&nbsp
						<input type="reset" value="&nbsp;重&nbsp;置&nbsp;" class="btn btn-default btn-lg">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
</body>
</html>