<?php
	namespace Baiyi\Model;
	use Think\Model;
	class ArtModel extends Model{
    	public function edit($data){
          	$id=$data['id'];
          	unset($data['id']);
        	if($id){
            	return $this->where("id=".$id)->save($data);
            }else{
            	return $this->data($data)->add();
            }
        }
      public function art_fenye($page,$type,$display,$key,$time,$num){
          $addsql=' 1=1';
          if($type){
            $addsql = ' and a.typeid='.$type;
          }
          if($display && $addsql){
            $addsql .= ' and a.display='.$display;
          }else if($display){
            $addsql = ' a.display='.$display;
          }
      		if($key && $addsql){
              $addsql .= ' and a.title like "%'.$key.'%"';
          }else if($key){
              $addsql = ' a.title like "%'.$key.'%"';
          }
        	if($time && $addsql){
              $addsql .= ' and a.addtime like "'.$time.'%"';
          }else if($time){
              $addsql = ' a.addtime like "'.$time.'%"';
          }
        	//$data['total']=$this->where($where)->count();
          //联合查询
          //$data['data'] = $this->table('love_art art, love_type type')->where('art.typeid = type.id')->field('art.id as id, art.title as title, type.name as typename,art.img as img,art.author as author,art.author as author,art.addtime as addtime')->limit((($page-1)*$num),$num)->order('art.id desc' )->select();
          //$data['data']=$this->where($where)->limit((($page-1)*$num),$num)->select();
        	//$data['data']=$this->where($where)->alias('art')->join('love_type type','art.typeid = type.id')->limit((($page-1)*$num),$num)->order('art.id desc' )->select();
          $Model = new \Think\Model(); // 实例化一个model对象 没有对应任何数据表
          //echo "select a.*,b.name as typename from love_art a left join love_type b on a.typeid=b.id where".$addsql.' limit '.(($page-1)*$num).','.$num;exit;
          $data['total']=$Model->query("select count(id) as total from love_art as a where".$addsql)[0]['total'];

          $data['data']=$Model->query("select a.*,b.name as typename from love_art a left join love_type b on a.typeid=b.id where".$addsql.' limit '.(($page-1)*$num).','.$num);
        	return $data;
      }
    }
?>