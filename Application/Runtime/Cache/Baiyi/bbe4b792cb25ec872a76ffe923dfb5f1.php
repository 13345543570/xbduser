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
<link rel="stylesheet" type="text/css" href="<?php echo (ADMIN_JS); ?>imgup/diyUpload/css/webuploader.css">
<link rel="stylesheet" type="text/css" href="<?php echo (ADMIN_JS); ?>imgup/diyUpload/css/diyUpload.css">
<script type="text/javascript" src="<?php echo (ADMIN_JS); ?>imgup/diyUpload/js/webuploader.html5only.min.js"></script>
<script type="text/javascript" src="<?php echo (ADMIN_JS); ?>imgup/diyUpload/js/diyUpload.js"></script>

<div class="panel admin-panel">
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>添加图集</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="<?php echo U('Image/imgup');?>" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?php echo ($info["id"]); ?>">
      <div class="form-group">
        <div class="label">
          <label>标题：</label>
        </div>
        <div class="field">
          <input type="text" width="300px" class="input" name="title" value="<?php echo ($info["title"]); ?>" data-validate="required:请输入标题" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>封面图片：</label>
        </div>
        <div style="float: none;" class="field">
          <input type="text" id="url1" name="slogo"  class="input tips" style="width:25%; float:left;" value="<?php echo ($info["img"]); ?>" data-toggle="hover" data-place="right" data-image="<?php echo ($info["img"]); ?>"  />
          <input type="file" name="logo" class="button bg-blue margin-left" id="image1" value="游览" >
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>上传图片：</label>
        </div>
        <div class="field">
          <div id="test" name="content"></div>
          <div class="parentFileBox">
            <ul class="fileBoxUl"></ul>
          </div>
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>上传完成图片：</label>
        </div>
        <div class="field">
          <div class="input" style="height:450px; border:1px solid #ddd;overflow:scroll;">
            <ul class="imgcontent">
              <!--<?php if($content){foreach($content as $val){?>
              <li>
                <input type="hidden" name="url[]" value="<?php echo $val;?>">
                <div class="imgst"><img src="<?php echo $url_dir.$val;?>"></div>
                <div class="delimg"><img src="<?php echo $public_dir;?>/admin/images/x_alt.png"></div>
              </li>
              <?php }}?>-->
              <?php if(is_array($imgs)): foreach($imgs as $key=>$val): ?><li>
                	<input type="hidden" name="url[]" value="<?php echo ($val); ?>">
                  <div class="imgst"><img src="<?php echo ($val); ?>"></div>
                  <div class="delimg"><img src="<?php echo (ADMIN_IMAGES); ?>x_alt.png"></div>
                </li><?php endforeach; endif; ?>

            </ul>
          </div>
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>是否显示：</label>
        </div>
        <div class="field">
          <select name="display" class="dinput">
            <?php if($info['display'] == 2): ?><option value="1">显示</option>
              	<option selected="selected" value="2">不显示</option>
            <?php else: ?>
              	<option selected="selected" value="1">显示</option>
              	<option value="2">不显示</option><?php endif; ?> 
          </select>
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
</body>
</html>
<script type="text/javascript">
  //插件上传图片
  $('#test').diyUpload({
    url:'<?php echo (ADMIN_JS); ?>imgup/server/fileupload.php',
    success:function( data ) {
      if(data.status == 1){
        var content = '<li><input type="hidden" name="url[]" value="'+data.msg+'"><div class="imgst"><img src="<?php echo (DOMAIN); ?>'+data.msg+'"></div><div class="delet" id="delet"></div></li>';
        $('.imgcontent').append(content);
      }else if(data.status == 0){
        layer.alert(data.msg);
      }

      $('#fileBox_'+ data.id).remove();
    },
    error:function( err ) {
      console.info( err );
    }
  });

  asaddimg.del();
</script>