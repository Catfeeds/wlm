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
		$classic = $this->classDeal();
		for ($i = 0; $i < count($classic) ; $i ++){
			$classic[$i]['jindu'] = strval(round(($classic[$i]['support_amount']/$classic[$i]['limit_price'])*100))."%";
			
		}
		$_SESSION['wlm_mobile_type'] = 1;
		$this->assign('clist',$classic);
		$this->display();
	}
	
	function rec(){
		$rec = $this->recDeal();
		
		for ($i = 0; $i < count($rec) ; $i ++){
			$rec[$i]['jindu'] = strval(round(($rec[$i]['support_amount']/$rec[$i]['limit_price'])*100))."%";
			$c = $rec[$i]['end_time'] - time();
			if ($c > 0) {
				$rec[$i]['time'] = ceil($c/86400)."天";
			}
			else{
				$rec[$i]['time'] = "已结束";
			}
			
		}
		$_SESSION['wlm_mobile_type'] = 2;
		$this->assign('pro',$rec);
		$this->display('Deals/projectlist');
	}
	
	function recDeal(){
		if (I('tid') != '' ) {
			$map['cate_id'] = I('tid');
		}
		$db = M('Deal');
		$map['is_effect'] = 1;#审核
		$map['is_recommend'] = 1;#推荐
		$field = array('id,name,image,end_time,limit_price,brief,support_amount,user_name,user_id,province,city');
		$list = $db->where($map)->field($field)->order('is_recommend desc,sort desc,id desc')->limit(0,5)->select();
		return $list;
	}
	function classDeal(){
		if (I('tid') != '' ) {
			$map['cate_id'] = I('tid');
		}
		$db = M('Deal');
		$map['is_effect'] = 1;#审核
		#$map['is_classic'] = 1;#经典
		$field = array('id,name,image,end_time,limit_price,brief,support_amount,user_name,user_id,province,city');
		$list = $db->where($map)->field($field)->order('is_recommend desc,sort desc,id desc')->limit(0,5)->select();
		for ($i = 0 ; $i < count($list) ; $i ++){
			$c = $list[$i]['end_time']-time();
			if ($c>0) {
				$list[$i]['time'] = ceil($c/86400)."天";
			}
			else{
				$list[$i]['time'] = "已结束";
			}	
		}
		return $list;
	}
}
?>