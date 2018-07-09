<?php 
	namespace Common\Controller;
	use Think\controller;
	class BaseController extends Controller{
		public function  _initialize()
		{
			//初始化
        	if($_SESSION['adminid']==NULL)
	        {
	            $this->redirect("Baiyi/Login/index");
	        }
		}
	}
	
 ?>