<?php
#++++++++++++++++++++++++++++++++++++++
#FileName:CommonAction.class.php
#++++++++++++++++++++++++++++++++++++++
#Function:
#++++++++++++++++++++++++++++++++++++++
#Author:MaxWei
#++++++++++++++++++++++++++++++++++++++
#Data:2015年4月29日
#++++++++++++++++++++++++++++++++++++++
#Time:下午8:22:45
#++++++++++++++++++++++++++++++++++++++
class CommonAction extends Action{
	function _initialize(){
		/*设置编码*/
		header("Content-type: text/html; charset=utf-8");
		/*设置时区*/
		date_default_timezone_set('PRC'); //设置中国时区
		$this->isMobile();
		$this->getNav();
		$this->getKeyword();
	}
	
	/** 
	 * author          肖萌
	 * describe	  	移动端跳转到mobile
	 * parameter		 
	 * return		 
	 */
	private function isMobile(){
		$is = isMobile();
		if ($is) {
			echo "<script>window.location.href='http://weilaimen.org/zc/mobile.php'</script>";
			exit;
		}
	}
	
	/** 
	 * author          肖萌
	 * describe	  		获取导航
	 * parameter		 
	 * return		 
	 */
	private function getNav(){
		$nav = getNav();
		for ($i = 0 ; $i < count($nav) ; $i ++){
			$url = U($nav[$i]['u_module'].'/'.$nav[$i]['u_action']);
			if ($nav[$i]['u_param'] != '') {
				$url .= '&'.$nav[$i]['u_param'];
			}
			$nav[$i]['url'] = $url;
			$nav[$i]['next'] = "";
		}
		$cate = getDealCate();
		for ($j = 0 ; $j < count($cate) ; $j++ ){
			$url = U('Deals/index',array('tid'=>$cate[$j]['id']));
			$cate[$j]['url'] = $url;
		}
		$nav[1]['next'] = $cate;
		$this->assign('nav',$nav);
	}
	
	/** 
	 * author          肖萌
	 * describe	  	获取keyword
	 * parameter		 
	 * return		 
	 */
	public function getKeyword(){
		$keyword = M('deal_keyword')->find();
		$this->assign('keyword',$keyword['keyword']);
	}
}

?>