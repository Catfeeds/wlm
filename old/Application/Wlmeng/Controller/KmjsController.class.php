<?php
namespace Wlmeng\Controller;
use Wlmeng\Controller\ParentController;
class KmjsController extends ParentController{
	public function goKmjs(){
		$page = trim(I('get.page'));
		if ($page == null) {
			$page = 1;
		}
		$page_this = $page;
		$page_next = $page+1;
		
		$allnum = M('nav_article')->where('pid=3 and isshow=1')->field('count(id) as num')->find();
		$page_show = A('Common')->getPage($allnum['num'],12,$page_this);
		
		$kmjs = M('nav_article')->where('pid=3 and isshow=1')->limit(($page-1)*12,12)->order('year+0 desc,month+0 desc,day+0 desc')->select();
		for($i = 0 ; $i < count($kmjs) ; $i ++){
			if($kmjs[$i]['year'] != "" && $kmjs[$i]['month'] != "" && $kmjs[$i]['day'] != ""){
				$kmjs[$i]['addtime'] = $kmjs[$i]['year']."-".$kmjs[$i]['month']."-".$kmjs[$i]['day'];
			}
			
			if ($kmjs[$i]['num_edit'] != "") {
				$kmjs[$i]['num'] = $kmjs[$i]['num_edit'];
			}
			else{
				$kmjs[$i]['num'] = $kmjs[$i]['num_true'];
			}
		}
		$page_last = end($page_show);
		$this->assign('page_show',$page_show);
		$this->assign('page_this',$page_this);
		$this->assign('page_next',$page_next);
		$this->assign('page_last',ceil($allnum['num'] / 12));
		$this->assign('kmjs',$kmjs);
		$this->display('Kmjs/kmjs');
	}
	
	public function getOneKmjs(){
		$id = trim(I('get.id'));
		$num['num_true'] = array('exp','num_true+1');
		M('nav_article')->where('id=%d',$id)->data($num)->save();
		$kmjs = M('nav_article')->where('id=%d',$id)->find();
		//$kmjs['content'] = htmlspecialchars_decode($kmjs['content']);
		//dump($kmjs);
		//exit;
		if ($kmjs['num_edit'] != "") {
			$kmjs['num'] = $kmjs['num_edit'];
		}
		else{
			$kmjs['num'] = $kmjs['num_true'];
		}

		if ($kmjs['from_url'] == null) {
			$this->assign('kmjs',$kmjs);
			$this->display('Kmjs/kmjsInfo');
		}
		else{
			$this->assign('url',$kmjs['from_url']);
			$this->assign('title','开门见山详情页：');
			$this->display('Public/iframenews');
		}
	}
}