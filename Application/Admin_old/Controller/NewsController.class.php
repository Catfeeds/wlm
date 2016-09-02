<?php
namespace Admin\Controller;
use Admin\Controller\ParentController;
class NewsController extends ParentController{
	/** 
	 * author          肖萌
	 * describe	  	  动态列表
	 * parameter		 
	 * return		 
	 */
	public function newslist(){
		$list = M('News')->order('create_time desc')->select();
		for ($i = 0 ; $i < count($list) ; $i ++){
			$list[$i]['create_time'] = date("Y-m-d H:i:s",$list[$i]['create_time']);
		}
		$this->assign('list',$list);
		$this->display('newslist');
	}
	
	public function add(){
		$this->display();
	}
	
	public function insert(){
	    $time = I('time');
		$insert['title'] 		= I('post.title');
		$insert['content']		= I('post.content');
		$insert['create_time']	= strtotime($time);
		
		$result = M('news')->add($insert);
		$this->redirect('News/newsList');
		
	}
	
	public function del(){
		$id = I('get.id');
		
		$result = M('news')->where('id=%d',$id)->delete();
		$this->redirect('News/newsList');
	}
	
	public function save(){
		$id = I('get.id');
		$news = M('news')->where('id=%d',$id)->find();
		$news['create_time'] = date('Y-m-d H:i:s',$news['create_time']);
		$this->assign('news',$news);
		$this->display();
	}
	
	public function update() {
	    $time = I('time');
	    $id = I('id');
	    $insert['title'] 		= I('post.title');
		$insert['content']		= I('post.content');
		$insert['create_time']	= strtotime($time);
		
		M('news')->where('id=%d',$id)->save($insert);
		$this->redirect('News/newsList');
	}
}