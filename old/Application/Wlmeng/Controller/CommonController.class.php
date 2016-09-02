<?php
/**

  * 文件名 CommonController

  * ==============================================
  
  * @date: 2015-3-23

  * @author: 肖萌

  * @version: 公共方法class

  */
namespace Wlmeng\Controller;
use Wlmeng\Controller\ParentController;
class CommonController extends ParentController{
	/** 
	 * author          肖萌
	 * describe		  生成验证码
	 * parameter		 
	 * return		 
	 */
	public function Verify(){
		$config =    array(
				'fontSize'    =>    30,    // 验证码字体大小
				'length'      =>    4,     // 验证码位数
				'useNoise'    =>    false, // 关闭验证码杂点
				'fontttf' 	  =>   '5.ttf',
				'useImgBg'	  =>    true,
		);
		$Verify =     new \Think\Verify($config);
		$Verify->entry();
	}
	
	/**
	 * author          肖萌
	 * describe		 验证验证码输入是否正确
	 * parameter
	 * return
	 */
	public function checkVerify($code, $id = ''){
		$verify = new \Think\Verify();
		return $verify->check($code, $id);
	}
	
	/** 
	 * author          肖萌
	 * describe		 跳转到404页面 
	 * parameter		 
	 * return		 
	 */
	public function go_404(){
		
	}
	
	/** 
	 * author          肖萌
	 * describe	   	数组转“，”分割的字符串
	 * parameter		 
	 * return		 
	 */
	public function changetoStr($array){
		for ($i = 0; $i < count($array) ; $i ++){
			$str .= $array[$i].",";
		}
		return substr($str,0,-1);
	}
	
	/**
	  * author         肖萌
	  * describe	数组转“|”分割的字符串
	  * parameter
	  * return
	  */
	public function  changetoStr_1($array){
		for ($i = 0; $i < count($array) ; $i ++){
			$str .= $array[$i]."|";
		}
		return substr($str,0,-1);
	}
	
	/**
	  * author         肖萌
	  * describe	  字符串转数组（|分割）	
	  * parameter
	  * return
	  */
	public function chengeToArray($str){
		$array = explode("|", $str);
		return $array;
	}
	
	/** 
	 * author          肖萌
	 * describe	  	验证用户登录状态
	 * parameter		 
	 * return		 
	 */
	public function checkMembetLogin(){
		$memberid = $_SESSION['memberid'];
		if ($memberid == null) {
			$this->redirect('Member/goLogin');
		}
	}
	
	/** 
	 * author          肖萌
	 * describe	  	根据省获取下级市
	 * parameter		 
	 * return		 
	 */
	public function getCity($privince_id){
		$city = M('city')->alias('c')
				->join('th_province p on p.code = c.provincecode')
				->where('p.code=%d',$privince_id)->field('c.code as id ,c.name')->select();
		return $city;
	}
	
	/**
	 * author         肖萌
	 * describe		上传图片
	 * parameter
	 * return
	 */
	public function uploadImages($path=""){
		$upload = new \Think\Upload();
		$upload->maxSize	=	3145728;	//上传文件大小 3M
		$upload->exts		=	array('jpg','gif','png','jpeg');	//设置附件上传类型
		$upload->rootPath	=	'./Uploads/';		//文件上传根目录
		$upload->savePath	=	'/'.$path.'/';		//文件上传子目录
	
		$info	=	$upload->upload();
		if(!$info){
			//$this->error($upload->getError());		//文件上传错误提示
			$back[0]['result'] = 1;
			$back[0]['error'] = $upload->getError();
		}
		else{
			$i = 0;
			$back[0] = "";
			foreach($info as $file){
				$back[$i]['result'] = 0;
				$back[$i]['url'] = $file['savepath'];
				$back[$i]['name'] = $file['savename'];
				$i++;
			}
		}
		return $back;
	}
	
