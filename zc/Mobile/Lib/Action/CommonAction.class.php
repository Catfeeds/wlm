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
		$this->getCate();
	}
	
	private function getCate(){
		$cate = getDealCate();
		for ($i = 0 ; $i < count($cate) ; $i ++){
			if ($_SESSION['wlm_mobile_type'] == 1) {
				$cate[$i]['golist_url'] = U('Index/index',array('tid'=>$cate[$i]['id']));
			}
			else if($_SESSION['wlm_mobile_type'] == 2){
				$cate[$i]['golist_url'] = U('Index/rec',array('tid'=>$cate[$i]['id'],'r'=>'rec'));
			}
			
		}
		$this->assign('cate',$cate);
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
}

?>