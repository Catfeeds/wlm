<?php
#++++++++++++++++++++++++++++++++++++++
#FileName:PublicController.class.php
#++++++++++++++++++++++++++++++++++++++
#Function:Public控制器
#++++++++++++++++++++++++++++++++++++++
#Author:MaxWei
#++++++++++++++++++++++++++++++++++++++
#Data:2015-3-6
#++++++++++++++++++++++++++++++++++++++
#Time:上午10:57:44
#++++++++++++++++++++++++++++++++++++++
namespace Admin\Controller;
use Think\Controller;
class PublicController extends CommonController{
	function _empty(){
		$this->error(ACTION_NAME.'方法不存在!');
	}
	function adv(){
		$this->assign('page_name','广告管理');
		$Adv = M('Adv');
		$list = $Adv->order('id desc')->select();
		$this->assign('list',$list);
		$this->display();
	}
	
	function advinsert(){
		$data=$_POST;
		$data=_htmlhandle($data);
		if($_FILES['pic']['tmp_name'] != ''){
			$data['pic'] = $this->upload();
		}else{
			$this->error('请选择广告图片');die;
		}
		$Adv = M('Adv');
		if($Adv->data($data)->add()){
			$this->success('新增广告成功！');
		}else{
			$this->error('新增广告失败');
		}
	}
	function modify(){
		$data=$_POST;
		$data=_htmlhandle($data);
		if($_FILES['pic']['tmp_name'] != ''){
			$data['pic'] = $this->upload();
		}
		$Adv = M('Adv');
		if($Adv->data($data)->save()){
			$this->success('修改广告成功！');
		}else{
			$this->error('修改广告失败');
		}
	}
	function advdel($id=null){
		if($id == null){
			$this->error('参数错误!');
		}
		$Adv = M('Adv');
		if($Adv->delete($id)){
			$this->success('删除广告成功!');
		}else{
			$this->error('删除广告失败!');
		}
	}
	
	
	public function upload(){
		$upload = new \Think\Upload();// 实例化上传类
		$upload->maxSize = 3145728 ;// 设置附件上传大小
		$upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		$upload->rootPath = './Uploads/adv/'; // 设置附件上传根目录
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