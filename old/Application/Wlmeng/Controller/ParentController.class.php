<?php
namespace Wlmeng\Controller;
use Think\Controller;
class ParentController extends Controller{
	public function _initialize() {
		header("Content-Type:text/html; charset=utf-8");
		$this->getNav();
		$this->getCategory();
		$this->getAdv();
		$this->getSystem();
		$this->getArticle();
		$this->autoLogin();
		$this->closeIp();
	}
	
	private function getNav(){
		$this->assign('nav',getNav());
	}
	
	private function getCategory(){
		$this->assign('category',getCategory());
	}
	
	private function getAdv(){
		$adv = M('adv')->select();
		$this->assign('adv',$adv);
	}
	
	private function getSystem(){
		$system = getSystem();
		$this->assign('system',$system);
	}
	
	private function getArticle(){
		$atr = getAtricle();
		$this->assign('atr1',$atr[1]);
		$this->assign('atr2',$atr[2]);
	}
	/** 
	 * author          肖萌
	 * describe	  	自动登陆
	 * parameter		 
	 * return		 
	 */
	private function autoLogin(){
		$memberid = $_SESSION['memberid'];
		$auto = $_COOKIE['auto_login'];
		
		if ($memberid == null && $auto != null) {
			$key = md5(C('LOGIN_KEY'));
			$auto = base64_decode($auto);
			
			$login_msg = explode("|",$auto);
			
			$ip = get_client_ip();
			if ($login_msg[3] == $ip) {
				$_SESSION['memberid'] = $login_msg[0];
				$_SESSION['membercode'] = $login_msg[1];
				$_SESSION['face'] = $login_msg[2];
			}
			
		}
	}
	
	private function closeIp(){
		$ip_this = get_client_ip();
		$ip = M('closeip')->select();
		for ($i = 0 ; $i < count($ip) ; $i ++){
			if ($ip_this == $ip[$i]['ip']) {
				$this->display('Public/404page');
				exit;
			}
		}
	}
	
	
}