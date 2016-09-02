<?php
#++++++++++++++++++++++++++++++++++++++
#FileName:UserAction.class.php
#++++++++++++++++++++++++++++++++++++++
#Function:
#++++++++++++++++++++++++++++++++++++++
#Author:MaxWei
#++++++++++++++++++++++++++++++++++++++
#Data:2015年5月11日
#++++++++++++++++++++++++++++++++++++++
#Time:下午8:30:03
#++++++++++++++++++++++++++++++++++++++
class UserAction extends CommonAction{
	function _empty(){
		$this->error('参数错误');
	}
	function login(){
		$this->display();
	}
	function do_login(){
		$username = trim($_POST['user_name']);
		$userpwd = trim($_POST['user_pwd']);
		if($username == ''){
			$this->error('请填写登陆名称');
		}
		if($userpwd == ''){
			$this->error('请填写登陆密码');
		}
		$db = M('User');
		$map['user_name'] = $username;
		$map['user_pwd'] = md5($userpwd);
		$vo = $db->where($map)->find();
		if($vo == null){
			$this->error('用户名或密码错误');
		}else{
			session('uname',$vo['user_name']);
			session('uid',$vo['id']);
			$this->success('登陆成功，正在跳转到个人中心',U('User/center'));
		}
	}
	function out(){
		$_SESSION = array();
		session_destroy();
		$this->success('安全退出成功，正在跳转首页',U('Index/index'));
	}
	function center(){
		$db = M('User');
		$map['id'] = $_SESSION['uid'];
		$vo = $db->where($map)->find();
		$vo['money'] = number_format($vo['money'],2);
		$this->assign('info',$vo);
		$Action = M('RegionConf');
		$province = $Action->where('pid=1')->select();
		$this->assign('province',$province);
		$this->display();
	}
	
	/*
	 * 更新用户信息
	*/
	public function updateInfo(){
		$db = M('User');
		$map['id'] = $_SESSION['uid'];
	
		$data['city'] = $_POST['city'];
		$data['sex'] = $_POST['sex'];
		$data['intro'] = $_POST['intro'];
		$data['ex_real_name'] = $_POST['truename'];
		if ($data['city'] != null && $data['sex'] != null && $data['intro'] != null && $data['intro'] != null && $data['ex_real_name'] != null) {
			$sql = "update fanwe_user set level_id=2 where id=".$map['id'];
			$dbs = new Model();
			$dbs->execute($sql);
		}
		/*
		 * sql操作是附加有返回值
		* insert返回插入的ID值
		* save操作返回的true/false
		*/
		$voo = $db->where($map)->save($data);
		/*
		 * $voo !== false:sql语句执行，返回为true
		* $voo != false:sql语句执行，数据改变，返回为true
		*/
		if( $voo != false){
			$info = M('user')->where('id=%d',$_SESSION['uid'])->find();
			//echo "<script>alert('操作成功');</script>";//可以直接提示输出
			$this->success('操作成功');//当操作成功时候，跳转会刚才的页面。$this->success('新增成功', 'User（Action）/list（方法）');
		}else{
			//echo "<script>alert('操作失败');</script>";
			$this->error('操作失败');//错误页面的默认跳转页面是返回前一页，通常不需要设置
		}
	
	}
	
	/*
	 * 跳转购物车
	*/
	function goCar(){
		$db = M('User');
		$map['id'] = $_SESSION['uid'];//23
		$vo = $db->where($map)->find();
		$this->assign('info',$vo);
	
		$db = M('Deal');
		$sqlstring = "select deal_id from fanwe_deal_focus_log where user_id = 17";//.$map['id'];
		// 		$vooo = $db->execute($sqlstring);
		$vooo = $db->query($sqlstring);
	
		for ($i = 0 ; $i < count($vooo); $i ++){
			$deal[$i] = $vooo[$i]['deal_id'];
		}
		$deal_s = A('Common')->changetoStr($deal);
		$sqlstring1 = "select * from fanwe_deal where id in (".$deal_s.")";
		$vooo1 = $db->query($sqlstring1);
			
		$this->assign('proinfo',$vooo1);
		$this->display("User/Car");
		// 		echo $sqlstring1;
		//  		dump($vooo1);
		// 	 	exit;
	
	
	}
	
	function register(){
		$this->display();
	}
	
	function insert(){
		if(!$this->checkCode()){
			$data = 2;
			$this->ajaxReturn($data);
			exit;
		}
		
		$user['user_name'] = $_POST['user_name'];
		$user['user_pwd'] = md5($_POST['user_pwd']);
		$user['create_time'] = time();
		$user['update_time'] = time();
		$user['is_effect'] = 1;
		$user['money'] = 0;
		$user['login_time'] = time();
		$user['login_ip'] = get_client_ip();
		
		$result = M('User')->add($user);
		if ($result) {
			$data = 0;
		}
		else{
			$data = 1;
		}
		$this->ajaxReturn($data);
	}
	
	/**
	 * author         肖萌
	 * describe	  验证手机验证码
	 * parameter
	 * return
	 */
	public function checkCode(){
		if (!IS_AJAX) {
			exit;
		}
		$code = $_POST['code'];
		if ($code == $_SESSION['wlm_code']) {
			return true;
		}
		else{
			return false;
		}
	}
	
	/**
	 * author         肖萌
	 * describe	  发送手机验证码
	 * parameter
	 * return
	 */
	public function sendCode(){
		if (!IS_AJAX) {
			exit;
		}
		$telphone = $_POST['telphone'];
		//$telphone = "18622306940";
	
		$code = rand(1000, 9999);
	
		$msg = "【未来门】您的手机验证码为".$code.",请输入后继续注册";
	
		$result = A('Information')->sendMsg($telphone,$msg);
		#$result = "03,M686281150611091539"."||".$telphone;
		$back = explode(',',$result);
	
		if ($back[0] == "03") {
			$_SESSION['wlm_code'] = $code;
			#$_SESSION['wlm_code'] = 1111;
			$data = 0;
		}
		else{
			$data = 1;
				
		}
		$this->ajaxReturn($data);
	}
}

?>