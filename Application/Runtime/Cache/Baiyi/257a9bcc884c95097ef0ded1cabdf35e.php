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
<script type="text/javascript" charset="utf-8" src="<?php echo (ADMIN_JS); ?>ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="<?php echo (ADMIN_JS); ?>ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="<?php echo (ADMIN_JS); ?>ueditor/lang/zh-cn/zh-cn.js"></script>

<div class="panel admin-panel">
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>添加文章</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="<?php echo U('Article/artup');?>" enctype="multipart/form-data">
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
          <label>分类：</label>
        </div>
        <div class="field">
          <select name="typeid" class="dinput">
              <option value="0">请选择栏目</option>
            <?php if(is_array($type)): foreach($type as $key=>$val): if($info['id'] == $val['id']): ?><option selected="selected" value="<?php echo ($val["id"]); ?>"><?php echo ($val["name"]); ?></option>
              <?php else: ?>
                <option value="<?php echo ($val["id"]); ?>"><?php echo ($val["name"]); ?></option><?php endif; endforeach; endif; ?>
          </select>
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>作者：</label>
        </div>
        <div class="field">
          <input type="text" class="dinput" name="author" value="<?php echo ($info["author"]); ?>" placeholder="填写作者名" value="" data-validate="required:请输入作者"/>
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>来源：</label>
        </div>
        <div class="field">
          <input type="text" class="dinput" name="source" placeholder="文章来源" value="<?php echo ($info["source"]); ?>" data-validate="required:请输入文章来源"/>
          <div class="tips"></div>
        </div>
      </div>
	<div class="form-group">
        <div class="label">
          <label>关键词：</label>
        </div>
        <div class="field">
          <input type="text" width="300px" class="input" name="keywords" value="<?php echo ($info["keywords"]); ?>" placeholder="格式xxx,xxx,xxx" data-validate="required:请输入关键词" />
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
          <label>导语简介：</label>
        </div>
        <div class="field">
          <textarea name="abstract" data-validate="required:请输入简介"><?php echo ($info["abstract"]); ?></textarea>
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>内容编辑：</label>
        </div>
        <div class="field">
          <script id="editor" name="content" type="text/plain" style="width:1024px;height:500px;"></script>
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
	var ue = UE.getEditor('editor', {
    toolbars: [
      [ 'source', '|', 'undo', 'redo', '|',
        'bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'superscript', 'subscript', 'removeformat', 'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist', 'selectall', 'cleardoc', '|',
        'rowspacingtop', 'rowspacingbottom', 'lineheight', '|',
        'customstyle', 'paragraph', 'fontfamily', 'fontsize', '|',
        'directionalityltr', 'directionalityrtl', 'indent', '|',
        'justifyleft', 'justifycenter', 'justifyright', 'justifyjustify', '|', 'touppercase', 'tolowercase', '|',
        'link', 'unlink', 'anchor', '|', 'imagenone', 'imageleft', 'imageright', 'imagecenter', '|',
        'simpleupload', 'insertimage', 'emotion', 'scrawl', 'insertvideo', 'music', 'attachment', 'map', 'gmap', 'insertframe', 'insertcode', 'webapp', 'pagebreak', 'template', 'background', '|',
        'horizontal', 'date', 'time', 'spechars', 'snapscreen', 'wordimage', '|',
        'inserttable', 'deletetable', 'insertparagraphbeforetable', 'insertrow', 'deleterow', 'insertcol', 'deletecol', 'mergecells', 'mergeright', 'mergedown', 'splittocells', 'splittorows', 'splittocols', 'charts', '|',
        'print', 'preview', 'searchreplace', 'drafts', 'help']
    ],
    autoHeightEnabled: true,
    autoFloatEnabled: true
  });
  ue.ready(function() {
    ue.setContent('<?php echo ($info["content"]); ?>');
  });
</script>