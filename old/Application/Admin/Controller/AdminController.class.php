<?php
#++++++++++++++++++++++++++++++++++++++
#FileName:AdminController.class.php
#++++++++++++++++++++++++++++++++++++++
#Function:管理员控制器
#++++++++++++++++++++++++++++++++++++++
#Author:MaxWei
#++++++++++++++++++++++++++++++++++++++
#Data:2015-3-7
#++++++++++++++++++++++++++++++++++++++
#Time:上午09:26:14
#++++++++++++++++++++++++++++++++++++++
namespace Admin\Controller;
use Think\Controller;
class AdminController extends CommonController{
	function _empty(){
		$this->error(ACTION_NAME.'方法不存在!');
	}
	
	function index(){		
		$Admin=M('admin');
		$list=$Admin->select();
		$this->assign('list',$list);
		$this->assign('page_name','管理员管理');
		$this->display();		
	}
	
	function pwd(){
		$this->assign('page_name','修改密码');
		$this->display();
	}
	
	function modify_pwd(){
		if(!IS_POST){
			$this->error('非法操作！');
		}
		$data['id']=session(C('USER_AUTH_KEY'));
		$data['pwd']=I('pwd','','md5,md5');
		$Admin=M('admin');
		if($Admin->data($data)->save()){
			$this->success('修改密码成功，即将跳转登陆页面！',U('Login/out'));
		}else{
			$this->error('修改密码失败');
		}
	}
	
	function add(){
		$this->assign('page_name','管理员管理');
		$this->display();
	}
	
	function lock($id=null,$status=null){
		$data['id']=$id;
		$status=$status==1?'0':'1';
		$data['status']=$status;
		$Admin=M('admin');
		$Admin->data($data)->save();
		$this->redirect(U('Admin/index'));
	}
	
	function edit($id=null){
		$this->assign('page_name','管理员管理');
		$Admin=M('admin');
		$vo=$Admin->find($id);
		$this->assign('vo',$vo);
		$this->display();
	}
	
	function insert(){
		if(!IS_POST){
			$this->error('非法操作！');
		}
		$data['name']=I('name','');
		$data['pwd'] = I('pwd','','md5,md5');
		$Admin=M('admin');
		$id=$Admin->where(array('name'=>$data['name']))->getField('id');
		if($id > 0){
			$this->error('该账号已经存在！');
		}
		if($Admin->data($data)->add()){
			$this->success('添加账号成功！',U('Admin/index'));
		}else{
			$this->error('添加账号失败！');
		}
	}
	
	function modify(){
		if(!IS_POST){
			$this->error('非法操作！');
		}
		$data['id'] = I('id',0,'intval');
		$data['name'] = I('name','');
		$Admin=M('admin');
		$id=$Admin->where(array('name'=>$data['name']))->getField('id');
		if($id > 0){
			$this->error('该账号已经存在！');
		}
		if($Admin->data($data)->save()){
			$this->success('修改账号成功！',U('Admin/index'));
		}else{
			$this->error('修改账号失败！');
		}
	}
	
	function del($id=null){
		$id=I('id',0,'intval');
		$Admin=M('admin');
		if($Admin->delete($id)){
			$this->success('删除账号成功！',U('Admin/index'));
		}else{
			$this->error('删除账号失败！');
		}
	}
}
?>