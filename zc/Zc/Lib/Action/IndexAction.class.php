<?php
#++++++++++++++++++++++++++++++++++++++
#FileName:IndexAction.class.php
#++++++++++++++++++++++++++++++++++++++
#Function:
#++++++++++++++++++++++++++++++++++++++
#Author:MaxWei
#++++++++++++++++++++++++++++++++++++++
#Data:2015年5月12日
#++++++++++++++++++++++++++++++++++++++
#Time:下午8:28:53
#++++++++++++++++++++++++++++++++++++++

// 本类由系统自动生成，仅供测试用途
class IndexAction extends CommonAction{
	function _empty(){
		$this->error('页面不存在');
	}
	function index(){
		$show = M('showindex')->select();
		
		$this->news();
		$this->company();
		$this->display();
	}
	function recDeal(){
		$db = M('Deal');
		$map['is_effect'] = 1;#审核
		$map['is_recommend'] = 1;#推荐
		$field = array('id,name,image,end_time,limit_price,brief,support_amount,user_name,user_id,province,city');
		$list = $db->where($map)->field($field)->order('sort desc,id desc')->limit(0,5)->select();
		return $list;
	}
	function classDeal(){
		$db = M('Deal');
		$map['is_effect'] = 1;#审核
		//$map['is_classic'] = 1;#经典
		$field = array('id,name,image,end_time,limit_price,brief,support_amount,user_name,user_id,province,city,index_img');
		$list = $db->where($map)->field($field)->order('sort desc,id desc')->limit(0,7)->select();
		return $list;
	}
	
	function news(){
		$db = M('News');
		$map['enable'] = 1;
		$list = $db->order('addtime desc,rec desc')->limit('0,5')->select();
		for($i = 0 ; $i < count($list) ; $i ++){
			$list[$i]['addtime'] = date('Y-m-d',$list[$i]['addtime']);
		}
		$this->assign('list',$list);
	}
	
	function company(){
		$company = M('company')->find();
		$this->assign('com',$company); 
	}
}
?>