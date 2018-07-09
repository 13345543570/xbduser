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
<div class="panel admin-panel">
  <div class="panel-head"><strong><span class="icon-key"></span> 修改管理员密码</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="<?php echo U('Index/editpwd');?>">
      <div class="form-group">
        <div class="label">
          <label for="sitename">登录帐号：</label>
        </div>
        <div class="field">
          <label style="line-height:33px;">
            <?php echo (session('adminname')); ?>
          </label>
        </div>
      </div> 
      <!-- <div class="form-group">
        <div class="label">
          <label for="sitename">角色分类：</label>
        </div>
        <div class="field">
          <label style="line-height:33px;">
            <?php echo $_SESSION['role_name'];?>
          </label>
        </div>
      </div>    -->   
      <div class="form-group">
        <div class="label">
          <label for="sitename">原始密码：</label>
        </div>
        <div class="field">
          <input type="hidden" name="id" value="<?php echo (session('adminid')); ?>">
          <input type="password" class="input w50" id="mpass" name="mpwd" size="50" placeholder="请输入原始密码" data-validate="required:请输入原始密码" />
        </div>
      </div>      
      <div class="form-group">
        <div class="label">
          <label for="sitename">新密码：</label>
        </div>
        <div class="field">
          <input type="password" class="input w50" name="newpwd" size="50" placeholder="请输入新密码" data-validate="required:请输入新密码,length#>=5:新密码不能小于5位" />         
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label for="sitename">确认新密码：</label>
        </div>
        <div class="field">
          <input type="password" class="input w50" name="renewpwd" size="50" placeholder="请再次输入新密码" data-validate="required:请再次输入新密码,repeat#newpwd:两次输入的密码不一致" />          
        </div>
      </div>
      
      <div class="form-group">
        <div class="label">
          <label></label>
        </div>
        <div class="field">
          <button class="button bg-main icon-check-square-o" type="submit"> 确认修改</button>   
        </div>
      </div>      
    </form>
  </div>
</div>
</body>
</html>