<?php
#++++++++++++++++++++++++++++++++++++++
#FileName:LoginController.class.php
#++++++++++++++++++++++++++++++++++++++
#Function:登陆控制器
#++++++++++++++++++++++++++++++++++++++
#Author:MaxWei
#++++++++++++++++++++++++++++++++++++++
#Data:2015-3-6
#++++++++++++++++++++++++++++++++++++++
#Time:下午09:03:40
#++++++++++++++++++++++++++++++++++++++
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller{
	function _empty(){
		$this->error(ACTION_NAME.'方法不存在!');
	}
	
	function index(){
		$this->display();
	}
	
	function check(){
		if(!IS_POST){
			$this->error('非法操作');
		}else{
			$username=I('username','');
			$password=I('pwd','','md5,md5');
			$Admin=M('Admin');
			$result=$Admin->where(array('name'=>$username,'pwd'=>$password))->find();
			if(empty($result)){
				$this->error('用户名或密码错误！');
			}
			if($result['level'] != 1){
				if($result['status'] == 0){
					$this->error('账号已被锁定，请联系超级管理员！');
				}
			}
			
			$userid=$result['id'];
			$this->modify($userid);
			session(C('USER_AUTH_KEY'),$userid);
			session('user_level',$result['level']);			
			$this->success('登陆成功，欢迎回来！',U('Index/index'));
		}
	}
	
	function out(){
		$_SESSION[C('USER_AUTH_KEY')]=null;
		$this->success('退出后台成功',U('Login/index'));
	}
	
	function modify($id=1){
		$Admin=M('Admin');
		$data['logintime']=time();
		$data['loginip']=get_client_ip();
		$data['id']=$id;
		$Admin->data($data)->save();		
	}
}
?>