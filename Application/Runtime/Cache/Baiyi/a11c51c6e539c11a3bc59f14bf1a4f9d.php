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
  <div class="panel-head"><strong class="icon-reorder"> 栏目修改</strong></div>
  <table class="table table-hover text-center">
    <tr>
      <th width="5%">ID</th>
      <th>栏目名称</th>  
      <th>排序</th>     
      <th>栏目关键词</th>     
      <th>栏目描述</th> 
      <th>是否显示</th>    
      <th width="250">操作</th>
    </tr>
    <?php if(is_array($type)): foreach($type as $key=>$val): ?><tr>
        <td><?php echo ($val["id"]); ?></td>
        <td><?php echo ($val["name"]); ?></td>
        <td><?php echo ($val["sort"]); ?></td>
        <td><?php echo ($val["keywords"]); ?></td>
        <td><?php echo ($val["description"]); ?></td>
        <td><?php if($val['display'] == 1): ?>隐藏<?php else: ?>显示<?php endif; ?></td>
        <td>
          <div class="button-group">
            <a type="button" class="button border-main" href="javascript://" data="<?php echo ($val["id"]); ?>"><span class="icon-edit"></span>修改</a>
          </div>
        </td>
      </tr><?php endforeach; endif; ?>

  </table>
</div>

<div class="panel admin-panel margin-top">
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>增加/修改 栏目</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="<?php echo U('Baiyi/edit');?>">
      <input type="hidden" name="id"  value="" />
      <div class="form-group">
        <div class="label">
          <label>栏目名称：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="name" value="" placeholder="填写栏目名称" data-validate="required:请输入栏目名称" />
          <div class="tips"></div>
        </div>
      </div> 

      <div class="form-group">
        <div class="label">
          <label>优先级：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="sort" value="" placeholder="优先级越小越靠前 最大为999"  data-validate="required:请输入优先级"  />
        </div>
      </div>

      <div class="form-group">
        <div class="label">
          <label>栏目关键词：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="keywords" value="" placeholder="填写栏目关键词"  data-validate="required:请输入栏目关键词"  />
        </div>
      </div>

      <div class="form-group">
        <div class="label">
          <label>栏目描述：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="description" value="" placeholder="填写栏目描述"  data-validate="required:请输入栏目描述"  />
        </div>
      </div>

     <div class="form-group">
        <div class="label">
          <label>显示：</label>
        </div>
        <div class="field">
          <div class="button-group radio">
          <label class="button">
         	  <span class="icon icon-check"></span>             
              <input name="display" value="0" type="radio">是
          </label>             
        
          <label class="button"><span class="icon icon-times"></span>
              <input name="display" value="1"  type="radio">否
          </label>         
           </div>       
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
</body>
</html>
<script>
  amcolum.get_columinfo();
</script>