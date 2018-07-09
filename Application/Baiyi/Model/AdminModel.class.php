<?php 
	namespace Baiyi\Model;
	use Think\Model;
	class AdminModel extends Model
	{
		public function edit($data){
			$id=$data['id'];
			unset($data['id']);
			unset($data['repwd']);
			if($id){
				if($data['pwd']){
					$data['password']=md5($data['pwd']);
				}else{
					unset($data['pwd']);
				}
				return $this->where("id='{$id}'")->save($data);//模型内$this相当于控制器中的$Admin
			}else{
				$data['password']=md5($data['pwd']);
				return $this->data($data)->add();
			}
		}
	}
 ?>