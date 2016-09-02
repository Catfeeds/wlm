<?php
namespace Wlmeng\Controller;
use Wlmeng\Controller\ParentController;
use Think\Model;
class SearchController extends ParentController{
	public function search(){
		$type = I('post.cat');
		$con = I('post.keyword');
		if ($type == 'person') {
			A('Person')->goPerson($con);
		}
		else if ($type == 'investor') {
			A('Person')->goPersont($con);
		}
		else if($type == 'company'){
			
		}
		else if($type == 'investfirm'){
			A('Company')->goInvest($con);
		}
		else if($type == 'article'){
			$this->searchArticle($con);
		}
	}
	
	public function  searchArticle($con = ""){
		if ($con == "") {
			$con = I('get.con');
		}
		$page = I('get.page');
		if ($page == null) {
			$page = 1;
		}
		$page_this = $page;
		$page_next = $page+1;
		
		$art_num = M('nav_article')->where("content like ('%".$con."%') and pid in(2,3,4,5,99)")->field('count(id) as num')->find();
		$page_show = A('Common')->getPage($art_num['num'],12,$page_this);
		$page_last = ceil($art_num['num']/12);
		if ($page_next > $page_last) {
			$page_next = $page_last;
		}
		
		$atr = M('nav_article')->where("content like ('%".$con."%') and pid in(2,3,4,5,99)")->limit(($page-1)*12,12)->order('year+0 desc,month+0 desc,day+0 desc')->select();
		for ($i = 0; $i < count($atr) ; $i ++){
			if ($atr[$i]['pid'] == 2) {
				$atr[$i]['url'] = U('Wlmeng/WShiDai/getWsd',array('id'=>$atr[$i]['id']));
			}
			else if($atr[$i]['pid'] == 3){
				$atr[$i]['url'] = U('Wlmeng/Kmjs/getOneKmjs',array('id'=>$atr[$i]['id']));
			}
			else if($atr[$i]['pid'] == 4){
				$atr[$i]['url'] = U('Wlmeng/Zxrw/getOneZxrw',array('id'=>$atr[$i]['id']));
			}
			else if($atr[$i]['pid'] == 5){
				$atr[$i]['url'] = U('Wlmeng/Yysg/getOneYysg',array('id'=>$atr[$i]['id']));
			}
			else if($atr[$i]['pid'] == 99){
				$atr[$i]['url'] = U('Wlmeng/Point/getOnePoint',array('id'=>$atr[$i]['id']));
			}
			
			if ($atr[$i]['num_edit'] != "") {
				$atr[$i]['num'] = $atr[$i]['num_edit'];
			}
			else{
				$atr[$i]['num'] = $atr[$i]['num_true'];
			}
		}
		
		
		$this->assign('news',$atr);
		$this->assign('page_show',$page_show);
		$this->assign('page_this',$page_this);
		$this->assign('page_next',$page_next);
		$this->assign('page_last',$page_last);
		$this->assign('con',$con);
		$this->display('Public/search');
	}
	
	
}