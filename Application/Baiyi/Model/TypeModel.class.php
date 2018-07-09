<?php
	namespace Baiyi\Model;
	use Think\Model;
	class TypeModel extends Model{
    	public function edit($data){
          	$id=$data['id'];
          	unset($data['id']);
        	if($id){
            	return $this->where('id='.$id)->save($data);
            }else{
            	return $this->data($data)->add();
            }
        }
    }
?>