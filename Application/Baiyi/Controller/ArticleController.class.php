<?php 
	namespace Baiyi\Controller;
	use Common\Controller\BaseController;
	class ArticleController extends BaseController{
		public function index(){
			$page=$_GET['page']?$_GET['page']:1;
			$keywords=$_GET['keywords'];
            $typeid=$_GET['type'];
            $display=$_GET['display'];
			$time=$_GET['date'];
			$num=10;
			$Art=D('Art');
            $Type=M('type');
            $type=$Type->select();
			$res_data=$Art->art_fenye($page,$typeid,$display,$keywords,$time,$num);
			$fenye=fenye($page,$res_data['total'],DOMAIN.'/Baiyi/Article/index?type='.$typeid.'&display='.$display.'&keywords='.$keywords.'&date='.$time,$num);
			$this->assign('data',$res_data['data']);
            $this->assign('fenye',$fenye);
            $this->assign('type',$type);
            $this->assign('typeid',$typeid);
			$this->assign('display',$display);
			$this->assign('date',$time);
			$this->assign('keywords',$keywords);
			$this->display();
		}
    	public function doup(){
    		$id=$_GET['id'];
          	$Type=M('type');
          	$data=$Type->select();
    		if($id){
    			$Art=M('Art');
    			$info=$Art->where('id='.$id)->find();
    			$this->assign('info',$info);
    		}
          	$this->assign('type',$data);
    		$this->display();
        }
        public function artup(){
    		$data=$_POST;
            unset($data['logo']);
            unset($data['slogo']);
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
    		$data['addtime']=date('Y-m-d H:i:s');
    		$Art=D('Art');
    		$result=$Art->edit($data);
    		if($result){
    			show_msg(1,'操作成功');
    		}else{
    			show_msg($_SERVER['HTTP_REFERER'],'操作失败');
    		}
        }
        public function del(){
        	$id=$_GET['id'];
        	$Art=M('Art');
        	$res=$Art->where('id='.$id)->delete();
        	if($res){
				show_msg($_SERVER['HTTP_REFERER'],'文章删除成功');
			}else{
				show_msg($_SERVER['HTTP_REFERER'],'文章删除失败');
			}
        }
    }
?>