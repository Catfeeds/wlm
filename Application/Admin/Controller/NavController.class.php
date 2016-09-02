<?php
namespace Admin\Controller;
use Admin\Controller\ParentController;
class NavController extends ParentController{
	public function navlist(){
		$this->display();
	}
	
	public function atrlist(){
		$type = I('type');
		$list = M('article')->where('type=%d',$type)->select();
		
		$this->assign('list',$list);
		$this->assign('type',$type);
		$this->display();
	}
	
	public function add(){
		$this->assign('type',I('type'));
		$this->display();
	}
	
	public function insert(){
	    $time = I('time');
	    
		$add['title'] 		= I('post.title');
		$add['type']		= I('post.type');
		$add['content']		= I('post.content');
		$add['time']        = strtotime($time);
		
		$result = M('article')->add($add);
		$this->redirect('Nav/atrlist',array('type'=>$add['type']));
	}
	
	public function del(){
		$type = I('type');
		$where['id'] = I('get.id');
		$result = M('article')->where($where)->delete();
		$this->redirect('Nav/atrlist',array('type'=>$type));
	}
	
	public function show(){
		$where['id'] = I('id');
		$art = M('article')->where($where)->find();
		$art['time'] = date('Y-m-d H:i:s',$art['time']);
		$this->assign('show',$art);
		$this->display();
	}
	
	public function save(){
	    $time = I('time');

		$save['id'] 		= I('id');
		$save['title'] 		= I('title');
		$save['content']	= I('content');
		$save['time']       = strtotime($time);

		$type = I('type');
		
		M('article')->data($save)->save();
		$this->redirect('Nav/atrlist',array('type'=>$type));
	}
}