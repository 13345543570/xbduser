<?php
	namespace Baiyi\Model;
	use Think\Model;
	class ImgModel extends Model{
    	public function edit($data){
          	$id=$data['id'];
          	unset($data['id']);
        	if($id){
            	return $this->where("id=".$id)->save($data);
            }else{
            	return $this->data($data)->add();
            }
        }
      public function img_fenye($page,$type,$key,$time,$num){
        	if($type || $type==0){
              	$where['display'] = $type;
            }
      		if($key){
            	$where['title']  = array('like','%'.$key.'%');
            }
        	if($time){
            	$where['addtime'] = array('like',$time.'%');
            }
        	$data['total']=$this->where($where)->count();
        	$data['data']=$this->where($where)->limit((($page-1)*$num),$num)->select();
        	return $data;
      }
    }
?>