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
    <div class="panel-head"><strong class="icon-reorder"> 管理员管理</strong> 
    </div>

    <table class="table table-hover text-center">
        <tr>
            <th width="50" style="text-align:left; padding-left:20px;">ID</th>
            <th>管理员账号</th>
            <th>手机号码</th>
            <th>QQ号码</th>
            <th>微信</th>
            <th>备注</th>
            <th>登录次数</th>
            <th>最近一次登录</th>
            <th width='310'>操作</th>
        </tr>
        <?php if(is_null($data)): ?><tr style="text-align:center;"><td colspan="9"><h3>暂无符合条件项！</h3></td></tr>
        <?php else: ?>
          <?php if(is_array($data)): foreach($data as $key=>$val): ?><tr>
                    <td style="text-align:left; padding-left:20px;"><?php echo ($val["id"]); ?></td>
                    <td><?php echo ($val["name"]); ?></td>
                    <td><?php echo ($val["tell"]); ?></td>
                    <td><?php echo ($val["qq"]); ?></td>
                    <td><?php echo ($val["wx"]); ?></td>
                    <td><?php echo ($val["remark"]); ?></td>
                    <td><?php echo ($val["login_num"]); ?></td>
                    <td><?php echo ($val["login_time"]); ?></td>
                    <td>
                        <div class="button-group"><a class="button border-main" href="javascript:void(0)" data="<?php echo ($val["id"]); ?>"><span class="icon-edit"></span> 修改</a> <a class="button border-red" href="javascript:void(0)" onclick="return del(<?php echo ($val["id"]); ?>,'user')"><span class="icon-trash-o"></span> 删除</a></div>
                    </td>
                </tr><?php endforeach; endif; endif; ?>
           
    </table>
</div>

<div class="panel admin-panel margin-top">
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>增加/修改 管理员</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="<?php echo U('User/edituser');?>" enctype="multipart/form-data">
      <input type="hidden" name="id"  value="" />
      <div class="form-group">
        <div class="label">
          <label>管理员账号：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="name" value="" placeholder="填写管理员账号" data-validate="required:请输入管理员账号" />
          <div class="tips"></div>
        </div>
      </div> 
      <!-- <div class="form-group">
        <div class="label">
          <label>角色分类：</label>
        </div>
        <div class="field">
         <select name="role_id" class="dinput">
            <?php foreach($role as $val){; ?>
            <option value="<?php echo $val['role_id']; ?>"><?php echo $val['role_name']; ?></option>
            <?php }; ?>
          </select>
          <div class="tips"></div>
        </div>
      </div> -->
      <div class="form-group">
        <div class="label">
          <label>密码：</label>
        </div>
        <div class="field">
          <input type="password" class="input w50" name="pwd" value="" placeholder="密码/修改时不填即为不修改"  />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>重复密码：</label>
        </div>
        <div class="field">
          <input type="password" class="input w50" name="repwd" value="" placeholder="重复密码" data-validate="repeat#pwd:两次输入的密码不一致" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>手机号码：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="tell" value=""  data-validate="required:请输入手机号码"  />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>QQ号码：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="qq" value="" data-validate="required:请输入QQ号码" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>微信：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="wx" value="" data-validate="required:请输入微信号码" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>备注：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="remark" value="" data-validate="required:请输入账号备注" />
          <div class="tips"></div>
        </div>
      </div>
    <div class="form-group">
        <div class="label">
          <label></label>
        </div>
        <div class="field">
          <button class="button bg-main icon-check-square-o" type="submit"> 提交</button>
        </div>
      </div>
    </form>
  </div>
</div>
<script>
  amuser.get_user_info();
</script>