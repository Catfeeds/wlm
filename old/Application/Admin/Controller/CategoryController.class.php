<?php
#++++++++++++++++++++++++++++++++++++++
#FileName:CategoryController.class.php
#++++++++++++++++++++++++++++++++++++++
#Function:栏目管理
#++++++++++++++++++++++++++++++++++++++
#Author:MaxWei
#++++++++++++++++++++++++++++++++++++++
#Data:2015年4月11日
#++++++++++++++++++++++++++++++++++++++
#Time:下午7:02:14
#++++++++++++++++++++++++++++++++++++++
namespace Admin\Controller;
use Think\Controller;
class CategoryController extends CommonController{
	function _empty(){
		$this->error(ACTION_NAME.'方法不存在!');
	}
	function index(){
		$this->assign('page_name','栏目管理');
		$Category = M('Category');
		$list = $Category->select();
		$this->assign('list',$list);
		$this->display();
	}
	function modify(){
		if(!IS_POST){
			$this->error('非法操作！');
		}
		$data['id'] = I('id',0,'intval');
		if($_FILES['pic']['tmp_name'] != ''){
			$data['pic'] = $this->upload();
		}else{
			$this->error('请选择上传图片');
		}
		$Category = M('Category');
		if($Category->data($data)->save()){
			$this->success('修改成功！');
		}else{
			$this->error('修改失败！');
		}
	}
	function edit(){
		$data = $_POST;
		$Category = M('Category');
		if($Category->data($data)->save()){
			$this->success('修改成功！');
		}else{
			$this->error('修改失败！');
		}
	}
	public function upload(){
		$upload = new \Think\Upload();// 实例化上传类
		$upload->maxSize = 3145728 ;// 设置附件上传大小
		$upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		$upload->rootPath = './Uploads/category/'; // 设置附件上传根目录
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