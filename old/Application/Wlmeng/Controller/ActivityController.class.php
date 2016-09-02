<?php
namespace Wlmeng\Controller;
use Wlmeng\Controller\ParentController;
class ActivityController extends ParentController{
	/** 
	 * author          肖萌
	 * describe	  	跳转至活动首页
	 * parameter		 
	 * return		 
	 */
	public function goActivity(){
		$page = trim(I('get.page'));
		if ($page == null) {
			$page = 1;
		}
		$page_this = $page;
		$page_next = $page+1;
		
		$allnum = M('actity')->where('isshow=1')->field('count(id) as num')->find();
		
		$page_show = A('Common')->getPage($allnum['num'],5,$page_this);
		
		$show_activity = M('actity')->where('isshow=1 and rec=1')->select();
		for ($i = 0 ; $i < count($show_activity) ; $i ++){
			if ($show_activity[$i]['num_edit'] != '') {
				$show_activity[$i]['num'] = $show_activity[$i]['num_edit'];
			}
			else{
				$show_activity[$i]['num'] = $show_activity[$i]['num_true'];
			}
		}
		
		$activity = M('actity')->limit(($page-1)*5,5)->order('atime desc')->select();
		for ($i = 0 ; $i < count($activity) ; $i ++){
			if (strlen($activity[$i]['content']) > 100) {
				$activity[$i]['content'] = substr($activity[$i]['content'],0,100)."...";
			}
		}
		for ($i = 0 ; $i < count($activity) ; $i ++){
			if ($activity[$i]['num_edit'] != '') {
				$activity[$i]['num'] = $activity[$i]['num_edit'];
			}
			else{
				$activity[$i]['num'] = $activity[$i]['num_true'];
			}
		}
		$this->assign('show_activity',$show_activity);
		$this->assign('page_show',$page_show);
		$this->assign('page_this',$page_this);
		$this->assign('page_next',$page_next);
		$this->assign('page_last',ceil($allnum['num'] / 5));
		$this->assign('activity',$activity);
		$this->display('activity');
	}
	
	/** 
	 * author          肖萌
	 * describe	  	查看一个活动
	 * parameter		 
	 * return		 
	 */
	public function getOneActivity(){
		if (!IS_GET) {
			exit();
		}
		$activityid = I('get.id');
		if ($activityid == null) {
			exit;
		}
		$num['num_true'] = array('exp','num_true+1');
		M('actity')->where('id=%d',$activityid)->data($num)->save();
		$activity = M('actity')->where('id=%d',$activityid)->find();
		if ($activity['num_edit'] != '') {
			$activity['num'] = $activity['num_edit'];
		}
		else{
			$activity['num'] = $activity['num_true'];
		}
		$this->assign('activity',$activity);
		$this->display('activityInfo');
	}
}