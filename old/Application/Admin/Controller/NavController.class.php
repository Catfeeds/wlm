<?php
#++++++++++++++++++++++++++++++++++++++
#FileName:NavController.class.php
#++++++++++++++++++++++++++++++++++++++
#Function:导航控制器
#++++++++++++++++++++++++++++++++++++++
#Author:MaxWei
#++++++++++++++++++++++++++++++++++++++
#Data:2015-3-8
#++++++++++++++++++++++++++++++++++++++
#Time:上午12:07:36
#++++++++++++++++++++++++++++++++++++++
namespace Admin\Controller;
use Think\Controller;
class NavController extends CommonController{
	function _empty(){
		$this->error(ACTION_NAME.'方法不存在!');
	}
	
	function index(){
		$this->assign('page_name','导航管理');
		$Nav=M('Nav');
		$list=$Nav->order('sort asc')->select();
		$this->assign('list',$list);
		$this->display();
	}
	
	function add(){
		$this->assign('page_name','导航管理');
		$this->display();
	}
	
	function insert(){
		if(!IS_POST){
			$this->error('非法操作！');
		}
		$data=$_POST;
		$data=_htmlhandle($data);
		$Nav=M('Nav');
		$data['pic'] = $this->upload();
		if($Nav->data($data)->add()){
			$this->success('新增导航成功！',U('Nav/index'));
		}else{
			$this->error('新增导航失败');
		}
	}
	
	function del($id=null){
		$Nav=M('Nav');
		if($Nav->delete($id)){
			$this->success('删除导航成功！',U('Nav/index'));
		}else{
			$this->error('删除导航失败');
		}
	}
	
	function lock($id=null,$isshow=null){
		$data['id']=$id;
		$isshow=$isshow==1?'0':'1';
		$data['isshow']=$isshow;
		$Nav=M('Nav');
		$Nav->data($data)->save();
		$this->redirect(U('Nav/index'));
	}
	
	function edit($id=null){
		$this->assign('page_name','导航管理');
		$Nav=M('Nav');
		$vo=$Nav->find($id);
		$this->assign('vo',$vo);
		$this->display();
	}
	
	function modify(){
		if(!IS_POST){
			$this->error('非法操作！');
		}
		$data=$_POST;
		$data=_htmlhandle($data);
		if($_FILES['pic']['tmp_name'] != ''){
			$data['pic'] = $this->upload();
		}
		$Nav=M('Nav');
		if($Nav->data($data)->save()){
			$this->success('修改导航成功！',U('Nav/index'));
		}else{
			$this->error('修改导航失败');
		}
	}
	
    public function upload(){
	    $upload = new \Think\Upload();// 实例化上传类
	    $upload->maxSize = 3145728 ;// 设置附件上传大小
	    $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
	    $upload->rootPath = './Uploads/nav/'; // 设置附件上传根目录
	    $upload->autoSub = true;
		$upload->subName = array('date','Ymd');
		$rootpath=$upload->rootPath;
	    // 上传单个文件
	    $info = $upload->uploadOne($_FILES['pic']);
	    if(!$info) {// 上传错误提示错误信息
	    	$this->error($upload->getError());
	    }else{// 上传成功 获取上传文件信息
	    	return $rootpath.$info['savepath'].$info['savename'];
	    }
    }
}
?>