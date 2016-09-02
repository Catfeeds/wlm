<?php
namespace Wlmeng\Controller;
use Wlmeng\Controller\ParentController;
class ZxrwController extends ParentController{
	public function goZxrw(){
		$page = trim(I('get.page'));
		if ($page == null) {
			$page = 1;
		}
		$page_this = $page;
		$page_next = $page+1;
		
		$zxrw_num = M('nav_article')->where('pid=4')->field('count(id) as num')->find();
		$page_show = A('Common')->getPage($zxrw_num['num'],5,$page_this);
		
		$zxrw = M('nav_article')->where('pid=4')->limit(($page-1)*5,5)->order('year+0 desc,month+0 desc,day+0 desc')->select();
		for($i = 0 ; $i < count($zxrw) ; $i ++){
			if($zxrw[$i]['from_url'] == ""){
				$zxrw[$i]['alt'] = 0;
			}
			else {
				$zxrw[$i]['alt'] = 1;
			}
			
			if ($zxrw[$i]['num_edit'] != "") {
				$zxrw[$i]['num'] = $zxrw[$i]['num_edit'];
			}
			else{
				$zxrw[$i]['num'] = $zxrw[$i]['num_true'];
			}
		}
		$page_last = end($page_show);
		$this->assign('zxrw',$zxrw);
		$this->assign('page_show',$page_show);
		$this->assign('page_this',$page_this);
		$this->assign('page_next',$page_next);
		$this->assign('page_last',ceil($zxrw_num['num'] / 5));
		$this->display('zxrw');
	}
	
	public function getOneZxrw(){
		$id = trim(I('get.id'));
		$num['num_true'] = array('exp','num_true+1');
		M('nav_article')->where('id=%d',$id)->data($num)->save();
		$zxrw = M('nav_article')->where('pid=4 and id=%d',$id)->find();
		if ($zxrw['num_edit'] != "") {
			$zxrw['num'] = $zxrw['num_edit'];
		}
		else{
			$zxrw['num'] = $zxrw['num_true'];
		}
		
		if ($zxrw['from_url'] == "") {
			$this->assign('zxrw',$zxrw);
			$this->display('Zxrw/zxrwInfo');
		}
		else{
			echo "<script>window.open('".$zxrw['from_url']."')</script>";
			echo "<script>history.go(-1);</script>";
		}
		
	}
}