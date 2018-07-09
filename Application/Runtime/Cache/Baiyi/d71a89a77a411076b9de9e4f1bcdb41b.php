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
<link href="<?php echo (ADMIN_JS); ?>rili/css/lyz.calendar.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo (ADMIN_JS); ?>rili/js/lyz.calendar.min.js" type="text/javascript"></script>


<div class="panel admin-panel">
  <div class="panel-head"><strong class="icon-reorder"> 图集管理</strong> 
  </div>
  <form method="get" action="<?php echo U('Article/index');?>" enctype="multipart/form-data">
    <div class="padding border-bottom">

      <ul class="search" style="padding-left:10px;">
        <li>搜索：</li>
        <li>
       		<select name="type" class="input" style="width:200px; line-height:17px;">
              	<option value="">请选择栏目</option>
              <?php if(is_array($type)): foreach($type as $key=>$val): if($val['id'] == $typeid): ?><option selected="selected" value="<?php echo ($val["id"]); ?>"><?php echo ($val["name"]); ?><option>
                <?php else: ?>
                  	<option value="<?php echo ($val["id"]); ?>"><?php echo ($val["name"]); ?><option><?php endif; endforeach; endif; ?> 
            </select>
        </li>
        <li>
        	<select name="display" class="input" style="width:200px;">
              	<option value=''>请选择文章是否显示</option>
              	<?php if($display == 2): ?><option value="1">显示</option>
                    <option selected="selected" value="2">不显示</option>
                <?php elseif($display == 1): ?>
                    <option selected="selected" value="1">显示</option>
                    <option value="2">不显示</option>
                <?php else: ?>
                  	<option value="1">显示</option>
                    <option value="2">不显示</option><?php endif; ?> 
            </select>
        </li>
        <li>日期：</li>
        <li>
          <input id="txtBeginDate" name="date" style="width: 188px;" class="input" value="<?php echo ($date); ?>"/>
        </li>
        <li>
          <input type="text" placeholder="请输入搜索关键字" name="keywords" class="input"
                 style="width:250px; line-height:17px;display:inline-block" value="<?php echo ($keywords); ?>"/>
          <input type="submit" class="button border-main icon-search" value="搜索">
        </li>
      </ul>
    </div>
  </form>

  <table class="table table-hover text-center">
    <tr>
      <th width="100" style="text-align:left; padding-left:20px;">ID</th>
      <th>图片</th>
      <th>标题</th>
      <th>栏目</th>
      <th>作者</th>
      <th>来源</th>
      <th>是否显示</th>
      <th width="10%">更新时间</th>
      <th width="310">操作</th>
    </tr>
    <volist name="list" id="vo">
      <?php if(is_array($data)): foreach($data as $key=>$val): ?><tr>
          <td style="text-align:left; padding-left:20px;"><!--<input type="checkbox" name="id[]" value=""/>-->
            <?php echo ($val["id"]); ?>
          </td>
          <td width="10%"><img src="<?php echo ($val["img"]); ?>" alt="" width="70" height="50"/>
          </td>
          <td><a target="_blank"  href=""><?php echo ($val["title"]); ?></a></td>
          <td><?php echo ($val["typename"]); ?></td>
          <td><?php echo ($val["author"]); ?></td>
          <td><?php echo ($val["source"]); ?></td>
          <td><?php if($val['display'] == 2): ?>不显示<?php else: ?>显示<?php endif; ?></td>
          <td><?php echo ($val["addtime"]); ?></td>
          <td>
            <div class="button-group"><a class="button border-main"
                                         href="<?php echo U('Article/doup',array('id'=>$val['id']));?>"><span
                    class="icon-edit"></span> 修改</a> <a class="button border-red"
                                                        href="javascript:void(0)"
                                                        onclick="return del(<?php echo ($val["id"]); ?>,'Article')"><span
                    class="icon-trash-o"></span> 删除</a></div>
          </td>
        </tr><?php endforeach; endif; ?>
      <tr>
        <td colspan="9">
          <?php echo ($fenye); ?>
        </td>
      </tr>
  </table>
</div>
</body>
</html>
<script>
  ascontent_manage.rili();
  $(function(){
    var left = $('input[name="date"]').offset().left;
    var top = $('input[name="date"]').offset().top;
    var height = $('input[name="date"]').offset().height;
    $('#divDate').css({'top':(top+height+10),'left':left});
  })

</script>