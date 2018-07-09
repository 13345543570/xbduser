<?php 
	namespace Baiyi\Controller;
	use Common\Controller\BaseController;
	class BaiyiController extends BaseController {
		public function index(){
			$Type=M('Type');
			$data=$Type->select();
			$this->assign('type',$data);
			$this->display();
		}
		public function edit(){
			$data=$_POST;
			$Type=D('Type');
			$res=$Type->edit($data);
			if($res){
				show_msg($_SERVER['HTTP_REFERER'],'操作成功');
			}else{
				show_msg($_SERVER['HTTP_REFERER'],'操作失败');
			}
		}
		public function getcolum(){
			$id=$_POST['id'];
			if($id){
				$Type=M('Type');
				$data=$Type->where('id='.$id)->find();
				echo json_encode($data);
			}else{
				echo 0;
			}
		}
	}

 ?>
