<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller{
	/**
	 * author          肖萌
	 * describe	  	跳转到登陆页面
	 * parameter
	 * return
	 */
	public function login(){
		$this->display('Admin/login');
	}
	
	/**
	 * author          肖萌
	 * describe	  		登陆
	 * parameter	1:用户不存在
	 * return
	 */
	public function doLogin(){
		$login['adminname'] = I('post.username');
		$password = I('post.password');
	
		$admin = M('admin')->where($login)->field('password,id')->find();
	
		if ($admin == null) {
			$data = 1;
			$this->ajaxReturn($data);
			exit;
		}
		else{
			if ($admin['password'] == md5($password)) {
				$data = 0;
				$_SESSION['hrfd_adminid'] = $admin['id'];
				$this->ajaxReturn($data);
			}
			else{
				$data = 2;
				$this->ajaxReturn($data);
			}
		}
	}
}