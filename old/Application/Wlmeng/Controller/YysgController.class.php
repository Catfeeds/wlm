<?php
namespace Wlmeng\Controller;
use Wlmeng\Controller\ParentController;
class YysgController extends ParentController{
	public function goYysg(){
		$page = trim(I('get.page'));
		if ($page == null) {
			$page = 1;
		}
		$page_this = $page;
		$page_next = $page+1;
		
		$allnum = M('nav_article')->where('pid=5 and isshow=1')->field('count(id) as num')->find();
		$page_show = A('Common')->getPage($allnum['num'],12,$page_this);
		
		$yysg = M('nav_article')->where('pid=5 and isshow=1')->limit(($page-1)*12,12)->order('year+0 desc,month+0 desc,day+0 desc')->select();
		for($i = 0 ; $i < count($yysg) ; $i ++){
			if($yysg[$i]['from_url'] == ""){
				$yysg[$i]['alt'] = 0;
			}
			else {
				$yysg[$i]['alt'] = 1;
			}
				
			if ($yysg[$i]['num_edit'] != "") {
				$yysg[$i]['num'] = $yysg[$i]['num_edit'];
			}
			else{
				$yysg[$i]['num'] = $yysg[$i]['num_true'];
			}
		}
		$page_last = end($page_show);
		$this->assign('yysg',$yysg);
		$this->assign('page_show',$page_show);
		$this->assign('page_this',$page_this);
		$this->assign('page_next',$page_next);
		$this->assign('page_last',ceil($allnum['num'] / 12));
		$this->display('Yysg/yysg');
	}
	
	public function getOneYysg(){
		$id = I('get.id');
		$num['num_true'] = array('exp','num_true+1');
		M('nav_article')->where('id=%d',$id)->data($num)->save();
		$yysg = M('nav_article')->where('id=%d',$id)->find();
		$this->assign('yysg',$yysg);
		$this->display('Yysg/yysgInfo');
	}
}