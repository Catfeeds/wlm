<?php
namespace Wlmeng\Controller;
use Wlmeng\Controller\ParentController;
class AnliController extends ParentController{
	public function goAnli(){
		$page = trim(I('get.page'));
		if ($page == null) {
			$page = 1;
		}
		$page_this = $page;
		$page_next = $page + 1;
		
		$where['isshow'] = 1;
		$anli_num = M('anli')->where($where)->field('count(id) as num')->find();
		$page_show = A('Common')->getPage($anli_num['num'],10,$page_this);
		
		$anli = M('anli')->where($where)->limit(($page_this-1)*10,10)->order('id desc')->select();
		for ($i = 0 ; $i < count($anli) ; $i ++){
			if ($anli[$i]['num_edit'] != null && $anli[$i]['num_edit'] != 0) {
				$anli[$i]['num'] = $anli[$i]['num_edit'];
			}
			else{
				$anli[$i]['num'] = $anli[$i]['num_true'];
			}
		}
		$page_last = end($page_show);
		$this->assign('anli',$anli);
		$this->assign('page_show',$page_show);
		$this->assign('page_this',$page_this);
		$this->assign('page_next',$page_next);
		$this->assign('page_last',ceil($anli_num['num'] / 10));
		$this->display('Anli/news');
	}
	
	public function getOneAnli(){
		$id = I('get.id');
		$anli = M('anli')->where('id=%d',$id)->find();
		$num['num_true'] = array('exp','num_true+1');
		M('anli')->where('id=%d',$id)->data($num)->save();
		if ($anli['from_url'] != "") {
			$this->assign('title',"案例详情");
			$this->assign("url",$anli['from_url']);
			$this->display("Public/iframenews");
		}
		else{
			$this->assign('anli',$anli);
			$this->display('Anli/newsInfo');
		}
		
	}
}