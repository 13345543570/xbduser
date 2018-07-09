<?php 
	namespace Baiyi\Controller;
	use Common\Controller\BaseController;
	class ImageController extends BaseController{
		public function index(){
			$page=$_GET['page']?$_GET['page']:1;
			$keywords=$_GET['keywords'];
			$time=$_GET['date'];
          	$display=$_GET['display'];
			$num=10;
			$Img=D('Img');
			$res_data=$Img->img_fenye($page,$dispaly,$keywords,$time,$num);
			$fenye=fenye($page,$res_data['total'],DOMAIN.'/Baiyi/Image/index?display='.$dispaly.'&keywords='.$keywords.'&date='.$time,$num);
			$this->assign('data',$res_data['data']);
			$this->assign('fenye',$fenye);
			$this->assign('date',$time);
          	$this->assign('display',$display);
			$this->assign('keywords',$keywords);
			$this->display();
		}
    	public function doup(){
    		$id=$_GET['id'];
    		if($id){
    			$Img=M('Img');
    			$info=$Img->where('id='.$id)->find();
    			$imgs=json_decode($info['imgs'],true);
    			$this->assign('info',$info);
    			$this->assign('imgs',$imgs);
    		}
    		$this->display();
        }
        public function imgup(){
    		$data['id']=$_POST['id'];
    		$data['title']=$_POST['title'];
    		$file=$_FILES['logo'];
    		if($file['name']){
    			$res=imgup($file,'/upload/images');
    			if($res['code']){
    				$data['img']=$res['dir'];
    			}else{
    				show_msg($_SERVER['HTTP_REFERER'],$res['msg']);
    			}
    		}else{
    			if($_POST['slogo']){
    				$data['img']=$_POST['slogo'];
    			}else{
    				show_msg($_SERVER['HTTP_REFERER'],'封面图片不得为空');
    			}
    		}
    		$data['imgs']=json_encode($_POST['url']);
          	$data['display']=$_POST['display'];
    		$data['addtime']=date('Y-m-d H:i:s');
    		$Img=D('Img');
    		$result=$Img->edit($data);
    		if($result){
    			show_msg(1,'操作成功');
    		}else{
    			show_msg($_SERVER['HTTP_REFERER'],'操作失败');
    		}
        }
        public function del(){
        	$id=$_GET['id'];
        	$Img=M('Img');
        	$res=$Img->where('id='.$id)->delete();
        	if($res){
				show_msg($_SERVER['HTTP_REFERER'],'图集删除成功');
			}else{
				show_msg($_SERVER['HTTP_REFERER'],'图集删除失败');
			}
        }
    }
?>