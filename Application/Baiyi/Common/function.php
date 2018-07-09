<?php 
	header("content-type:text/html;chasrest=utf-8");
	date_default_timezone_set('PRC');
	define('DIR_PATH',dirname(dirname(dirname(dirname(__FILE__)))));
	//验证码检测函数
	function check_verify($code, $id = ''){ 
		$verify = new \Think\Verify(); 
		return $verify->check($code, $id); 
	}
	//$url给'1'时跳转到前两个页面,就是相当于修改成功后还跳到列表页所在位置与页面，而不是重新加载页面
	function show_msg($url,$string='',$type=1,$time=3000){
	    include('Public/show/tips.html');//linux中不加public前的/
	    exit();
	}
	//图片上传
	function imgup($img,$dir,$name=''){
		if($name){
			$imgname=$name;
		}else{
			$imgname=date('YmdHis').rand(0,99999);
		}
		$type=strtolower(substr(strrchr($img['name'],'.'),1));

		if(!in_array($type,array('jpg','jpeg','png','gif'))){
			return array('code'=>0,'msg'=>'上传文件不符合类型');
		}

		if($img['size']/1000>2000){
			return array('code'=>0,'msg'=>'上传文件过大');
		}
		mkdirs(DIR_PATH.$dir.'/'.date('Ymd'));

		$url=DIR_PATH.$dir.'/'.date('Ymd').'/'.$imgname.'.'.$type;
		
		
		if(move_uploaded_file($img['tmp_name'],$url)){
			return array('code'=>1,'msg'=>'上传成功','dir'=>$dir.'/'.date('Ymd').'/'.$imgname.'.'.$type);
		}else{
			return array('code'=>0,'msg'=>'上传失败');
		}
	}
	//新建文件夹
	function mkdirs($dir,$mode=0777){
		if (is_dir($dir) || @mkdir($dir, $mode)) return TRUE;
	    if (!mkdirs(dirname($dir), $mode)) return FALSE;
	 
	    return @mkdir($dir, $mode);
	}
	//分页
	function fenye($page,$total,$url,$num='10'){
		$total_page=ceil($total/$num);
		$html = '<div class="pagelist"> ';
		if($page==1){
			$html.='<a href="javascript://">首页</a>';
		}else{
			$html.='<a href="'.$url.'&page=1">首页</a>';
			$html.='<a href="'.$url.'&page='.($page-1).'">上一页</a>';
		}
		for($i=-2;$i<3;$i++){
			if(($i+$page)>0&&$i!=0&&($i+$page)<$total_page){
				$html.='<a href="'.$url.'page='.($i+$page).'"></a>';
			}else if($i==0){
				$html.='<a href="javascript://">'.$page.'</a>';
			}
		}
		if($page==$total_page){
			$html.='<a href="javascript://">尾页</a>';
		}else{
			$html.='<a href="'.$url.'&page='.($page+1).'">下一页</a>';
			$html.='<a href="'.$url.'&page='.$total_page.'">尾页</a>';
		}
		$html.='</div>';
		return $html;
	}
 ?>