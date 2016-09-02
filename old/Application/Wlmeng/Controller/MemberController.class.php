<?php
namespace Wlmeng\Controller;
use Wlmeng\Controller\ParentController;
class MemberController extends ParentController{
	public function _empty(){
		
	}
	/**
	  * author         肖萌
	  * describe	  跳转至注册页面
	  * parameter
	  * return
	  */
	public function goRegister(){
		$this->display('reg');
	}
	/**
	  * author         肖萌
	  * describe	验证验证码	
	  * parameter
	  * return
	  */
	public function checkVerify(){
		$verifyCode = trim(I('post.verify'));
		$result = A('Common')->checkVerify($verifyCode);
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
	  * describe	  注册用户
	  * parameter	data   1:用户名重复		2:注册失败		3：不是ajax传参
	  * return
	  */
	public function register(){
		if (!IS_AJAX) {
			$data = 3;
			$this->ajaxReturn($data);
			exit;
		}
		$member['username'] = trim(I('post.username'));
		$member['pwd'] = md5(md5(trim(I('post.repassword'))));
		$member['tel'] = trim(I('post.telphone'));
		$member['regtime'] = time();
		$member['regip'] = get_client_ip();
		$member['lock'] = 1;
		
		$check_result1 = M('member')->where("username='%s'",$member['username'])->find();
		if ($check_result1 != null) {
			$data = 1;
			$this->ajaxReturn($data);
			exit;
		}
		$check_result2 = M('member')->where("tel='%s'",$member['tel'])->find();
		if ($check_result2 != null) {
			$data = 3;
			$this->ajaxReturn($data);
			exit;
		}
		
		$add_result = D('Member')->addMember($member);
		if ($add_result) {
			$data = 0;
		}
		else{
			$data = 2;
		}
		$this->ajaxReturn($data);
		
	}
	
	/**
	 * author         肖萌
	 * describe	              用户登录
	 * parameter
	 * return
	 */
	public function goLogin(){
		$this->display('login');
	}
	
	/**
	  * author         肖萌
	  * describe	  登录
	  * parameter	data  1:用户不存在	  2：密码有误	3:不是ajax传值
	  * return
	  */
	public function doLogin(){
		$auto = $_COOKIE['auto_login'];

		if (!IS_AJAX) {
			$data = 3;
			$this->ajaxReturn($data);
			exit;
		}
		$login['username'] = trim(I('post.d3JndY'));
		$login['lock'] = 1;
		$password = md5(md5(trim(I('post.R4M7Rp'))));
		
		
		
		$login_res = M('member')->where($login)->field('id,pwd,face')->find();
		if ($login_res == null) {
			$data = 1;
		}
		else if($login_res['pwd'] != $password){
			$data = 2;
		}
		else{
			$_SESSION['memberid'] = $login_res['id'];
			$_SESSION['membercode'] = $login['username'];
			$_SESSION['face'] = $login_res['face'];
			
			$auto = $_COOKIE['auto_login'];
			$keep = I('post.keep');
			if ($auto == null && $keep == '1') {
				$auto = $_SESSION['memberid']."|".$_SESSION['membercode']."|".$_SESSION['face']."|".get_client_ip();
				$auto = A('Common')->checkAutoLogin($auto,0);
				cookie('login',$auto,array('expire'=>1209600,'prefix'=>'auto_'));
			}
			
			$log = array(
				'member_id'	=>		$login_res['id'],
				'ip'		=>		get_client_ip(),
				'time'		=>		time(),
			);
			M('loginlog')->add($log);
			
			$intro = M('person')->where('member_id=%d',$login_res['id'])->field('intro')->find();
			$_SESSION['intro'] = $intro['intro'];
			$data = 0;
		}
		$this->ajaxReturn($data);
	}
	/** 
		* author          肖萌
		* describe		查看个人信息	  
		* parameter		 
		* return		 
		*/
	public function getOneMember(){
		if (!IS_GET) {
			exit;
		}
		$memberid = $_SESSION['memberid'];
		if ($memberid == null){
			$this->redirect('Member/goLogin');
		}
		$member = M('person')->alias('p')
			 	  ->join('th_member m on m.id = p.member_id')
			 	  ->where('p.member_id=%d',$memberid)
			 	  ->field('p.member_id,p.ability_id,p.province_id,p.city_id,p.`work`,p.education,p.intro,p.objective_id,m.face')
			 	  ->find();
		$province = null;
		if ($member['province_id'] != null) {
			$province = M('province')->where('id=%d',$member['province_id'])->field('name as pname')->find();
		}
		$member['pname'] = $province['pname'];
		
		$city = null;
		if ($member['city_id']) {
			$city = M('city')->where('id=%d',$member['city_id'])->field('name as cname')->find();
		}
		$member['cname'] = $city['cname'];
		
		if ($member['ability_id'] != null) {
			$ability = explode('|',$member['ability_id']);
			$ability_str = A('Common')->changetoStr($ability);
			$aname_a = M('ability')->where("id in (".$ability_str.")")->field('aname')->select();
			for($i = 0 ; $i < count($aname_a) ; $i ++){
				$aname[$i] = $aname_a[$i]['aname'];
			}
			$member['aname'] = A('Common')->changetoStr($aname);
		}
		else{
			$member['aname'] = null;
		}
		
		
		if ($member['objective_id'] != null) {
			$objective = explode('|', $member['objective_id']);
			$objective_str = A('Common')->changetoStr($ability);
			$oname_a = M('objective')->where("id in(".$objective_str.")")->field('oname')->select();
			for($i = 0 ; $i < count($oname_a) ; $i ++){
				$oname[$i] = $oname_a[$i]['oname'];
			}
			$member['oname'] = A('Common')->changetoStr($oname);
		}
		else{
			$member['oname'] = null;
		}

		$this->assign('member',$member);
		$this->display('Member/dashboard');
	}
	
	/** 
	 * author          肖萌
	 * describe	  	退出登录
	 * parameter		 
	 * return		 
	 */
	public function outLogin(){
		session(null);
		cookie(null,'auto_');
		$this->redirect('Index/index');
	}
	
	/** 
	 * author          肖萌
	 * describe	  	跳转到个人信息编辑页面
	 * parameter		 
	 * return		 
	 */
	public function goEdit(){
		$memberid = $_SESSION['memberid'];
		$province = M('province')->where('id <> 0')->select();
		$ability = getAbility();
		$objective = getObiective();
		$domain = getDomain();
		
// 		$pro_this = M('person')->where('member_id=%d',$memberid)->field('province_id')->find();
// 		$city_this = M('person')->where('member_id=%d',$memberid)->field('city_id')->find();
		
		$memberinfo = M('member')->alias('m')
					  ->join('th_person as p on p.member_id = m.id')
					  ->where('m.id=%d',$memberid)
					  ->field('m.face,m.email,m.blogurl,m.qq,m.tel,p.education,p.work,p.intro,p.objective_id,p.domain_id,p.city_id,p.province_id,p.ability_id')
					  ->find();
		if ($memberinfo['province_id'] != null or $memberinfo['province_id'] != 0) {
			$city = M('city')->alias('c')
					->join('th_province p on c.provincecode = p.code')
					->where('p.id=%d',$memberinfo['province_id'])
					->field('c.id,c.name')
					->select();
		}
		
		$ability_str = $memberinfo['ability_id'];
		if ($ability_str != null) {
			$ability_arr = A('Common')->chengeToArray($ability_str);
			for($i = 0; $i<count($ability_arr) ; $i ++){
				for($j = 0 ; $j < count($ability); $j ++){
					if ($ability_arr[$i] == $ability[$j]['id']) {
						$ability[$j]['ischecked'] = 1;
					}
					else if($ability[$j]['ischecked'] != 1){
						$ability[$j]['ischecked'] = 0;
					}
				}
				
			}
		}
		
		$objective_str = $memberinfo['objective_id'];
		if ($objective_str != null) {
			$objective_arr = A('Common')->chengeToArray($objective_str);
			for ($i = 0 ; $i < count($objective_arr) ; $i ++){
				for($j = 0 ; $j < count($objective); $j ++){
					if ($objective_arr[$i] == $objective[$j]['id']) {
						$objective[$j]['ischecked'] = 1;
					}
					else if($objective[$j]['ischecked'] != 1){
						$objective[$j]['ischecked'] = 0;
					}
				}
			}
		}
		
		$domain_str = $memberinfo['domain_id'];
		if ($domain_str != null) {
		$domain_arr = A('Common')->chengeToArray($domain_str);
			for ($i = 0 ; $i < count($domain_arr) ; $i ++){
				for($j = 0 ; $j < count($domain); $j ++){
					if ($domain_arr[$i] == $objective[$j]['id']) {
						$domain[$j]['ischecked'] = 1;
					}
					else if($domain[$j]['ischecked'] != 1){
						$domain[$j]['ischecked'] = 0;
					}
				}
			}
		}
		$this->assign('province',$province);
		$this->assign('ability',$ability);
		$this->assign('objective',$objective);
		$this->assign('domain',$domain);
		$this->assign('city',$city);
		$this->assign('memberinfo',$memberinfo);

		$this->display('Member/edit');
	}
	
	/** 
	 * author          肖萌
	 * describe	  	ajax根据省获取下级市
	 * parameter		 
	 * return		 
	 */
	public function getCity(){
		if (!IS_AJAX) {
			;
		}
		$province_id = trim(I('get.province_id'));
		
		$city = A('Common')->getCity($province_id);
		$this->ajaxReturn(json_encode($city));
	}
	
	/**
	  * author         肖萌
	  * describe	修改个人信息	
	  * parameter
	  * return
	  */
	public function doEditor(){
		if (!IS_AJAX) {
			exit;
		}
		
		$memberid = $_SESSION['memberid'];
		
		$person['province_id'] = trim(I('post.prov_select'));
		$person['city_id'] = trim(I('post.city_select'));
		$person['education'] = trim(I('post.education'));
		$person['work'] = trim(I('post.everjob'));
		$person['intro'] = I('post.des');
		
		$ability = I('post.front_user_skill_id');
		$objective = I('post.front_user_goal_id');
		$domain = I('post.front_scope_id');
		
		$member['blogurl'] = trim(I('post.weibo'));
		$member['tel'] = trim(I('post.mobile'));
		$member['qq'] = trim(I('post.qq'));
		
		$person['ability_id'] = A('Common')->changetoStr_1($ability);
		$person['objective_id'] = A('Common')->changetoStr_1($objective);
		$person['domain_id'] = A('Common')->changetoStr_1($domain);
		
		$result = D('Member')->updateMember($memberid,$person,$member);
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
	  * describe	  上传头像
	  * parameter
	  * return
	  */
	public function uploadFace(){
		$memberid = $_SESSION['memberid'];
		$back = A('Common')->uploadImages('face');
		if ($back['result'] == 0) {
			$src = "./Uploads".$back[0]['url'].$back[0]['name'];
			$src_s ='./Uploads'.$back[0]['url'].'s_'.$back[0]['name'];
			
			$width = '400';
			$height = '400';
			$sname = 's_';
			
			$face_old = M('member')->where('id=%d',$memberid)->field('face')->find();
			if ($face_old['face'] != null) {
				if (file_exists ( $face_old['face'] )) {
					unlink($face_old['face']);
				}
			}
			
			A('Common')->createThumb($back[0]['url'],$back[0]['name'],$width,$height,'s_');
			if (file_exists($src)) {
				unlink($src);
			}
			
			$face['face'] = $src_s;
			$result = M('member')->where('id=%d',$memberid)->data($face)->save();
			if ($result !== false) {
				echo "<script>window.parent.uploadFaceRes('" . $src_s . "','1');</script>";
			}
		}
		else if($back['result'] == 1){
			echo "<script>window.parent.uploadFaceRes('','2');</script>";
		}
	}
	
	public function goAddShow(){
		$showme = M('showme')->where('member_id=%d',$_SESSION['memberid'])->select();
		$this->assign('showme',$showme);
		$this->display('upload');
	}
	
	public function doAddShow(){
		$id = trim(I('post.id'));
		$showme['content'] = trim(I('post.content'));
		$showme['member_id'] = $_SESSION['memberid'];
		if ($showme['member_id'] == null) {
			$this->goLogin();
			exit;
		}
		if ($showme['content'] == "") {
			echo "<script>window.parent.addShowme('个人介绍不可为空',0);</script>";
			exit;
		}
		if ($_FILES['pic']['size'] == 0) {
			echo "<script>window.parent.addShowme('图片不可为空',0);</script>";
			exit;
		}
		$img_back = A('Common')->uploadImages('showme');
		if ($img_back['result'] == 0) {
			$showme['pic'] = "./Uploads".$img_back[0]['url'].$img_back[0]['name'];;
		}
		else{
			echo "<script>window.parent.addShowme('上传头像失败',0);</script>";
			exit;
		}
		
		if ($id != "") {
			$showme_this = M('showme')->where('id=%d',$id)->field('pic')->find();
			unlink($showme_this['pic']);
			$result = M('showme')->where('id=%d',$id)->data($showme)->save();
		}
		else{
			$result = M('showme')->data($showme)->add();
		}
		if ($result !== false) {
			echo "<script>window.parent.addShowme('上传成功',1);</script>";
		}
	}
	
	
	
}