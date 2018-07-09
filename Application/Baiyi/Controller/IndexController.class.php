<?php
namespace Baiyi\Controller;
use Common\Controller\BaseController;
class IndexController extends BaseController {
    public function index(){
        $this->display();
    }
    public function editpwd(){
    	$id=$_POST['id'];
    	if(!$id){
    		$this->display();
    	}else{
    		$data=$_POST;
    		$Admin=M('Admin');//M实例化数据库 D实例化模型与数据库
    		$res=$Admin->where("id='{$id}'")->find();
    		if(md5($data['mpwd'])!=$res['password']){
    			show_msg($_SERVER['HTTP_REFERER'],'原密码错误');
    		}
    		if($data['newpwd']==$data['renewpwd'] && $data['newpwd']!=null){
    			$re=$Admin->where("id='{$id}'")->save(['password'=>md5($data['newpwd'])]);
                if($re){
                    show_msg($_SERVER['HTTP_REFERER'],'修改成功');
                }else{
                    show_msg($_SERVER['HTTP_REFERER'],'修改失败');
                }
    		}else{
    			show_msg($_SERVER['HTTP_REFERER'],'两次密码不一致');
    		}
    	}
    	
    }
    public function baiyi(){
        $Config=M('Config');
        $res=$Config->find();
        $data=$_POST;
        if($data){
            $file=$_FILES['logo'];
            if($file['name']){

                $result=imgup($file,'/upload/images');

                if($result['code']){

                    $data['logo']=$result['dir'];
                    $data['slogo']='';
                }else{
                    show_msg($_SERVER['HTTP_REFERER'],$result['msg']);
                }
            }else{
                $data['logo']=$_POST['slogo'];
                $data['slogo']='';
            }
            $data=array_filter($data);
            $re=$Config->where("id=1")->save($data);
            if($re){
                show_msg($_SERVER['HTTP_REFERER'],'修改成功');
            }else{
                show_msg($_SERVER['HTTP_REFERER'],'修改失败');
            }
        }else{
            $this->assign('res',$res);
            $this->display();
        }
    }
}