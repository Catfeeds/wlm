<?php
namespace Wlmeng\Controller;
use Wlmeng\Controller\ParentController;
class NewsController extends ParentController{
	public function goNews(){
		$page = trim(I('get.page'));
		if ($page == null) {
			$page = 1;
		}
		$page_this = $page;
		$page_next = $page + 1;
		
		$news_num = M('news')->where('isshow=1')->field('count(id) as num')->find();
		$page_show = A('Common')->getPage($news_num['num'],5,$page_this);
		
		$news = M('news')->alias('n')
				->field('n.*')
				->order('n.addtime desc')
				->limit(($page_this-1)*5,5)
				->select();
		for($i = 0 ; $i < count($news) ; $i ++){
			$news[$i]['addtime'] = date("Y-m-d",$news[$i]['addtime']);
			if ($news[$i]['num_edit'] != null && $news[$i]['num_edit'] != 0) {
				$news[$i]['num'] = $news[$i]['num_edit'];
			}
			else{
				$news[$i]['num'] = $news[$i]['num_true'];
			}
		}
		$page_last = end($page_show);
		$this->assign('page_show',$page_show);
		$this->assign('page_this',$page_this);
		$this->assign('page_next',$page_next);
		$this->assign('page_last',ceil($news_num['num'] / 5));
		$this->assign('news',$news);
		$this->display('news');
	}
	
	public function getOneNews(){
		$id = I('get.id');
		$news = M('news')->alias('n')
				->field('n.*')
				->where('n.id=%d',$id)
				->find();
		$num['num_true'] = array('exp','num_true+1');
		M('news')->where('id=%d',$id)->data($num)->save();
		if ($news['from_url'] == "") {
			$this->assign('news',$news);
			$this->display('newsInfo');
		}
		else{
			echo "<script>window.open('".$news['from_url']."')</script>";
			echo "<script>history.go(-1);</script>";  
		}
		
	}
}