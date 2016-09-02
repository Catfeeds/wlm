<?php
#++++++++++++++++++++++++++++++++++++++
#FileName:IndexController.class.php
#++++++++++++++++++++++++++++++++++++++
#Function:公共控制器
#++++++++++++++++++++++++++++++++++++++
#Author:MaxWei
#++++++++++++++++++++++++++++++++++++++
#Data:2015-3-6
#++++++++++++++++++++++++++++++++++++++
#Time:下午08:22:52
#++++++++++++++++++++++++++++++++++++++
namespace Admin\Controller;
use Think\Controller;
class CommonController extends Controller{
	function _initialize(){
		/*设置编码*/
		header("Content-type: text/html; charset=utf-8");
		/*设置时区*/
		date_default_timezone_set('PRC'); //设置中国时区
		/*是否登录验证*/
		if (!isset($_SESSION[C('USER_AUTH_KEY')])) {
			$this->error('系统检测到您还没有登录',U('Login/index'));
		}
	}
}
?>