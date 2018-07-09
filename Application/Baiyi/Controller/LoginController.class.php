<?php 
	namespace Baiyi\Controller;
	use Think\Controller;
	class LoginController extends Controller
	{
		public function index()
		{	
			if($_SESSION['adminid']){
				header('Location:'.DOMAIN.'/Baiyi');
			}else{
				$this->display();
			}
		}

		public function checkLogin()
		{
			$data=I('post.');
			if(!check_verify($data['code'])){
				show_msg($_SERVER['HTTP_REFERER'],'验证码错误！');
			}
			$Admin=M('Admin');
			$pwd=md5($data['pwd']);
			$res=$Admin->where("name='{$data['name']}' AND password='{$pwd}'")->find();
			if($res){
				$_SESSION['adminid']=$res['id'];
				$_SESSION['adminname']=$res['name'];
				$save['login_num']=$res['login_num']+1;
				$save['login_time']=date('Y-m-d H:i:s');
				$Admin->where("id='{$res['id']}'")->save($save);
				header('Location:'.DOMAIN.'/Baiyi');
			}else{
				show_msg($_SERVER['HTTP_REFERER'],'账号或密码错误！');
			}
		}
		public function loginOut()
		{
			$_SESSION['adminid']='';
			$_SESSION['adminname']='';
			show_msg('/Baiyi/Login/index','退出成功');
		}
		public function verify()
		{
			$Verify = new \Think\Verify(); 
	    	$Verify->fontSize = 15; 
	    	$Verify->length = 4; 
	    	$Verify->imageW = 100; 
	    	$Verify->imageH = 40; 
	    	$Verify->useNoise = false;
	    	$Verify->entry();
		}

	}
 ?>