	public function uploadImagesMore($path="",$key=""){
		$upload = new \Think\Upload();
		$upload->maxSize	=	3145728;	//上传文件大小 3M
		$upload->exts		=	array('jpg','gif','png','jpeg');	//设置附件上传类型
		$upload->rootPath	=	'./Uploads/';		//文件上传根目录
		$upload->savePath	=	'/'.$path.'/';		//文件上传子目录
	
		$info	=	$upload->upload(array($_FILES[$key]));
		if(!$info){
			//$this->error($upload->getError());		//文件上传错误提示
			$back[0]['result'] = 1;
			$back[0]['error'] = $upload->getError();
		}
		else{
			$i = 0;
			$back[0] = "";
			foreach($info as $file){
				$back[$i]['result'] = 0;
				$back[$i]['url'] = $file['savepath'];
				$back[$i]['name'] = $file['savename'];
				$i++;
			}
		}
		return $back;
	}
	
	/**
	 * author         肖萌
	 * describe		生成缩略图
	 * parameter
	 * return
	 */
	public function createThumb($url,$name,$width,$height,$sname){
		$image = new \Think\Image();
		$image->open('./Uploads'.$url.$name);
		$image->thumb($width, $height,\Think\Image::IMAGE_THUMB_FIXED)->save('./Uploads'.$url.$sname.$name);
	}
	
	/**
	  * author         肖萌
	  * describe	  验证是否是登录状态	
	  * parameter
	  * return
	  */
	public function checkLogin(){
		$memberid = $_SESSION['memberid'];
		if ($memberid == null) {
			return false;
		}
		else{
			return true;
		}
	}
	/** 
	  * author          肖萌
	  * describe	  获取分页页码
	  * parameter		 
	  * return		 
	  */
	public function getPage($allnum,$onenum,$thispage){
		$page_num = ceil($allnum / $onenum);
		
		if ($page_num <= 5) {
			for ($i = 0 ; $i <$page_num ; $i ++){
				$page_show[$i]['page'] = $i + 1;
			}
		}
		else if($thispage < 5) {
			for ($i = 0 ; $i < 5 ; $i ++){
				$page_show[$i]['page'] = $i + 1;
			}
		}
		else if($thispage > $page_num-5){
			for($i = $page_num ; $i > 0 ; $i --){
				$page_show[$i]['page'] = $page_num-($i-1);
			}
		}
		else{
			for ($i = 0 ; $i < 7 ; $i ++){
				$page_show[$i]['page'] = $thispage + ($i - 3);
			}
		}
		return $page_show;
	}
	/** 
	 * author          肖萌
	 * describe	  	获取导航下文章
	 * parameter		 
	 * return		 
	 */
	public function getNavarticle($pid){
		$page = trim(I(get.page));
		if ($page == null) {
			$page = 1;
		}
		$page_this = $page;
		$page_next = $page+1;
		
		$allnum = M('nav_article')->where('pid=%d',$pid)->field('count(id) as num')->find();
		$page_show = A('Common')->getPage($allnum['num'],5,$page_this);

		$nav = M('nav_article')->where('pid=%d',$pid)->limit(($page-1)*5,5)->select();
		$re = array(
			'nav'		=>		$nav,
			'page'		=>		$page_show,
		);
		return $re;
	}
	
	public function getArt(){
		$id = trim(I('get.id'));
		$where['id'] = $id;
		$where['isshow'] = 1;
		$atr = M('article')->where($where)->find();
		if ($atr != null) {
			$this->assign('art_a',$atr);
			$this->display('Public/info');
		}
	}
	
	/**
	 * author          肖萌
	 * describe	  	对cookie信息重新编码
	 * parameter
	 * return
	 */
	public function checkAutoLogin($value,$type=0){
		//$key = md5(C('LOGIN_KEY'));
		if($type == 0){
			return base64_encode($value);
		}
	
		$value = base64_decode($value);
		return $value;
	}
	
	public function go404(){
		$this->display('Public/404page');
	}
}