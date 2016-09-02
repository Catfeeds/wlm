<?php
namespace Admin\Controller;
use Think\Controller;
class ParentController extends Controller{
	function _initialize() {
		header("Content-Type:text/html; charset=utf-8");
		$this->checkLogin();
	}
	
	/** 
	 * author          肖萌
	 * describe	  	判断是否登陆
	 * parameter		 
	 * return		 
	 */
	private function checkLogin(){
		$userid = $_SESSION['hrfd_adminid'];
		if ($userid == null) {
			$this->redirect('Login/login');
		}
	}
}