<?php
namespace Wlmeng\Controller;
use Wlmeng\Controller\ParentController;
class WShiDaiController extends ParentController{
	/**
	  * author         肖萌
	  * describe	 微时代列表
	  * parameter
	  * return
	  */
	public function goWeiShiDai(){
		$page = trim(I(get.page));
		if ($page == null) {
			$page = 1;
		}
		$page_this = $page;
		$page_next = $page+1;
		
		$allnum = M('nav_article')->where('pid=2')->field('count(id) as num')->find();
		$page_show = A('Common')->getPage($allnum['num'],12,$page_this);
		
		$wshidai = M('nav_article')->where('pid=2 and isshow=1')->limit(($page-1)*12,12)->order('year+0 desc,month+0 desc,day+0 desc')->select();
		for($i = 0 ; $i < count($wshidai) ; $i ++){
			if($wshidai[$i]['from_url'] == ""){
				$wshidai[$i]['alt'] = 0;
			}
			else {
				$wshidai[$i]['alt'] = 1;
			}
				
			if ($wshidai[$i]['num_edit'] != "") {
				$wshidai[$i]['num'] = $wshidai[$i]['num_edit'];
			}
			else{
				$wshidai[$i]['num'] = $wshidai[$i]['num_true'];
			}
		}
		$page_last = end($page_show);
		$this->assign('wsd',$wshidai);
		$this->assign('page_show',$page_show);
		$this->assign('page_this',$page_this);
		$this->assign('page_next',$page_next);
		$this->assign('page_last',ceil($allnum['num'] / 12));
		$this->display('MicroEra');
	}
	
	public function getWsd(){
		$id = I('get.id');
		$num['num_true'] = array('exp','num_true+1');
		M('nav_article')->where('id=%d',$id)->data($num)->save();
		$wsd = M('nav_article')->where('id=%d',$id)->find();
		$this->assign('wsd',$wsd);
		$this->display('WShiDai/MicroEraInfo');
	}
}