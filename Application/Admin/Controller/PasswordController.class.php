<?php

namespace Admin\Controller;

use Think\Controller;

class PasswordController extends Controller{



	public function modifyPage(){

		$this->assign('error',false);
		$this->assign('msg',null);
		$this->display('Admin/password');


	}




	


	public function modify(){

		$admin_id = $_SESSION['hrfd_adminid'];


		$old_password = I('post.old_password');
		$new_password = I('post.new_password');
		$new_repassword = I('post.new_repassword');


		$admin = M('admin')->where('id=%d',$admin_id)->field('adminname,password')->find();


		if($new_password!=$new_repassword){
			$this->assign('error',true);
			$this->assign('errorMsg','两次输入的密码不一致');
			$this->display('Admin/password');
			return;
		}


		if($admin['password'] != md5($old_password)){
			$this->assign('error',true);
			$this->assign('errorMsg','旧密码错误');
			$this->display('Admin/password');
			return;
		}

		$newPassword =array();
		$newPassword['password'] = md5($new_password);
		M('admin')->where('id=%d',$admin_id)->save($newPassword);

		$this->assign('error',false);
		$this->assign('msg','密码修改成功');
		$this->display('Admin/password');



	
	}

}