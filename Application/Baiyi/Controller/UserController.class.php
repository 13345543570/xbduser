<?php 
	namespace Baiyi\Controller;
	use Common\Controller\BaseController;
	class UserController extends BaseController
	{
		public function index()
		{
			$Admin=M('Admin');
			$res=$Admin->select();
			$this->assign('data',$res);
			$this->display();
		}
		public function edituser()
		{
			$id=$_POST['id'];
			$data=$_POST;
			if($data['pwd']!=$data['repwd']){
				show_msg($_SERVER['HTTP_REFERER'],'两次密码输入不一致');exit;
			}
			$Admin=D('Admin');
			$res=$Admin->edit($data);
			if($res){
				show_msg($_SERVER['HTTP_REFERER'],'操作成功');
			}else{
				show_msg($_SERVER['HTTP_REFERER'],'操作失败');
			}
		}
		public function getuser()
		{
			$id=$_POST['id'];
			if(!$id){
				show_msg($_SERVER['HTTP_REFERER'],'管理员信息缺失');exit;
			}
			$Admin=M('Admin');
			$data=$Admin->where("id='{$id}'")->find();
			if($data){
				echo json_encode($data);
			}else{
				echo 0;
			}
		}
		public function del()
		{
			$id=$_GET['id'];
			$Admin=M('Admin');
			$res=$Admin->where("id='{$id}'")->delete();
			if($res){
				show_msg($_SERVER['HTTP_REFERER'],'管理员删除成功');
			}else{
				show_msg($_SERVER['HTTP_REFERER'],'管理员删除失败');
			}
		}
	}
 ?>