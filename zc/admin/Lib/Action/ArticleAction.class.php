<?php
#++++++++++++++++++++++++++++++++++++++
#FileName:ArticleAction.class.php
#++++++++++++++++++++++++++++++++++++++
#Function:
#++++++++++++++++++++++++++++++++++++++
#Author:MaxWei
#++++++++++++++++++++++++++++++++++++++
#Data:2015年4月21日
#++++++++++++++++++++++++++++++++++++++
#Time:下午8:50:49
#++++++++++++++++++++++++++++++++++++++
class ArticleAction extends CommonAction{
	function index(){
		$db = M('News');
		import('ORG.Util.Page');// 导入分页类
		$count = $db->count();
		$Page = new Page($count,20);
		$show = $Page->show();
		$list = $db->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('page',$show);
		$this->assign('list',$list);
		$this->display();
	}
	function search(){
		$keyword = $_POST['keyword'];
		$keyword = trim($keyword);
		$remember['keyword'] = $keyword;
		$map['title'] = array('like','%'.$keyword.'%');
		$db = M('News');
		import('ORG.Util.Page');// 导入分页类
		$count = $db->where($map)->count();
		$Page = new Page($count,20);
		$show = $Page->show();
		$list = $db->where($map)->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('page',$show);
		$this->assign('list',$list);
		$this->assign('remember',$remember);
		$this->display('index');
	}
	function del(){
		$id = $_GET['id'];
		if($id == null){
			$this->error('参数错误');
		}
		$db = M('News');
		if($db->delete($id)){
			//成功提示
			save_log('删除新闻成功',1);
			$this->success('删除新闻成功！');
		}else{
			//错误提示
			save_log('删除新闻失败',0);
			$this->error('服务器忙碌，请稍后！');
		}
	}
	function add(){
		$this->display();
	}
	function insert(){
		$data = $_POST;
		$data['addtime'] = strtotime($_POST['addtime']);
		$db = M('News');
		if($db->add($data)){
			//成功提示
			save_log('添加新闻成功',1);			
			$this->success('添加新闻成功！');
		}else{
			//错误提示
			save_log('添加新闻失败',0);
			$this->error('服务器忙碌，请稍后！');
		}
	}
	function edit(){
		$id = $_GET['id'];
		if($id == null){
			$this->error('参数错误');
		}
		$db = M('News');
		$vo = $db->find($id);
		$this->assign('vo',$vo);
		$this->display();
	}
	function modify(){
		$data = $_POST;
		$data['addtime'] = strtotime($_POST['addtime']);
		
		$db = M('News');
		if($db->data($data)->save()){
			//成功提示
			save_log('修改新闻成功',1);
			$this->success('修改新闻成功！');
		}else{
			//错误提示
			save_log('修改新闻失败',0);
			$this->error('服务器忙碌，请稍后！');
		}
	}
	
	function company(){
		$company = M('company')->find();
		$this->assign('com',$company); 
		$this->display('company');
	}
	
	function edit_c(){
		$result = M('company')->save($_POST);
		$this->company();
	}
}
?>