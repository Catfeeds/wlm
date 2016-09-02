<?php
#++++++++++++++++++++++++++++++++++++++
#FileName:ArticleController.class.php
#++++++++++++++++++++++++++++++++++++++
#Function:文章控制器
#++++++++++++++++++++++++++++++++++++++
#Author:MaxWei
#++++++++++++++++++++++++++++++++++++++
#Data:2015-3-7
#++++++++++++++++++++++++++++++++++++++
#Time:上午09:26:14
#++++++++++++++++++++++++++++++++++++++
namespace Admin\Controller;
use Think\Controller;
class ArticleController extends CommonController{
	function _empty(){
		$this->error(ACTION_NAME.'方法不存在!');
	}
	function index(){
		$this->assign('page_name','文章管理');
		$Article = M('Article');
		$map['pid'] = 0;
		$list = $Article->where($map)->field('content',true)->select();
		foreach ($list as $k=>$v){
			$list[$k]['child'] = $this->getSon($v['id']);
		}
		$this->assign('list',$list);
		$this->display();
	}
	function lock($id=null,$isshow=null){
		$Article = M('Article');
		if($isshow == 1){
			$data['isshow'] = 0;
		}else {
			$data['isshow'] =1;
		}
		$data['id'] = $id;
		if($Article->data($data)->save()){
			$this->success('修改数据成功！');
		}else{
			$this->error('修改数据失败');
		}
	}
	function del($id=null){
		$Article = M('Article');
		$map['pid'] = $id;
		$count = $Article->where($map)->count();
		if($count > 0){
			$this->error('该栏目下有子级栏目，无法删除!如需删除，请先删除子级栏目！');
		}
		if($Article->delete($id)){
			$this->success('删除数据成功！');
		}else{
			$this->error('删除数据失败');
		}
	}
	function edit($id=null){
		$this->assign('page_name','文章管理');
		$Article = M('Article');
		$vo = $Article->find($id);
		$this->assign('vo',$vo);
		$this->display();
	}
	function modify(){
		if(!IS_POST){
			$this->error('非法操作！');
		}
		$data = $_POST;
		$data['content'] = $data['editorValue'];
		$data=_htmlhandle($data);
		$Article = M('Article');
		if($Article->data($data)->save()){
			$this->success('修改文章成功！',U('Article/index'));
		}else{
			$this->error('修改文章失败');
		}
	}
	
	private function getSon($id=null){
		$Article = M('Article');
		$map['pid'] = $id;
		return $Article->where($map)->field('content',true)->select();
	}
}
?>