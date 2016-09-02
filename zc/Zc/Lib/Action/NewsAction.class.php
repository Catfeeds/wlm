<?php
#++++++++++++++++++++++++++++++++++++++
#FileName:newsAction.class.php
#++++++++++++++++++++++++++++++++++++++
#Function:
#++++++++++++++++++++++++++++++++++++++
#Author:MaxWei
#++++++++++++++++++++++++++++++++++++++
#Data:2015年5月11日
#++++++++++++++++++++++++++++++++++++++
#Time:下午8:58:20
#++++++++++++++++++++++++++++++++++++++
class NewsAction extends CommonAction{
	function index(){
		import('ORG.Util.Page');
		$db = M('News');
		$map['enable'] = 1;
		$count = $db->where($map)->count();
		$Page = new Page($count,10);
		$show = $Page->show();
		$count = $db->where($map)->count();
		$list = $db->order('addtime desc,rec desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('list',$list);
		$this->assign('page',$show);
		$this->display();
	}
	function html(){
		$id = $_GET['id'];
		$map['id'] = $id;
		$db = M('News');
		$vo = $db->where($map)->find();
		$this->assign('news',$vo);
		$this->display();
	}
}

?>