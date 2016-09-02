<?php
namespace Wlmeng\Controller;
use Wlmeng\Controller\ParentController;
class PointController extends ParentController{
	public function  goPoint(){
		$page = trim(I('get.page'));
		if ($page == null) {
			$page = 1;
		}
		$page_this = $page;
		$page_next = $page + 1;
		
		$where['isshow'] = 1;
		$where['pid'] = 99;
		$point_num = M('nav_article')->where($where)->order('year+0 desc,month+0 desc,day+0 desc')->field('count(id) as num')->find();
		$page_show = A('Common')->getPage($point_num['num'],10,$page_this);
		
		$point = M('nav_article')->where($where)->limit(($page_this-1)*10,10)->order('year+0 desc,month+0 desc,day+0 desc,id desc')->select();
		for ($i = 0 ; $i < count($point) ; $i ++){
			if ($point[$i]['num_edit'] != null) {
				$point[$i]['num'] = $point[$i]['num_edit'];
			}
			else{
				$point[$i]['num'] = $point[$i]['num_true'];
			}
		}
		$page_last = end($page_show);
		$this->assign('point',$point);
		$this->assign('page_show',$page_show);
		$this->assign('page_this',$page_this);
		$this->assign('page_next',$page_next);
		$this->assign('page_last',ceil($point_num['num'] / 10));
		$this->display('Point/viewpoint');
	}
	
	public function getOnePoint(){
		$id = trim(I('get.id'));
		$num['num_true'] = array('exp','num_true+1');
		M('nav_article')->where('id=%d',$id)->data($num)->save();
		$point = M('nav_article')->where('pid=99 and id=%d',$id)->find();
		if ($point['num_edit'] != "") {
			$point['num'] = $point['num_edit'];
		}
		else{
			$point['num'] = $point['num_true'];
		}
		
		if ($point['from_url'] == "") {
			$this->assign('point',$point);
			$this->display('Point/viewpointInfo');
		}
		else{
			$this->assign('title',"观点详情");
			$this->assign("url",$point['from_url']);
			$this->display("Public/iframenews");
		}
	}
}