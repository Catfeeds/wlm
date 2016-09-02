<?php
#++++++++++++++++++++++++++++++++++++++
#FileName:ProvinceController.class.php
#++++++++++++++++++++++++++++++++++++++
#Function:省份管理
#++++++++++++++++++++++++++++++++++++++
#Author:MaxWei
#++++++++++++++++++++++++++++++++++++++
#Data:2015年4月6日
#++++++++++++++++++++++++++++++++++++++
#Time:下午6:54:47
#++++++++++++++++++++++++++++++++++++++
namespace Admin\Controller;
use Think\Controller;
class ProvinceController extends CommonController{
	function _empty(){
		$this->error(ACTION_NAME.'方法不存在!');
	}
	function index(){
		$this->assign('page_name','地图管理');
		$Province = M('Province');
		$list = $Province->select();
		$this->assign('list',$list);
		$this->display();
	}
	function modify(){
		$Province = M('Province');
		$data['intro'] = I('v');
		$data['id'] = I('k');
		if($Province->data($data)->save()){
			$this->ajaxReturn(array('msg'=>'修改成功','no'=>9));
		}else{
			$this->ajaxReturn(array('msg'=>'修改失败','no'=>8));
		}
	}
}
?>