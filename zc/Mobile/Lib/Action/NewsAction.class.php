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
		$db = M('News');
		$map['enable'] = 1;
		$count = $db->where($map)->count();
		$list = $db->order('addtime desc,rec desc')->select();
		$this->assign('list',$list);
		$this->display('News/news');
	}
	function html(){
		$id = $_GET['id'];
		$map['id'] = $id;
		$db = M('News');
		$vo = $db->where($map)->find();
		$this->assign('news',$vo);
		$this->display('News/newsInfo');
	}
}

?>