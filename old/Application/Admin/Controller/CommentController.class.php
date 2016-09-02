<?php
#++++++++++++++++++++++++++++++++++++++
#FileName:CommentController.class.php
#++++++++++++++++++++++++++++++++++++++
#Function:评论控制器
#++++++++++++++++++++++++++++++++++++++
#Author:MaxWei
#++++++++++++++++++++++++++++++++++++++
#Data:2015-3-12
#++++++++++++++++++++++++++++++++++++++
#Time:下午06:54:05
#++++++++++++++++++++++++++++++++++++++
namespace Admin\Controller;
use Think\Controller;
class CommentController extends CommonController{
	function _empty(){
		$this->error(ACTION_NAME.'方法不存在!');
	}
	function index(){
		$this->assign('page_name','评论管理');
		$Comment=M('Comment');
		$count = $Comment->count();
		$Page = new \Think\Page($count,C('PAGE_NUM'));
		$Page->setConfig("theme","%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER% %NOW_PAGE%/%TOTAL_PAGE% 页 ");
		$show = $Page->show();
		$list=$Comment->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('list',$list);
		$this->assign('page',$show);
		$this->display();
	}
	function del($id=null){
		$Comment=M('Comment');
		if($Comment->delete($id)){
			$this->success('删除评论成功！');
		}else{
			$this->error('删除评论失败');
		}
	}
	function lock($id=null,$isshow=null){
		$Comment=M('Comment');
		if($isshow == 1){
			$data['isshow'] = 0;
		}else {
			$data['isshow'] =1;
		}
		$data['id'] = $id;
		if($Comment->data($data)->save()){
			$this->success('修改数据成功！');
		}else{
			$this->error('修改数据失败');
		}
	}
	function search(){
		$this->assign('page_name','评论查找');
		$map=$_POST;
		foreach ($map as $k=>$v){
			$map[$k] = trim($v);
			if($map[$k] == ''){
				unset($map[$k]);
			}
		}
		$Comment=M('Comment');
		$count=$Comment->where($map)->count();
		$Page = new \Think\Page($count,C('PAGE_NUM'));
		foreach ($map as $key=>$val){
			$Page->parameter[$key]   =   urlencode($val);
		}	
		$Page->setConfig("theme","%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER% %NOW_PAGE%/%TOTAL_PAGE% 页 ");
		$show = $Page->show();
		$list=$Comment->where($map)->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('list',$list);
		$this->assign('rember',$map);
		$this->assign('page',$show);
		$this->display();
	}
}
?>