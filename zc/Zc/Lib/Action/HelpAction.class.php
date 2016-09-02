<?php
#++++++++++++++++++++++++++++++++++++++
#FileName:HelpActrion.class.php
#++++++++++++++++++++++++++++++++++++++
#Function:
#++++++++++++++++++++++++++++++++++++++
#Author:MaxWei
#++++++++++++++++++++++++++++++++++++++
#Data:2015年5月12日
#++++++++++++++++++++++++++++++++++++++
#Time:下午8:41:24
#++++++++++++++++++++++++++++++++++++++
class HelpAction extends CommonAction{
	function _empty(){
		$this->error('参数错误');
	}
	function term(){
		$db = M('Help');
		$map['type'] = 'term';
		$vo = $db->where($map)->find();
		$this->assign('vo',$vo);
		$this->display();
	}
	function intro(){
		$db = M('Help');
		$map['type'] = 'intro';
		$vo = $db->where($map)->find();
		$this->assign('vo',$vo);
		$this->display();
	}
	function privacy(){
		$db = M('Help');
		$map['type'] = 'privacy';
		$vo = $db->where($map)->find();
		$this->assign('vo',$vo);
		$this->display();
	}
	function about(){
		$db = M('Help');
		$map['type'] = 'about';
		$vo = $db->where($map)->find();
		$this->assign('vo',$vo);
		$this->display();
	}
	function faq(){
		$db = M('Faq');
		$jbwt = $db->where("`group`='基本问题'")->order('sort asc')->select();
		$this->assign('jbwt',$jbwt);
		$fqrwt = $db->where("`group`='项目发起人相关问题'")->order('sort asc')->select();
		$this->assign('fqrwt',$fqrwt);
		$zczwt = $db->where("`group`='项目支持者相关问题'")->order('sort asc')->select();
		$this->assign('zczwt',$zczwt);
		$this->display();
	}
}

?>